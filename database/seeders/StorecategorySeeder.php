<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorecategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storecategories')->insert([
            'name' => 'カテゴリーなし',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'イラスト作成',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '動画作成',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'ライブ2D作成',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '3Dモデル作成',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'オリジナルグッズ',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '書籍販売',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'その他物品販売',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'ダウンロードコンテンツ',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '定額サービス',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'その他',
        ]);
    }
}
