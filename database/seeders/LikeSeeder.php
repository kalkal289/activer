<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            'user_id' => 2,
            'post_id' => 1,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 2,
            'post_id' => 4,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 3,
            'post_id' => 2,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 3,
            'post_id' => 1,
        ]);
    }
}
