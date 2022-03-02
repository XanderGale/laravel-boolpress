<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'slug',
    ];

    public static function getUniqueSlugFromPostTitle($title){
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
