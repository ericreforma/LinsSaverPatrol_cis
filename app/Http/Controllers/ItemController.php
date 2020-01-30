<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;


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
        return view('items.add');
    }

    public function store(){
        session(['active_nav' => 'items']);
        $items = Item::all();

        return view('items.list', compact('items'));
    }

}
