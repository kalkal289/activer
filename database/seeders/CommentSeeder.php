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
        
        DB::table('comments')->insert([
            'user_id' => 4,
            'post_id' => 6,
            'content' => 'すごいですね！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 4,
            'post_id' => 9,
            'content' => 'おお！やりましたね！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 6,
            'post_id' => 2,
            'content' => '最高ですね',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 7,
            'post_id' => 9,
            'content' => 'わーお！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 8,
            'content' => 'なんて素晴らしいんだ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 10,
            'post_id' => 13,
            'content' => 'いいですね！！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 6,
            'post_id' => 13,
            'content' => 'いえーい！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 9,
            'post_id' => 12,
            'content' => 'たまには息抜きも大事ですよね！！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 7,
            'post_id' => 3,
            'content' => '私も行きたいです～～',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 3,
            'post_id' => 10,
            'content' => '１日って早いですよねぇぇぇ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 9,
            'post_id' => 9,
            'content' => 'おお！これはすごいですね！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 7,
            'post_id' => 14,
            'content' => 'おお！私もです！！一緒に頑張っていきましょう！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 7,
            'post_id' => 5,
            'content' => 'わくわく...！！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 6,
            'post_id' => 11,
            'content' => 'これを作れたらすごいですね！！応援してます！！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 8,
            'content' => 'これは確かに素晴らしい写真ですね！！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
