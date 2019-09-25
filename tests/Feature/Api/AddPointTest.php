<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Eloquent\EloquentCustomer;
use App\Eloquent\EloquentCustomerPoint;
use Carbon\Carbon;

class AddPointTest extends TestCase
{
    use RefreshDatabase;

    const CUSTOMER_ID = 1;

    protected function setUp()
    {
        parent::setUp();

        Carbon::setTestNow();

        factory(EloquentCustomer::class)->create([
            'id' => self::CUSTOMER_ID,
        ]);
        factory(EloquentCustomerPoint::class)->create([
            'customer_id' => self::CUSTOMER_ID,
            'point' => 100,
        ]);
    }

    /**
     * @test
     *
     */
    public function put_add_point()
    {
        // API実行
        $response = $this->putJson('/api/customers/add_point',[
            'customer_id' => self::CUSTOMER_ID,
            'add_point' => 10,
        ]);

        // HTTPレスポンスアサーション
        $response->assertStatus(200);
        $expected = ['customer_point' => 110];
        $response->assertExactJson($expected);

        // データベースのアサーション
        $this->assertDatabaseHas('customer_points', [
            'customer_id' => self::CUSTOMER_ID,
            'point' => 110,
        ]);
        $this->assertDatabaseHas('customer_point_events',[
            'customer_id' => self::CUSTOMER_ID,
            'event' => 'ADD_POINT',
            'point' => 10,
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * @test
     *
     */
    public function put_add_point_バリデーションエラー()
    {
        // API実行
        $response = $this->putJson('/api/customers/add_point',[
        ]);

        $response->assertStatus(422);
        $expected = [
            'message' => 'The given data was invalid.',
            'errors' => [
                'customer_id' => [
                    'The customer id field is required.',
                ],
                'add_point' => [
                    'The add point field is required.',
                ],
            ],
        ];
        $response->assertExactJson($expected);
    }

    /**
     * @test
     * @dataProvider dataProvider_put_add_point_add_point事前条件エラー
     */
    public function put_add_point_add_point事前条件エラー(int $addPoint)
    {
        // (1) API実行
        $response = $this->putJson('/api/customers/add_point', [
            'customer_id' => self::CUSTOMER_ID,
            'add_point'   => $addPoint,
        ]);
        // (2) HTTPレスポンスアサーション
        $response->assertStatus(400);
        $expected = [
            'message' => 'add_point should be equals or greater than 1',
        ];
        $response->assertExactJson($expected);
    }

    public function dataProvider_put_add_point_add_point事前条件エラー()
    {
        return [
            [0],
            [-1],
        ];
    }

    public function put_add_point_customer_id事前条件エラー()
    {
        $response = $this->putJson('/api/customers/add_point', [
            'customer_id' => 999,
            'add_point' => 10,
        ]);

        // HTTPレスポンスアサーション
        $response->assertStatus(400);
        $expected = [
            'message' => 'customer_id:999 does not exist'
        ];
        $response->assertExactJson($expected);

    }
}
