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
        
        DB::table('likes')->insert([
            'user_id' => 2,
            'post_id' => 10,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 8,
            'post_id' => 13,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 9,
            'post_id' => 7,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 5,
            'post_id' => 14,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 2,
            'post_id' => 5,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 6,
            'post_id' => 9,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 10,
            'post_id' => 13,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 4,
            'post_id' => 12,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 8,
            'post_id' => 4,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 6,
            'post_id' => 6,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 4,
            'post_id' => 14,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 5,
            'post_id' => 8,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 9,
            'post_id' => 4,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 8,
            'post_id' => 12,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 9,
            'post_id' => 10,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 5,
            'post_id' => 3,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 10,
            'post_id' => 5,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 4,
            'post_id' => 4,
        ]);
        
        DB::table('likes')->insert([
            'user_id' => 9,
            'post_id' => 2,
        ]);
    }
}
