<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostPosttagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_posttags')->insert([
            'post_id' => 1,
            'posttag_id' => 1,
        ]);
        
        DB::table('post_posttags')->insert([
            'post_id' => 1,
            'posttag_id' => 6,
        ]);
        
        DB::table('post_posttags')->insert([
            'post_id' => 2,
            'posttag_id' => 6,
        ]);
        
        DB::table('post_posttags')->insert([
            'post_id' => 2,
            'posttag_id' => 3,
        ]);
        
        DB::table('post_posttags')->insert([
            'post_id' => 4,
            'posttag_id' => 4,
        ]);
        
        DB::table('post_posttags')->insert([
            'post_id' => 4,
            'posttag_id' => 5,
        ]);
    }
}
