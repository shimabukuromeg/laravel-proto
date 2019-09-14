<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        for ($i = 1; $i <= 10; $i++) {
            $authors = [
                'name' => '著作者名' . $i,
                'kana' => 'チョサクシャメイ' . $i,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
    }
}
