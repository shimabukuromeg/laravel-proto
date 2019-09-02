<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'name' => Str::random(10),
            'mail' => Str::random(10).'@gmail.com',
            'age' => 32,
        ]);

        DB::table('people')->insert([
            'name' => Str::random(10),
            'mail' => Str::random(10).'@gmail.com',
            'age' => 32,
        ]);

        DB::table('people')->insert([
            'name' => Str::random(10),
            'mail' => Str::random(10).'@gmail.com',
            'age' => 32,
        ]);

        DB::table('people')->insert([
            'name' => Str::random(10),
            'mail' => Str::random(10).'@gmail.com',
            'age' => 32,
        ]);
    }
}
