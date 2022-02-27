<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

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

        return view('admin.posts.create');
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
        $new_post->slug = $this->getUniqueSlugFromPostTitle($form_data['title']);

        $new_post->save();

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

        $data = [
            'post' => $post_to_update,
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

        $form_data = $request->all();
        $form_data['slug'] = $this->getUniqueSlugFromPostTitle($form_data['title']);
        
        $request->validate($this->ValidationRules());

        $post_to_update = Post::findOrFail($id);

        
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
    }

    protected function ValidationRules(){
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
        ];
    }

    protected function getUniqueSlugFromPostTitle($title){
        // Assegno uno slug unico
        $slug = Str::of($title)->slug('-');
        // Creo una base dello slug
        $slug_base = $slug;

        // Verifico se lo slug esiste già all'interno del database
        $slug_already_exists = Post::where('slug', '=', $slug)->first();
        // Creo un contatore
        $counter = 1;

        // Controllo che lo slug non esista nel db, e incremento il numero finale nel caso fosse già esistente
        while($slug_already_exists){
            $slug = $slug_base . '-' . $counter;
            $slug_already_exists = Post::where('slug', '=', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
