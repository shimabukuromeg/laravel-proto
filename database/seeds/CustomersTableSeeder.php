<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $customer = [
            'id' => 1,
            'name' => 'tarou',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        Db::table('customers')->insert($customer);
    }
}
