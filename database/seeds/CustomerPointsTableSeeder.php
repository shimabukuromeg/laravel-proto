<?php

use Illuminate\Database\Seeder;

class CustomerPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $customer_point = [
            'customer_id' => 1,
            'point' => 0,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        Db::table('customer_points')->insert($customer_point);
    }
}
