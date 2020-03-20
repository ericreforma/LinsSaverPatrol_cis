<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Province;
use DB;
use Auth;

class ReportController extends Controller
{
    public function index(){
        if(Auth::user()->report_role->role_view == 1) {
            session(['active_nav' => 'reports']);
            $provinces = Province::orderBy('description','asc')->get();

            return view('reports.index', compact('provinces'));
        }
        
        return abort(404);
    }

    public function get_city(Request $request){
        $date_from = $request->has('date_from') ? $request->date_from : null;
        $date_to = $request->has('date_to') ? $request->date_to : null;

        $sales_city_ = Sales::
            select('city_code','province_code', 
                DB::raw('sum(quantity) as total_quantity'), 
                DB::raw('sum(amount) as total_amount'), 
                DB::raw('sum(ro_amount) as total_ro_amount'),
                DB::raw('sum(credit_amount) as total_credit_amount')
            );

            
        if($date_from != null) {
            $sales_city_->whereBetween('sales_date', [$date_from, $date_to]);
        }

        $sales_city = $sales_city_->groupBy('city_code')
            ->orderBy('city_code','asc')
            ->with('customer')
            ->with('city')
            ->with('province')
            ->get();

        return $sales_city;
    }

    public function get_barangay(Request $request){
        $date_from = $request->has('date_from') ? $request->date_from : null;
        $date_to = $request->has('date_to') ? $request->date_to : null;
        
        $sales_barangay_ = Sales::
            select('barangay_code','city_code','province_code', 
                DB::raw('sum(quantity) as total_quantity'), 
                DB::raw('sum(amount) as total_amount'),
                DB::raw('sum(credit_amount) as total_credit_amount'), 
                DB::raw('sum(ro_amount) as total_ro_amount'),
                DB::raw('count(distinct customer_id) as total_reporting_customers')
            );

        if($request->isDate == 1) {
            $sales_barangay_->whereBetween('sales_date', [$date_from, $date_to]);
        }
        
        if($request->isLocation == 1) {
            $sales_barangay_->where('barangay_code', $request->barangay_code);
        }

        $sales_barangay = $sales_barangay_
            ->groupBy('barangay_code')
            ->orderBy('barangay_code','asc')
            ->with('barangay')
            ->with('city')
            ->with('province')
            ->get();

        foreach($sales_barangay as $brgy){
            $brgy->barangay->customers;
        }
        
        return $sales_barangay;
    }

    public function get_customer(Request $request){
        $date_from = $request->has('date_from') ? $request->date_from : null;
        $date_to = $request->has('date_to') ? $request->date_to : null;

        $sales_customer_ = Sales::
            select('customer_id', 
                DB::raw('sum(quantity) as total_quantity'),
                DB::raw('sum(amount) as total_amount'),
                DB::raw('sum(ro_amount) as total_ro_amount'),
                DB::raw('sum(credit_amount) as total_credit_amount')
            );
            
        if($request->isDate == 1) {
            $sales_customer_->whereBetween('sales_date', [$date_from, $date_to]);
        }
        
        if($request->isLocation == 1) {
            if($request->province_code != '') {
                $sales_customer_->where('province_code',$request->province_code);
            }
            if($request->city_code != '' || !is_null($request->city_code)) {
                $sales_customer_->where('city_code',$request->city_code);
            }
            if($request->barangay_code != '' || !is_null($request->barangay_code)) {
                $sales_customer_->where('barangay_code',$request->barangay_code);
            }
        }

        $sales_customer = $sales_customer_->groupBy('customer_id')
            ->orderBy('customer_id','asc')
            ->with('customer')
            ->get();

        return $sales_customer;
    }

    public function get_credit(Request $request){
        $date_from = $request->has('date_from') ? $request->date_from : null;
        $date_to = $request->has('date_to') ? $request->date_to : null;

        $sales_credit_ = Sales::
            select('credit_amount', DB::raw('sum(amount) as total_amount'));
            
        if($date_from != null) {
            $sales_credit_->whereBetween('sales_date', [$date_from, $date_to]);
        }

        $sales_credit = $sales_credit_->groupBy('credit_amount')
            ->orderBy('customer_id','asc')
            ->get();

        return $sales_credit;
    }

    public function get_daily(Request $request){
        $date_from = $request->has('date_from') ? $request->date_from : null;
        $date_to = $request->has('date_to') ? $request->date_to : null;

        $sales_daily_ = Sales::orderBy('sales_date', 'desc')
                ->with('customer')
                ->with('item');

        if($date_from != null) {
            $sales_daily_->whereBetween('sales_date', [$date_from, $date_to]);
        }

        $sales = $sales_daily_->get();

        return $sales;
    }
    
}
