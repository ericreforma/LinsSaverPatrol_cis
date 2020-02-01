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

class CustomerController extends Controller
{
    public function __construct(){
        session(['active_nav' => 'customer']);
    }

    public function index() {
        session(['active_nav' => 'customer']);
        $customers = Customer::orderBy('id','desc')->get();

        return view('customers.list', compact('customers'));
    }

    public function store_view(){
        session(['active_nav' => 'customer']);
        $provinces = Province::all();
        $storeCategories = StoreCategory::all();

        return view('customers.add', compact('provinces','storeCategories'));
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
        $customer->idattachment_media_id = $this->saveMedia($customer->id, $request->file('idAttachment'));
        $customer->storephoto_media_id = $this->saveMedia($customer->id, $request->file('store_photo'));

        $customer->save();
        
        $author = new Author;
        $author->document_type = 'customer';
        $author->document_id = $customer->id;
        $author->user_id = $request->user()->id;
        $author->user_role = 'created';
        $author->save();

        return redirect()->route('customer_details', ['id' => $customer->id]);
    }

    public function details($id){
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

    public function edit_view($id){
        session(['active_nav' => 'customer']);
        $provinces = Province::all();
        $storeCategories = StoreCategory::all();
        $customer = Customer::find($id);

        return view('customers.edit', compact('customer', 'provinces','storeCategories'));
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
        
        return redirect()->route('customer_details', ['id' => $customer->id]);
    }
}
