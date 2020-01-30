<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'psgc_province';

    public function cities() {
        return $this->hasMany('App\City','province_code','code');
    }

    public function barangays() {
        return $this->hasMany('App\Barangay','province_code','code');
    }
}
