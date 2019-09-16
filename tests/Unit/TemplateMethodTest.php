<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\CalculatePointService;

class TemplateMethodTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        echo __METHOD__, PHP_EOL;
    }

    protected function setUp()
    {
        parent::setUp();

        echo __METHOD__, PHP_EOL;
    }

    /**
     * @test
     */
    public function テストメソッド1()
    {
        echo __METHOD__, PHP_EOL;
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function テストメソッド2()
    {
        echo __METHOD__, PHP_EOL;
        $this->assertTrue(true);
    }

    protected function tearDown()
    {
        parent::tearDown();

        echo __METHOD__, PHP_EOL;
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();

        echo __METHOD__, PHP_EOL;
    }
}
