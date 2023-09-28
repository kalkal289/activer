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
            'category_id' => 3,
            'content' => 'アプリ開発頑張ります！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 5,
            'content' => '公認会計士試験難しすぎ～',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 2,
            'content' => '良い勉強場所無いかなぁ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 8,
            'content' => '今日行ったカフェのコーヒーは最高でした',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 4,
            'content' => '重大発表です！ ',
            'is_big_post' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 4,
            'content' => '散歩に行きました',
            'image1' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695877563/zj8pv4nyvywmrwavytqy.jpg',
            'image2' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695877564/tlmna596rfrm3ageuwmt.jpg',
            'image3' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695877565/ulqis8f1md9awdgejdsx.jpg',
            'image4' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695877565/zy06mt8zk6sp4tgyr2x5.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 2,
            'content' => '散歩に行きました',
            'image1' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695878756/rstbr14pjykgtndhxwwc.jpg',
            'image2' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695878757/kaghtfhf0o1ygxwbkybc.jpg',
            'image3' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695878757/x3bsohwbaqok9ndfj8ta.jpg',
            'image4' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695878758/q9i7f3gwqmjjqj2eifpo.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 7,
            'content' => '今日はカフェに行きました！ここのケーキは絶品です！値段は個人経営のカフェの中では比較的安めですので気軽に行けます！静岡県の立野市にあるのでよかったらぜひ行ってみてください！分かりずらい場所にあるので気を付けてくださいね～',
            'image1' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695899747/yvq9jxpoejrbwnza1zgg.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 8,
            'content' => '今年一番の写真が取れました！',
            'image1' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695879205/msjc3pjsckyti097inku.jpg',
            'is_big_post' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 2,
            'content' => 'もうこんな時間！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 4,
            'content' => 'こんな風景を3Dモデルで作りたいです',
            'image1' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695877564/tlmna596rfrm3ageuwmt.jpg',
            'image2' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695877565/zy06mt8zk6sp4tgyr2x5.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 2,
            'category_id' => 7,
            'content' => '長期休暇をとって旅行に行っていきました！',
            'image1' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695878758/q9i7f3gwqmjjqj2eifpo.jpg',
            'is_big_post' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 5,
            'content' => 'イラストが完成しました！！！',
            'image1' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1695878756/rstbr14pjykgtndhxwwc.jpg',
            'is_big_post' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 3,
            'category_id' => 2,
            'content' => '今日は早起きできた！！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 1,
            'category_id' => 3,
            'content' => '途中経過です！！バックエンドはほとんど完成しました！！これからフロントエンドに取り掛かります！！',
            'is_big_post' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 6,
            'category_id' => 9,
            'content' => '3時間も散歩してた',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
