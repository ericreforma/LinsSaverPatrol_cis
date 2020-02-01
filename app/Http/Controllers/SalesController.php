<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function store(Request $request){
        if($request->isEdit == 0) {
            $sales = new Sales;
        } else {
            $sales = Sales::find($request->sales_id);
        }
        
        $sales->sales_date = Carbon::parse($request->ledger_date)->format('Y-m-d');
        $sales->customer_id = $request->customer_id;
        $sales->item_id = $request->item_id;
        $sales->price = $request->ledger_price;
        $sales->unit_id = $request->ledger_unit;
        $sales->quantity = $request->ledger_qty;
        $sales->amount = $request->amount;
        $sales->debit_amount = $request->debit_amount;
        $sales->save();
    }
    public function delete(Request $request){
        $sale = Sales::find($request->id);

        $sale->delete();
    }
    
    public function get_ledger($id){
        $sales = Sales::where('customer_id',$id)
            ->orderBy('sales_date','desc')
            ->with('item')
            ->with('unit')
            ->get();

       
        return $sales;
    }

    public function get_details($id){
        $sale = Sales::find($id);

        return $sale;
    }
}
