<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreCategory;
use Auth;

class StoreCategoryController extends Controller
{
    public function index(){
        if(Auth::user()->storecategory_role->role_view == 1){
            session(['active_nav' => 'store_category']);
            return view('storeCategory.index');
        }

        return abort(404);
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

    public function delete(Request $request){
        StoreCategory::find($request->id)->delete();
    }
}
