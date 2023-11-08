<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StorecategorySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            PosttagSeeder::class,
            PostPosttagSeeder::class,
            UsertagSeeder::class,
            UserUsertagSeeder::class,
            LikeSeeder::class,
            FollowSeeder::class,
            MainSeeder::class,
            StoreSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
