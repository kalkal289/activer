<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 3,
            'content' => 'あんまり良いとこないですよねぇ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 4,
            'content' => 'いいなぁ！行ってみたい！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 1,
            'post_id' => 2,
            'content' => '公認会計士試験大変そうですね...！頑張ってください！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 3,
            'post_id' => 1,
            'content' => 'カフェなんかは結構おすすめですよ！もちろん長居しすぎはだめですけどね笑',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
