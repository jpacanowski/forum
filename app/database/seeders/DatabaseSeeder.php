<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Thread::truncate();
        Post::truncate();

        Thread::create([
            'user_id' => 1,
            'category_id' => 1,
            'visits' => 0,
            'subject' => 'JS - which framework to choose?',
            'slug' => 'JS-which-framework-to-choose',
            'created_at' => '2018-11-28 16:29:05'
        ]);

        Thread::create([
            'user_id' => 2,
            'category_id' => 1,
            'visits' => 10,
            'subject' => 'What programming language to start with?',
            'slug' => 'what-programming-language-to-start-with',
            'created_at' => '2020-11-28 16:29:05'
        ]);

        Thread::create([
            'user_id' => 3,
            'category_id' => 1,
            'visits' => 8,
            'subject' => 'Installing OpenBSD',
            'slug' => 'installing-openbsd',
            'created_at' => '2023-11-28 16:29:05'
        ]);


        Post::create([
            'user_id' => 1,
            'thread_id' => 1,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);


        Post::create([
            'user_id' => 1,
            'thread_id' => 2,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        Post::create([
            'user_id' => 2,
            'thread_id' => 2,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        Post::create([
            'user_id' => 3,
            'thread_id' => 2,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);


        Post::create([
            'user_id' => 1,
            'thread_id' => 3,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        Post::create([
            'user_id' => 2,
            'thread_id' => 3,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);
    }
}
