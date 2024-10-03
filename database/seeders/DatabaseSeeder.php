<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('authors')->truncate();
        DB::table('posts')->truncate();
        DB::table('comments')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);

    }
}
