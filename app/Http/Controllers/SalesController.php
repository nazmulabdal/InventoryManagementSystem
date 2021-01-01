<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function TodaySales(){
        $today=date("d-m-y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id', 'products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name', 'orderdetails.*')
            ->where('orders.order_date', $today)
            ->get();

        return view('today_sales',compact('orders'));
    }


    public function MonthlySales()
    {

        $month=date("m");
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('monthly_sales', compact('orders', 'month'));
    }

    public function JanuarySales(){
        $month="01";
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('second_monthly_sales',compact('orders'));
    }

    public function FebruarySales(){
        $month="02";
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('second_monthly_sales',compact('orders'));
    }

    public function MarchSales(){
        $month="03";
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('second_monthly_sales',compact('orders'));
    }

    public function AprilSales(){
        $month="04";
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('second_monthly_sales',compact('orders'));
    }

    public function MaySales(){
        $month="05";
        $year=date("Y");

        $orders = DB::table('orders')
        ->join('orderdetails', 'orders.id','orderdetails.order_id')
        ->join('products', 'orderdetails.product_id','products.id')
        ->join('customers', 'orders.customer_id','customers.id')
        ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
        ->whereMonth('orders.order_date', $month)
        ->where('orderdetails.year', $year)
        ->get();

    return view('second_monthly_sales',compact('orders'));
    }

    public function JuneSales(){
        $month="06";
        $year=date("Y");

        $orders = DB::table('orders')
        ->join('orderdetails', 'orders.id','orderdetails.order_id')
        ->join('products', 'orderdetails.product_id','products.id')
        ->join('customers', 'orders.customer_id','customers.id')
        ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
        ->whereMonth('orders.order_date', $month)
        ->where('orderdetails.year', $year)
        ->get();

    return view('second_monthly_sales',compact('orders'));
    }

    public function JulySales(){
        $month="07";
        $year=date("Y");

        $orders = DB::table('orders')
        ->join('orderdetails', 'orders.id','orderdetails.order_id')
        ->join('products', 'orderdetails.product_id','products.id')
        ->join('customers', 'orders.customer_id','customers.id')
        ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
        ->whereMonth('orders.order_date', $month)
        ->where('orderdetails.year', $year)
        ->get();

        return view('second_monthly_sales',compact('orders'));
    }

    public function AugustSales(){
        $month="08";
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('second_monthly_sales',compact('orders'));
    }

    public function SeptemberSales(){
        $month="09";
        $year=date("Y");

        $orders = DB::table('orders')
        ->join('orderdetails', 'orders.id','orderdetails.order_id')
        ->join('products', 'orderdetails.product_id','products.id')
        ->join('customers', 'orders.customer_id','customers.id')
        ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
        ->whereMonth('orders.order_date', $month)
        ->where('orderdetails.year', $year)
        ->get();

    return view('second_monthly_sales',compact('orders'));
    }

    public function OctoberSales(){
        $month="10";
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('second_monthly_sales',compact('orders'));
    }

    public function NovemberSales(){
        $month="11";
        $year=date("Y");

        $orders = DB::table('orders')
        ->join('orderdetails', 'orders.id','orderdetails.order_id')
        ->join('products', 'orderdetails.product_id','products.id')
        ->join('customers', 'orders.customer_id','customers.id')
        ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
        ->whereMonth('orders.order_date', $month)
        ->where('orderdetails.year', $year)
        ->get();

    return view('second_monthly_sales',compact('orders'));
    }

    public function DecemberSales(){
        $month="12";
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->whereMonth('orders.order_date', $month)
            ->where('orderdetails.year', $year)
            ->get();

        return view('second_monthly_sales',compact('orders'));
    }


    public function YearlySales(){
        $year=date("Y");

        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.id','orderdetails.order_id')
            ->join('products', 'orderdetails.product_id','products.id')
            ->join('customers', 'orders.customer_id','customers.id')
            ->select('orders.*','customers.name as customer_name', 'products.product_name','orderdetails.*')
            ->where('orderdetails.year', $year)
            ->get();

        return view('yearly_sales', compact('orders'));
    }

}
