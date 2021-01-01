<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    public function today_expense(){
        $today_expense_data=$this->get_today_expense_data();
        return view('today_expense_pdf')->with('today_expense_data',$today_expense_data);
    }

    public function get_today_expense_data(){
        $date=date("d-m-y");
        $today_expense_data=DB::table('expenses')
                    ->join('suppliers','expenses.sup_id','suppliers.id')
                    ->select('expenses.*','suppliers.name')      
                    ->where('date',$date)->get();

        return $today_expense_data;
    }

    public function monthly_expense(){
        $monthly_expense_data=$this->get_monthly_expense_data();
        return view('monthly_expense_pdf')->with('monthly_expense_data',$monthly_expense_data);
    }

    public function get_monthly_expense_data(){
        $month=date("F");
         $year=date("Y");
        $monthly_expense_data=DB::table('expenses')
                            ->join('suppliers','expenses.sup_id','suppliers.id')        
                            ->where('month',$month)->where('year',$year)->get();

        return $monthly_expense_data;
    }

    public function yearly_expense(){
        $yearly_expense_data=$this->get_yearly_expense_data();
        return view('yearly_expense_pdf')->with('yearly_expense_data',$yearly_expense_data);
    }

    public function get_yearly_expense_data(){
        $year=date("Y");
        $yearly_expense_data=DB::table('expenses')
                            ->join('suppliers','expenses.sup_id','suppliers.id') 
                            ->where('year',$year)->get();
        return $yearly_expense_data;
    }

    public function today_sales(){
        $today_sales_data=$this->get_today_sales_data();
        return view('today_sales_pdf')->with('today_sales_data',$today_sales_data);
    }

    public function get_today_sales_data(){
        $today=date("d-m-y");
        $today_sales_data=DB::table('orders')
                        ->join('orderdetails', 'orders.id','orderdetails.order_id')
                        ->join('products', 'orderdetails.product_id', 'products.id')
                        ->join('customers', 'orders.customer_id','customers.id')
                        ->select('customers.name as customer_name', 'products.product_name', 'orderdetails.*')
                        ->where('orders.order_date', $today)
                        ->get();

        return $today_sales_data;
    }

    public function monthly_sales(){
        $monthly_sales_data=$this->get_monthly_sales_data();
        return view('monthly_sales_pdf')->with('monthly_sales_data',$monthly_sales_data);
    }

    public function get_monthly_sales_data(){
        $month=date("m");
        $year=date("Y");
        $monthly_sales_data=DB::table('orders')
                          ->join('orderdetails', 'orders.id','orderdetails.order_id')
                          ->join('products', 'orderdetails.product_id','products.id')
                          ->join('customers', 'orders.customer_id','customers.id')
                          ->select('customers.name as customer_name', 'products.product_name','orderdetails.*')
                          ->whereMonth('orders.order_date', $month)
                          ->where('orderdetails.year', $year)
                          ->get();

        return $monthly_sales_data;
    }

    public function yearly_sales(){
        $yearly_sales_data=$this->get_yearly_sales_data();
        return view('yearly_sales_pdf')->with('yearly_sales_data',$yearly_sales_data);
    }

    public function get_yearly_sales_data(){
        $year=date("Y");
        $yearly_sales_data=DB::table('orders')
                        ->join('orderdetails', 'orders.id','orderdetails.order_id')
                        ->join('products', 'orderdetails.product_id','products.id')
                        ->join('customers', 'orders.customer_id','customers.id')
                        ->select('orders.*','customers.name as customer_name', 'products.product_name','orderdetails.*')
                        ->where('orderdetails.year', $year)
                        ->get();

        return $yearly_sales_data;
    }
}
