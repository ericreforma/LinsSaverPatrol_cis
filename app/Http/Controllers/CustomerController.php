<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Province;
use App\StoreCategory;
use App\Media;
use App\Author;
use App\Item;
use App\Unit;
use Auth;
use DB;

class CustomerController extends Controller
{
    public function __construct(){
        session(['active_nav' => 'customer']);
    }

    public function index() {
        if(Auth::user()->customer_role->role_view == 1){
            session(['active_nav' => 'customer']);
            $customers = Customer::orderBy('id','desc')->get();
            $provinces = Province::all();
    
            return view('customers.list', compact('customers', 'provinces'));
        }

        return abort(404);
    }

    public function store_view(){

        if(Auth::user()->customer_role->role_add == 1){
            session(['active_nav' => 'customer']);
            $provinces = Province::orderBy('description','asc')->get();
            $storeCategories = StoreCategory::all();
    
            return view('customers.add', compact('provinces','storeCategories'));
        }

        return abort(404);
    }
    
    private function saveMedia($owner_id, $file) {
        session(['active_nav' => 'customer']);
        $media = new Media;
        $media->owner_id = $owner_id;
        $media->save();

        $extension = $file->extension();
        $filename = $media->owner_id . '_' . $media->id . '.' . $extension;
        $media->url = 'customers/' . $filename;
        $file->storeAs('/media/customers', $filename, 'public');
        $media->save();
    
        return $media->id;
      }

    public function store(Request $request){
        session(['active_nav' => 'customer']);
        $customer = new Customer;
        $customer->lastname = $request->lastname;
        $customer->firstname = $request->firstname;
        $customer->middlename = $request->middlename;
        $customer->store_name = $request->store_name;
        $customer->store_category_id = $request->store_category;
        $customer->contact_number = $request->contact_number;
        $customer->email = $request->email;
        $customer->store_name = $request->store_name;
        $customer->province_code = $request->province;
        $customer->city_code = $request->cities;
        $customer->barangay_code = $request->barangays;
        $customer->address = $request->address;
        $customer->landmark = $request->landmark;
        $customer->google_map = $request->google_map;
        $customer->save();

        $customer->reference_code = sprintf('%05d', $customer->id);
        $customer->code = substr($customer->barangay_code, 4) .'-' . substr($customer->barangay_code, 4, 3) . '-' . $customer->reference_code;


        if($request->has('idAttachment')){
            $customer->idattachment_media_id = $this->saveMedia($customer->id, $request->file('idAttachment'));
        }

        if($request->has('store_photo')){
            $customer->storephoto_media_id = $this->saveMedia($customer->id, $request->file('store_photo'));
        }

        $customer->save();
        
        $author = new Author;
        $author->document_type = 'customer';
        $author->document_id = $customer->id;
        $author->user_id = $request->user()->id;
        $author->user_role = 'created';
        $author->save();

        return redirect()->route('customer_details', ['id' => $customer->id]);
    }

    public function setStatus(Request $request){
        $customer = Customer::find($request->id);
        $customer->status = $request->status;
        $customer->save();

    }

    public function details($id){
        if(Auth::user()->customer_role->role_view == 1) {
            session(['active_nav' => 'customer']);
            $customer = Customer::find($id);
            $items = Item::all();
            $units = Unit::all();

            $creator = $customer->creator->first();
            $editor=null;

        

            if($customer->previousEditor->first() !== null){
                $editor = $customer->previousEditor->first();
            }

            return view('customers.details', compact('customer','creator', 'editor','items', 'units'));
        }

        return abort(404);
    }

    public function edit_view($id){
        if(Auth::user()->customer_role->role_edit == 1) {
            session(['active_nav' => 'customer']);
            $provinces = Province::all();
            $storeCategories = StoreCategory::all();
            $customer = Customer::find($id);

            return view('customers.edit', compact('customer', 'provinces','storeCategories'));
        }

        return abort(404);
    }

    public function edit_store(Request $request){
        session(['active_nav' => 'customer']);
        $customer = Customer::find($request->id);
        $customer->lastname = $request->lastname;
        $customer->firstname = $request->firstname;
        $customer->middlename = $request->middlename;
        $customer->store_name = $request->store_name;
        $customer->store_category_id = $request->store_category;
        $customer->contact_number = $request->contact_number;
        $customer->email = $request->email;
        $customer->store_name = $request->store_name;
        $customer->province_code = $request->province;
        $customer->city_code = $request->cities;
        $customer->barangay_code = $request->barangays;
        $customer->address = $request->address;
        $customer->landmark = $request->landmark;
        $customer->google_map = $request->google_map;
        $customer->save();

        if($request->has('idAttachment')){
            $customer->idattachment_media_id = $this->saveMedia($customer->id, $request->file('idAttachment'));
        }

        if($request->has('store_photo')){
            $customer->storephoto_media_id = $this->saveMedia($customer->id, $request->file('store_photo'));
        }

        $author = new Author;
        $author->document_type = 'customer';
        $author->document_id = $customer->id;
        $author->user_id = $request->user()->id;
        $author->user_role = 'edited';
        $author->save();

        $customer->save();

        DB::table('sales')
        ->where('customer_id', $customer->id)
        ->update([
            'province_code' => $customer->province_code,
            'city_code' => $customer->city_code,
            'barangay_code' => $customer->barangay_code,
        ]);
        
        
        return redirect()->route('customer_details', ['id' => $customer->id]);
    }

    public function get_list(Request $request){


        $customer = Customer::orderBy('id','desc')
                    ->with('store_category');

        if($request->filtered == 1){
            if($request->province != '') {
                $customer->where('province_code',$request->province);
            }
            if($request->city != '') {
                $customer->where('city_code',$request->city);
            }
            if($request->barangay != '') {
                $customer->where('barangay_code',$request->barangay);
            }
        }

        $customers = $customer->get();

        return $customers;
    }
    public function delete(Request $request){
        $customer = Customer::find($request->id);

        $customer->delete();
    }
}
