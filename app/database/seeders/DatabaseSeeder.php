<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Thread::truncate();
        Post::truncate();
        Category::truncate();
        Settings::truncate();

        Settings::create([
            'forum_name' => 'World of Unix',
            'forum_tagline' => 'Think Different',
            'forum_description' => 'Yet another forum about Unix',
            'forum_keywords' => 'unix, freebsd, openbsd, linux',
            'forum_url' => 'https://unix.io',
            'posts_per_page' => 20
        ]);


        $user1 = User::create([
            'name' => 'Kaz',
            'email' => 'kaz@example.com',
            'password' => 'kaz',
            'role' => 'ADMIN',
            'points' => 280
        ]);

        $user2 = User::create([
            'name' => 'mono',
            'email' => 'mono@example.com',
            'password' => 'mono',
            'role' => 'USER',
            'points' => 140
        ]);

        $user3 = User::create([
            'name' => 'jhusak',
            'email' => 'jhusak@example.com',
            'password' => 'jhusak',
            'role' => 'USER',
            'points' => 100
        ]);

        $user4 = User::create([
            'name' => 'mattonit',
            'email' => 'mattonit@example.com',
            'password' => 'mattonit',
            'role' => 'USER',
            'points' => 120
        ]);


        $category1 = Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        $category2 = Category::create([
            'name' => 'Hardware',
            'slug' => 'hardware'
        ]);

        $category3 = Category::create([
            'name' => 'Games',
            'slug' => 'games'
        ]);

        $category4 = Category::create([
            'name' => 'Operating systems',
            'slug' => 'operating-systems'
        ]);

        $category5 = Category::create([
            'name' => 'Others',
            'slug' => 'others'
        ]);


        $thread1 = Thread::create([
            'user_id' => $user1->id,
            'category_id' => $category1->id,
            'visits' => 0,
            'subject' => 'JS - which framework to choose?',
            'slug' => 'JS-which-framework-to-choose',
            'content' => 'I would like to know which JS framework to choose.',
            'last_post_date' => '2018-11-28 16:29:05',
            'created_at' => '2018-11-28 16:29:05'
        ]);

        Post::create([
            'user_id' => $user2->id,
            'thread_id' => $thread1->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);


        $thread2 = Thread::create([
            'user_id' => $user2->id,
            'category_id' => $category1->id,
            'visits' => 10,
            'subject' => 'What programming language to start with?',
            'slug' => 'what-programming-language-to-start-with',
            'content' => 'What programming language should I choose as a first language to learn?',
            'last_post_date' => '2011-11-28 16:29:05',
            'created_at' => '2020-11-28 16:29:05'
        ]);

        Post::create([
            'user_id' => $user1->id,
            'thread_id' => $thread2->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        Post::create([
            'user_id' => $user2->id,
            'thread_id' => $thread2->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        Post::create([
            'user_id' => $user3->id,
            'thread_id' => $thread2->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);


        $thread3 = Thread::create([
            'user_id' => $user3->id,
            'category_id' => $category4->id,
            'visits' => 8,
            'subject' => 'Installing OpenBSD',
            'slug' => 'installing-openbsd',
            'content' => 'I have a problem while installing OpenBSD. Could you help me, guys?',
            'last_post_date' => '2023-11-28 16:29:05',
            'created_at' => '2023-11-28 16:29:05'
        ]);

        Post::create([
            'user_id' => $user2->id,
            'thread_id' => $thread3->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

        Post::create([
            'user_id' => $user1->id,
            'thread_id' => $thread3->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);


        $thread4 = Thread::create([
            'user_id' => $user3->id,
            'category_id' => $category2->id,
            'visits' => 3,
            'subject' => '4gb ram on 32bit system',
            'slug' => '4gb-ram-on-32bit-system',
            'content' => 'I installed debian 12 32bit on an old dell optiplex gx280 with 4gb of ddr2 ram but the system only reads 3gb. Is there any way to use whole ram memory?',
            'last_post_date' => '2008-11-28 16:29:05',
            'created_at' => '2023-12-10 16:29:05'
        ]);

        $thread5 = Thread::create([
            'user_id' => $user3->id,
            'category_id' => $category2->id,
            'visits' => 3,
            'subject' => 'Crashing while installing Plan 9',
            'slug' => 'crashing-while-installing-plan-9',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'last_post_date' => '2008-11-28 16:29:05',
            'created_at' => '2008-11-28 16:29:05'
        ]);

        $thread6 = Thread::create([
            'user_id' => $user3->id,
            'category_id' => $category2->id,
            'visits' => 3,
            'subject' => 'Moving Debian from one SSD to my new SSD',
            'slug' => 'moving-debian-from-one-ssd-to-my-new-ssd',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'last_post_date' => '2008-11-23 16:29:05',
            'created_at' => '2008-11-23 16:29:05'
        ]);

        $thread7 = Thread::create([
            'user_id' => $user3->id,
            'category_id' => $category2->id,
            'visits' => 3,
            'subject' => 'Make Linux like Mac OS',
            'slug' => 'make-linux-like-mac-os',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'last_post_date' => '2008-11-18 16:29:05',
            'created_at' => '2008-11-18 16:29:05'
        ]);

        $thread8 = Thread::create([
            'user_id' => $user3->id,
            'category_id' => $category2->id,
            'visits' => 3,
            'subject' => 'Things to do after buying new computer',
            'slug' => 'things-to-do-after-buying-new-computer',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'last_post_date' => '2008-11-15 16:29:05',
            'created_at' => '2008-11-15 16:29:05'
        ]);
    }
}
