<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Price;
use App\Unit;
use App\Author;

class ItemController extends Controller
{
    public function __construct(){
        session(['active_nav' => 'items']);
    }

    public function index() {
        $items = Item::all();
        session(['active_nav' => 'items']);

        return view('items.list', compact('items'));
    }

    public function store_view(){
        session(['active_nav' => 'items']);
        $units = Unit::all();

        return view('items.add', compact('units'));
    }
    public function get_item($id){
        $item = Item::find($id);

        $item->price;
        $item->unit;
        
        return $item;
    }
    public function store(Request $request){
        $item = new Item;
        $item->brand = $request->brand;
        $item->category = $request->category;
        $item->name = $request->name;
        $item->unit_id = $request->unit_id;
        $item->save();

        $price = new Price;
        $price->item_id = $item->id;
        $price->price = $request->price;
        $price->unit_id = $request->unit_id;
        $price->save();
        
        $item->item_price_id = $price->id;
        $item->save();

        $author = new Author;
        $author->document_type = 'item';
        $author->document_id = $item->id;
        $author->user_id = $request->user()->id;
        $author->user_role = 'created';
        $author->save();

        return redirect()->route('item_list');
    }

    public function details($id){
        $item = Item::find($id);

        $creator = $item->creator->first();
        $editor=null;

        if($item->previousEditor->first() !== null){
            $editor = $item->previousEditor->first();
        }

        return view('items.details', compact('item','creator', 'editor'));
    }

    public function edit_view($id){
        $item = Item::find($id);
        $units = Unit::all();

        return view('items.edit', compact('item','units'));
    }

    public function edit_store(Request $request){
        $item = Item::find($request->id);
        $item->brand = $request->brand;
        $item->category = $request->category;
        $item->name = $request->name;
        $item->unit_id = $request->unit_id;
        $item->save();

        $price = new Price;
        $price->item_id = $item->id;
        $price->price = $request->price;
        $price->unit_id = $request->unit_id;
        $price->save();

        $item->item_price_id = $price->id;
        $item->save();

        $author = new Author;
        $author->document_type = 'item';
        $author->document_id = $item->id;
        $author->user_id = $request->user()->id;
        $author->user_role = 'edited';
        $author->save();

        return redirect()->route('item_details', ['id' => $item->id]);
    }
}