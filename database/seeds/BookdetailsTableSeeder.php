<?php

use Illuminate\Database\Seeder;

class BookdetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        $now = \Carbon\Carbon::now();
        for ($i = 0; $i < 10; $i++){
            $bookDetail = [
                'name' => $faker->company . '出版',
                'address' => $faker->address,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            DB::table('bookdetails')->insert($bookDetail);
        }
    }
}
