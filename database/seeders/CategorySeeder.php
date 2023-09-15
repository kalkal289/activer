<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Webアプリ',
        ]);
        
        DB::table('categories')->insert([
            'name' => '3Dモデル',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'イラスト',
        ]);
        
        DB::table('categories')->insert([
            'name' => '資格勉強',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'つぶやき',
        ]);
        
        DB::table('categories')->insert([
            'name' => '趣味',
        ]);
    }
}
