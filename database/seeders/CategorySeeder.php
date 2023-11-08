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
            'user_id' => 1,
            'name' => 'つぶやき',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 2,
            'name' => 'つぶやき',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 3,
            'name' => 'つぶやき',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 6,
            'name' => 'つぶやき',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 8,
            'name' => 'つぶやき',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => 'Webアプリ',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 5,
            'name' => 'Webアプリ',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 9,
            'name' => 'Webアプリ',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 4,
            'name' => '3Dモデル',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 6,
            'name' => '3Dモデル',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 7,
            'name' => '3Dモデル',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 8,
            'name' => '3Dモデル',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => 'イラスト',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 3,
            'name' => 'イラスト',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 4,
            'name' => 'イラスト',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 10,
            'name' => 'イラスト',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => '資格勉強',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 5,
            'name' => '資格勉強',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 6,
            'name' => '資格勉強',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 10,
            'name' => '資格勉強',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => '外出',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 2,
            'name' => '外出',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 3,
            'name' => '外出',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 7,
            'name' => '外出',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 8,
            'name' => '外出',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 2,
            'name' => '趣味',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 4,
            'name' => '趣味',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 5,
            'name' => '趣味',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 7,
            'name' => '趣味',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 9,
            'name' => '趣味',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 3,
            'name' => '食事',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 4,
            'name' => '食事',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 5,
            'name' => '食事',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 6,
            'name' => '食事',
        ]);
        
        DB::table('categories')->insert([
            'user_id' => 8,
            'name' => '食事',
        ]);
    }
}
