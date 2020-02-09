<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreCategory;

class StoreCategoryController extends Controller
{
    public function index(){
        session(['active_nav' => 'store_category']);

        return view('storeCategory.index');
    }

    public function view(){
        $storeCategories = StoreCategory::orderBy('id', 'desc')->get();

        return $storeCategories;
    }

    public function add(Request $request){
        if($request->isEdit == 0) {
            $cat = new StoreCategory;
        } else {
            $cat = StoreCategory::find($request->storeCategory_id);
        }

        $cat->description = $request->description;
        $cat->save();
    }

    public function details($id){
        $cat = StoreCategory::find($id);
        return $cat;
        
    }
}
