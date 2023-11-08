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
            'name' => 'イラスト',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '動画',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'ライブ2D',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '3Dモデル',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'ライティング',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'Webデザイン',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'プログラミング',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'グッズ',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '書籍',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'その他物品',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'ダウンロードコンテンツ',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'サブスクリプション',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => '講座・教材',
        ]);
        
        DB::table('storecategories')->insert([
            'name' => 'その他',
        ]);
    }
}
