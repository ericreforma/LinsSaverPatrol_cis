<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Customer;
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
        $sales->province_code = $request->province_code;
        $sales->city_code = $request->city_code;
        $sales->barangay_code = $request->barangay_code;
        $sales->item_id = $request->item_id;
        $sales->price = $request->ledger_price;
        $sales->unit_id = $request->ledger_unit;
        $sales->quantity = $request->ledger_qty;
        $sales->amount = $request->amount;
        
        $sales->ro_amount = $request->ro_amount;
        $sales->memo = $request->memo;
        $sales->credit_amount = $request->credit_amount == '' || $request->credit_amount == 0 ? null : $request->credit_amount;

        $creditDueDate = null;
        if($request->has('hasDueDate')){
            $creditDueDate = Carbon::parse($request->credit_duedate)->format('Y-m-d');
        }

        $sales->credit_duedate = $creditDueDate;
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
    public function get_totals($id){
        $customer = Customer::find($id);

        $total_qty = 0;
        $total_ip = 0;
        $total_ro = 0;
        $total_credit = 0;

        $sales = $customer->sales;
        foreach($sales as $sale){
            $total_qty += $sale->quantity;
            $total_ip += $sale->amount;
            $total_ro +=  $sale->ro_amount == null ? 0 : $sale->ro_amount;
            $total_credit +=  $sale->credit_amount == null ? 0 : $sale->credit_amount;
        }

        return response()->json([
            'total_qty' => $total_qty,
            'total_ip' => $total_ip,
            'total_ro' => $total_ro,
            'total_credit' => $total_credit]
        );
    }
}
