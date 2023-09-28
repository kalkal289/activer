<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 3,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 3,
            'followed_id' => 2,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 4,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 9,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 6,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 7,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 10,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 2,
            'followed_id' => 5,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 3,
            'followed_id' => 7,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 3,
            'followed_id' => 10,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 3,
            'followed_id' => 8,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 3,
            'followed_id' => 5,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 3,
            'followed_id' => 6,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 4,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 4,
            'followed_id' => 9,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 4,
            'followed_id' => 6,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 4,
            'followed_id' => 3,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 4,
            'followed_id' => 2,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 5,
            'followed_id' => 6,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 5,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 5,
            'followed_id' => 3,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 5,
            'followed_id' => 10,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 5,
            'followed_id' => 7,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 5,
            'followed_id' => 2,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 6,
            'followed_id' => 7,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 6,
            'followed_id' => 2,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 6,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 6,
            'followed_id' => 9,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 6,
            'followed_id' => 8,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 7,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 7,
            'followed_id' => 2,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 7,
            'followed_id' => 3,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 7,
            'followed_id' => 8,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 7,
            'followed_id' => 6,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 8,
            'followed_id' => 3,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 8,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 8,
            'followed_id' => 10,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 8,
            'followed_id' => 7,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 8,
            'followed_id' => 4,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 9,
            'followed_id' => 8,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 1,
            'followed_id' => 9,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 9,
            'followed_id' => 2,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 9,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 1,
            'followed_id' => 3,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 9,
            'followed_id' => 5,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 9,
            'followed_id' => 10,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 1,
            'followed_id' => 7,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 10,
            'followed_id' => 1,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 10,
            'followed_id' => 5,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 10,
            'followed_id' => 2,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 10,
            'followed_id' => 9,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 10,
            'followed_id' => 7,
        ]);
        
        DB::table('follows')->insert([
            'follower_id' => 10,
            'followed_id' => 8,
        ]);
    }
}
