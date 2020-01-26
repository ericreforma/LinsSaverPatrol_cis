<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index() {
        session(['active_nav' => 'customer']);

        $customers = Customer::all();

        return view('customers.list', compact('customers'));
    }

    public function store_view(){
        session(['active_nav' => 'customer']);

        return view('customers.add');
    }

    public function store(){
        
    }
}
