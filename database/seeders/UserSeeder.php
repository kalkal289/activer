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
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'message' => 'よろしくお願いします！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser2',
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
            'message' => '文系の大学生です',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser3',
            'name' => 'test3',
            'email' => 'test3@example.com',
            'password' => Hash::make('password'),
            'message' => 'カフェめぐりが趣味',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser4',
            'name' => 'test4',
            'email' => 'test4@example.com',
            'password' => Hash::make('password'),
            'message' => '専門学生です！個人で映像作品を作っています！最近新しいパソコンを買ったのでこれからもっと頑張っていきます！！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser5',
            'name' => 'test5',
            'email' => 'test5@example.com',
            'password' => Hash::make('password'),
            'message' => '海外に行くのが趣味です！去年はイギリスとフランスに行ったので、今年はアメリカに行きたいです！！！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser6',
            'name' => 'test6',
            'email' => 'test6@example.com',
            'password' => Hash::make('password'),
            'message' => '副業で3年前から手作りのアクセサリーを作っています！オンラインで販売しているので是非見て言ってください！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser7',
            'name' => 'test7',
            'email' => 'test7@example.com',
            'password' => Hash::make('password'),
            'message' => '大学生です！かわいいイラストを描くために日々練習しています！！ラフや完成したイラストを投稿していく予定ですのでよろしくお願いします！！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser8',
            'name' => 'test8',
            'email' => 'test8@example.com',
            'password' => Hash::make('password'),
            'message' => 'Unityでゲームを作っています！最近は3Dゲームも作っています！！よろしくお願いします！！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser9',
            'name' => 'test9',
            'email' => 'test9@example.com',
            'password' => Hash::make('password'),
            'message' => '土手を歩き続けるのが好きな社会人です！！',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser10',
            'name' => 'test10',
            'email' => 'test10@example.com',
            'password' => Hash::make('password'),
            'message' => 'ボカロを作っていま～す！パンケーキ食べたい',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
    }
}
