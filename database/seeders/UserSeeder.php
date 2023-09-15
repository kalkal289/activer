<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTimeImmutable;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'account_name' => 'testuser',
            'user_name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'message' => 'よろしくお願いします！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser2',
            'user_name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
            'message' => '文系の大学生です',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser3',
            'user_name' => 'test3',
            'email' => 'test3@example.com',
            'password' => Hash::make('password'),
            'message' => 'カフェめぐりが趣味',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
    }
}
