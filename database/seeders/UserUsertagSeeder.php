<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserUsertagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_usertags')->insert([
            'user_id' => 1,
            'usertag_id' => 1,
        ]);
        
        DB::table('user_usertags')->insert([
            'user_id' => 1,
            'usertag_id' => 5,
        ]);
        
        DB::table('user_usertags')->insert([
            'user_id' => 2,
            'usertag_id' => 1,
        ]);
        
        DB::table('user_usertags')->insert([
            'user_id' => 2,
            'usertag_id' => 2,
        ]);
        
        DB::table('user_usertags')->insert([
            'user_id' => 1,
            'usertag_id' => 3,
        ]);
        
        DB::table('user_usertags')->insert([
            'user_id' => 3,
            'usertag_id' => 4,
        ]);
    }
}
