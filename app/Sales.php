<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    public function item(){
        return $this->hasOne('App\Item','id', 'item_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }
}
