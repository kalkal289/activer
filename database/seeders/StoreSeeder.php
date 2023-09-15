<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'user_id' => 1,
            'storecategory_id' => 1,
            'title' => 'イラストのご依頼はこちら',
            'content' => 'こちらのサイトでイラストの依頼を受け付けています！イメージラフ作成→ご契約→本作業着手という形で行っています！ご依頼お待ちしています！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('stores')->insert([
            'user_id' => 3,
            'storecategory_id' => 6,
            'title' => '都内のカフェをまとめた本を販売しています',
            'content' => '私のお気に入りのカフェをまとめた本を、こちらの通販サイトにて販売しています。都内の隠れ家的なカフェも紹介しているのでぜひ読んでみてください。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('stores')->insert([
            'user_id' => 3,
            'storecategory_id' => 4,
            'title' => '3Dモデルの作成依頼を受け付けています',
            'content' => '以前はとあるゲーム会社で働いていましたが、現在はフリーランスで3Dモデルを作成しています。ご依頼のある方はこちらのサイトにてご連絡をお願いいたします。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
