<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::All();

        $data = [
            'categories' => $categories,
        ];

        return view('admin.categories.index', $data);
    }

    public function show($slug){
        $category = Category::where('slug', '=', $slug)->first();
        $category_posts = $category->posts;

        if(!$category) {
            abort('404');
        }

        $data = [
            'category' => $category,
            'category_posts' => $category_posts,
        ];

        return view('admin.categories.show', $data);
    }

}
