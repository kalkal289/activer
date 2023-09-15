<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mains')->insert([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Webアプリ制作の勉強中！',
            'content' => '私は今年の6月からWebアプリ制作の勉強を始めました！現在は基礎的な知識を付け、オリジナルのWebアプリを制作中です！制作環境はLaravelで、AWSを使っています！新しいこと十わからないことばかりで大変ですが、とても楽しく勉強することができています！完成が楽しみです！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('mains')->insert([
            'user_id' => 3,
            'category_id' => 6,
            'title' => 'カフェ巡り',
            'content' => '休日には新たなコーヒーを求め、都内のカフェを巡っています。基本的に１日に１～２件ですが、多い日には３件ほど回ります。ゆったりした雰囲気のカフェが好きで、そこで読書をすることがなによりもの至福です。時々写真も投稿しているので、よかったら見ていってください。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('mains')->insert([
            'user_id' => 2,
            'category_id' => 4,
            'title' => '公認会計士試験勉強',
            'content' => '次の12月に行われる公認会計士試験に向けてめちゃくちゃ勉強中です！基本的に独学で勉強しており、休日は大学の図書館にこもることも多々あります。しかしその分、人とかかわることが少ないので、ここで仲間を作りたいです！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('mains')->insert([
            'user_id' => 1,
            'category_id' => 3,
            'title' => 'イラストも描いてます！',
            'content' => '趣味でイラストを描いています！！ラフや完成したイラストを随時投稿していますのでよかったら見ていってください！夢はコミケ出店です！ご依頼はStoreの方からお願いします！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
