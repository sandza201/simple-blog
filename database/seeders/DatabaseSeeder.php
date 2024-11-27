<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
        ]);

        User::factory(20)->create();
        
        $users = User::all();

        $users->each(function ($user) use ($categories, $users) {
            Post::factory(rand(1, 4))->create([
                'author_id' => $user->id
            ])->each(function ($post) use ($categories, $users) {
                $post->categories()->attach($categories->random(rand(1, 5)));

                Comment::factory(rand(2, 10))->make()->each(function ($comment) use ($post, $users) {
                    $comment->post_id = $post->id;
                    $comment->author_id = $users->random()->id;
                    $comment->save();
                });
            });
        });
    }
}
