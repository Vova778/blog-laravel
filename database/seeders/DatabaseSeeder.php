<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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

        User::factory()->count(5)->create([
            'is_admin' => true,
        ]);

        $users = User::all();

        $imagePath =  'fakeImages\Image_test.png';
        Storage::put('public/images',
         copy(public_path($imagePath), storage_path('app/public/images/Image_test.png')));
        $image = 'images/Image_test.png';

        foreach ($users as $user) {
            Post::factory()->count(11)->create([
                'user_id' => $user->id,
                'image' => $image,
            ]);
        }

        User::factory()->count(45)->create();

        $posts = Post::all();

        foreach ($posts as $post) {
            $randomUser = User::inRandomOrder()->take(rand(0, 50))->get();

            foreach ($randomUser as $user) {
                Comment::factory()->create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
