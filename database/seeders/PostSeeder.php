<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'content' => 'アプリ開発頑張ります！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 4,
            'content' => '公認会計士試験難しすぎ～',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 5,
            'content' => '良い勉強場所無いかなぁ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 5,
            'content' => '今日行ったカフェのコーヒーは最高でした',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
