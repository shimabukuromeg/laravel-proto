<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(BookdetailsTableSeeder::class);
        $this->call(BooksTableSeeder::class);

        // 9-3 WebAPIのテスト
        $this->call(CustomersTableSeeder::class);
        $this->call(CustomerPointsTableSeeder::class);
    }
}
