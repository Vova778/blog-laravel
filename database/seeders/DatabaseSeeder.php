<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
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

        Article::factory()->count(5)->create()->each(function ($article) {
            $numberOfComments = mt_rand(0, 40);
            $article->comments()->saveMany(Comment::factory()->count($numberOfComments)->make());
        });
    }
}
