<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PosttagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posttags')->insert([
            'name' => 'Webアプリ開発',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posttags')->insert([
            'name' => '資格勉強',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posttags')->insert([
            'name' => '公認会計士試験',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posttags')->insert([
            'name' => 'カフェ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posttags')->insert([
            'name' => '朝のコーヒー',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posttags')->insert([
            'name' => '勉強',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
