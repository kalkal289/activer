<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UsertagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertags')->insert([
            'name' => '大学生',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('usertags')->insert([
            'name' => '公認会計士試験',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('usertags')->insert([
            'name' => '就活生',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('usertags')->insert([
            'name' => 'カフェ巡り',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('usertags')->insert([
            'name' => 'Webアプリ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
