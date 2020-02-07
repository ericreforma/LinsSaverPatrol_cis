<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    public function store_category(){
        return $this->hasOne('App\StoreCategory', 'id', 'store_category_id');
    }

    public function province(){
        return $this->hasOne('App\Province', 'code', 'province_code');
    }

    public function city(){
        return $this->hasOne('App\City', 'code', 'city_code');
    }

    public function barangay(){
        return $this->hasOne('App\Barangay','code', 'barangay_code');
    }

    public function idMedia(){
        return $this->hasOne('App\Media','id', 'idattachment_media_id');
    }

    public function storeMedia(){
        return $this->hasOne('App\Media', 'id', 'storephoto_media_id');
    }

    public function authors(){
        return $this->hasMany('App\Author','document_id','id');
    }

    public function previousEditor(){
        return $this->hasMany('App\Author','document_id','id')
        ->where('document_type','customer')
        ->where('user_role','edited')
        ->orderBy('id','desc')
        ->with('user');
    }

    public function creator(){
        return $this->hasMany('App\Author','document_id','id')
            ->where('document_type','customer')
            ->where('user_role','created')
            ->with('user');
    }
    
    public function sales(){
        return $this->hasMany('App\Sales','customer_id','id');
    }

}
