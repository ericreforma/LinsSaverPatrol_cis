<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $table = 'psgc_barangay';

    public function city() {
        return $this->belongsTo('App\City','city_code','code');
    }

    public function province() {
        return $this->belongsTo('App\Province','province_code','code');
    }

    public function customers() {
        return $this->hasMany('App\Customer','barangay_code','code');
    }
}
