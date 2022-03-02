<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();

        $data = [
            'posts' => $posts,
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            'categories' => $categories,
            'tags' => $tags,
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $form_data = $request->all();

        // Richiamo la funzione pubblica di validazione
        $request->validate($this->ValidationRules());

        $new_post = new Post();
        $new_post->fill($form_data);



        // Assegno il valore al db dello slug
        $new_post->slug = Post::getUniqueSlugFromPostTitle($form_data['title']);

        $new_post->save();

        // Sincronizzo i tags SE SELEZIONATI
        if(isset($form_data['tags'])){
            $new_post->tags()->sync($form_data['tags']);
        }

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $post_to_show = Post::findOrFail($id);

        $data = [
            'post' => $post_to_show,
        ];

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post_to_update = Post::findOrFail($id);
        $categories = Category::all();

        $data = [
            'post' => $post_to_update,
            'categories' => $categories,
        ];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post_to_update = Post::findOrFail($id);

        $form_data = $request->all();
        
        if($form_data['title'] != $post_to_update->title){
            $form_data['slug'] = Post::getUniqueSlugFromPostTitle($form_data['title']);
        }
        
        $request->validate($this->ValidationRules());
        
        $post_to_update->update($form_data);

        return redirect()->route('admin.posts.show', ['post' => $post_to_update->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post_to_delete = Post::findOrFail($id);

        $post_to_delete->delete();

        return redirect()->route('admin.posts.index');
    }

    protected function ValidationRules(){
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
            'category_id' => 'exists:categories,id|nullable',
        ];
    }
}
