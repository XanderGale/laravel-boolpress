<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $table = 'user_info';

    // Dichiaro appartenenza
    public function user(){
        return $this->belongsTo('App\User');
    }
}
