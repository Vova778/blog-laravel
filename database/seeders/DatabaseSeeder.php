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
            'email' => 'test@example.com',
        ]);

        User::factory()->count(10)->create();

        Article::factory()->count(35)->create()->each(function ($article) {
            $numberOfComments = mt_rand(0, 40);
            $article->comments()->saveMany(Comment::factory()->count($numberOfComments)->make());
        });
    }
}
