<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 4; $i++) {
            DB::table('news')->insert([
                [
                    'name' => Str::random(10),
                    'photo' => '',
                    'text' => Str::random(40),
                    'author_id' => 1,
                    'order' => 1,
                ],
            ]);
        }
    }
}
