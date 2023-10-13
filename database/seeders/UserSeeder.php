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
            'name' => 'かるかる',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'message' =>"アプリケーション開発を学んでいます！\nよろしくお願いします！！！！",
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1697170989/o9gxfwvtu7uotb08mkse.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser2',
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password'),
            'message' => '文系の大学生です',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1697170990/dvdk0nsjvgduqpy9odnq.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser3',
            'name' => 'test3',
            'email' => 'test3@example.com',
            'password' => Hash::make('password'),
            'message' => 'カフェめぐりが趣味',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1697170185/jefviymqufj0kvwwgz9j.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser4',
            'name' => 'test4',
            'email' => 'test4@example.com',
            'password' => Hash::make('password'),
            'message' => '専門学生です！個人で映像作品を作っています！最近新しいパソコンを買ったのでこれからもっと頑張っていきます！！',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1697170150/cgasjnkk8cgqipmhtpzq.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser5',
            'name' => 'test5',
            'email' => 'test5@example.com',
            'password' => Hash::make('password'),
            'message' => '海外に行くのが趣味です！去年はイギリスとフランスに行ったので、今年はアメリカに行きたいです！！！',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1697097838/tqjwaqwzponog1hlmpc2.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser6',
            'name' => 'test6',
            'email' => 'test6@example.com',
            'password' => Hash::make('password'),
            'message' => '副業で3年前から手作りのアクセサリーを作っています！オンラインで販売しているので是非見て言ってください！',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1697097837/eiq4duzyqixsmnsiop9g.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser7',
            'name' => 'test7',
            'email' => 'test7@example.com',
            'password' => Hash::make('password'),
            'message' => '大学生です！かわいいイラストを描くために日々練習しています！！ラフや完成したイラストを投稿していく予定ですのでよろしくお願いします！！',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1696436355/dxpk5hfyifsgc4xlmle9.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser8',
            'name' => 'test8',
            'email' => 'test8@example.com',
            'password' => Hash::make('password'),
            'message' => 'Unityでゲームを作っています！最近は3Dゲームも作っています！！よろしくお願いします！！',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1693113762/cld-sample-4.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser9',
            'name' => 'test9',
            'email' => 'test9@example.com',
            'password' => Hash::make('password'),
            'message' => '土手を歩き続けるのが好きな社会人です！！',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1693113741/samples/landscapes/nature-mountains.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
        
        DB::table('users')->insert([
            'account_name' => 'testuser10',
            'name' => 'test10',
            'email' => 'test10@example.com',
            'password' => Hash::make('password'),
            'message' => 'ボカロを作っていま～す！パンケーキ食べたい',
            'profile_image' => 'https://res.cloudinary.com/drs9gzes2/image/upload/v1696940818/yujj4f3cmgwdio4szitk.jpg',
            'created_at' => new DateTimeImmutable(),
            'updated_at' => new DateTimeImmutable(),
        ]);
    }
}
