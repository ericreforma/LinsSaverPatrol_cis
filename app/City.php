<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'psgc_city';

    public function province() {
        return $this->belongsTo('App\Province','province_code','code');
    }

    public function barangays() {
        return $this->hasMany('App\Barangay','city_code','code');
    }
}