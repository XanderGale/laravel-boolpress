<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $categories = [
            'Categoria 1',
            'Categoria 2', 
            'Categoria 3',
            'Categoria 4',
            'Categoria 5',
        ];

        foreach ($categories as $category){
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = Str::of($category)->slug('-');
            $new_category->save();
        }
    }
}
