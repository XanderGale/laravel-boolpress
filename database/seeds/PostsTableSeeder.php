<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i < 10; $i++ ){
            $new_post = new Post();
            $new_post->title = $faker->paragraph(2, 5);
            $new_post->content = $faker->paragraph(10, 20);
            $new_post->slug = Str::of($new_post->title)->slug('-');
            $new_post->save();
        }
    }
}
