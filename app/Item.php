<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    
    public function prices(){
        return $this->hasMany('App\Price', 'item_id', 'id');
    }

    public function price(){
        return $this->hasOne('App\Price', 'id', 'item_price_id');
    }
    
    public function unit(){
        return $this->hasOne('App\Unit','id', 'unit_id');
    }

    public function authors(){
        return $this->hasMany('App\Author','document_id','id');
    }

    public function previousEditor(){
        return $this->hasMany('App\Author','document_id','id')
        ->where('document_type','item')
        ->where('user_role','edited')
        ->orderBy('id','desc')
        ->with('user');
    }

    public function creator(){
        return $this->hasMany('App\Author','document_id','id')
            ->where('document_type','item')
            ->where('user_role','created')
            ->with('user');
    }

}