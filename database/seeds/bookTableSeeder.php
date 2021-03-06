<?php

use Illuminate\Database\Seeder;

class bookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        for ($i = 1, $i <= 10; $i++;) {
            $author = [
              'name' => '著作者名' . $i,
              'kana' => 'チョサクシャメイ' . $i,
              'created_at' => $now,
              'updated_at' => $now,
            ];
            Db::table('authors')->insert($author);
        }
    }
}
