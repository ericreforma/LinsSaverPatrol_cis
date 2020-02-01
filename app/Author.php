<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    
    public function user(){
        return $this->hasOne('App\User','id', 'user_id');
    }
}
