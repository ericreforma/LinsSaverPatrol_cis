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
        return $this->hasOne('App\Customer','id', 'customer_id');
    }
    public function unit(){
        return $this->hasOne('App\Unit','id','unit_id');
    }

    public function province(){
        return $this->hasOne('App\Province','code','province_code');
    }
    
    public function city(){
        return $this->hasOne('App\City','code','city_code');
    }
    public function barangay(){
        return $this->hasOne('App\Barangay','code','barangay_code');
    }
}
