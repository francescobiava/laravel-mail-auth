<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 100)
            -> make()
            -> each(function($post) {
                $category = Category::inRandomOrder() -> first();
                $post -> category() -> associate($category);
                $post -> save();
            });
    }
}
