<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = [
            'First Tag 1',
            'Second Tag 2',
            'Third Tag 3',
            'FourthTag 4',
            'Fifth Tag 5',
        ];

        foreach($tags as $tag){
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Str::of($tag)->slug('-');
            $new_tag->save();
        }
    }
}
