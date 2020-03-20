<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\Barangay;

class GeoController extends Controller
{
   public function get_provinces(){
        return Province::orderBy('description','asc')->get();
   }

   public function get_cities(Request $request) {
       $cities = City::where('province_code',$request->code)
                        ->orderBy('description','asc')->get();
                        
       return $cities;
   }

   public function get_barangays(Request $request) {
       $barangays = Barangay::where('city_code', $request->code)
                    ->orderBy('description','asc')->get();
       return $barangays;
   }

}
