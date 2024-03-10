<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'justforreg4@gmail.com',
            'is_admin' => true
        ]);

        User::factory()->count(10)->create();

        Post::factory()->count(5)->create()->each(function ($post) {
            $numberOfComments = mt_rand(0, 40);
            $post->comments()->saveMany(Comment::factory()->count($numberOfComments)->make());
        });
    }
}
