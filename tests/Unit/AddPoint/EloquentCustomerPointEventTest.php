<?php

namespace Tests\Unit\AddPoint;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Eloquent\EloquentCustomer;
use App\Eloquent\EloquentCustomerPointEvent;
use App\Model\PointEvent;
use Carbon\Carbon;


class EloquentCustomerPointEventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function register()
    {
        // ①テストに必要なレコードを追加
        $customerId = 1;
        factory(EloquentCustomer::class)->create([
            'id' => $customerId,
        ]);

        // ②テスト対象のメソッドの実行
        $event = new PointEvent(
            $customerId,
            '加算イベント',
            100,
            Carbon::create(2019,8,4,12,33,56)
        );
        $sut = new EloquentCustomerPointEvent();
        $sut->register($event);

        // ③テスト結果のアサーション
        $this->assertDatabaseHas('customer_point_events', [
           'customer_id' => $customerId,
           'event' => $event->getEvent(),
           'point' => $event->getPoint(),
           'created_at' => $event->getCreatedAt(),
        ]);
    }
}
