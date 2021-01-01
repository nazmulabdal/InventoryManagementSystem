<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
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


    public function PendingOrders(){
        $pending=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*',)
                ->where('order_status','pending')->get();     

        return view('pending_orders',compact('pending'));
    }


    public function ViewOrder($id){
        $order=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->where('orders.id',$id)->first();

        $ord=DB::table('orders')->where('id',$id)->first();        

        $order_details=DB::table('orderdetails')
                ->join('products','orderdetails.product_id','products.id')
                ->select('orderdetails.*','products.product_name')
                ->where('order_id',$id)->get();

        return view('view_order',compact('order','ord','order_details'));
    }


    public function ConfirmOrder($id){
        $invoice_number=rand();
        $confirm=DB::table('orders')->where('id',$id)->update(['order_status'=>'success','invoice_number'=>$invoice_number]);

        if ($confirm) {
            $notification=array(
                'message'=>'Order Confirmed! Please Deliver the Products!',
                'alert-type'=>'success'
            );
            return Redirect()->route('successful.orders')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }


    public function SuccessfulOrders(){
        $success=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*',)
                ->where('order_status','success')->get();     

        return view('successful_orders',compact('success'));
    }

    public function ViewSuccessfulOrder($id){
        $order=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->where('orders.id',$id)->first();

        $ord=DB::table('orders')->where('id',$id)->first();        

        $order_details=DB::table('orderdetails')
                ->join('products','orderdetails.product_id','products.id')
                ->select('orderdetails.*','products.product_name')
                ->where('order_id',$id)->get();

        return view('view_successful_order',compact('order','ord','order_details'));
    }

}
