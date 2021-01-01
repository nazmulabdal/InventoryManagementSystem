<?php

namespace App\Http\Controllers;

use Cart;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
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

    public function AddCart(Request $request)
    {

        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['price'] = $request->price;

        $add = Cart::add($data);

        if ($add) {
            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Error!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function UpdateCart(Request $request, $rowId)
    {
        $data = array();
        $data['qty'] = $request->qty;
        $update = Cart::update($rowId, $data);

        if ($update) {
            $notification = array(
                'message' => 'Cart Updated Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Error!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function RemoveCart($rowId)
    {
        $remove = Cart::remove($rowId);

        if ($remove) {
            $notification = array(
                'message' => 'Error!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Product Removed Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function SelectCustomer()
    {

        if (Cart::count() == 0) {
            return view('empty_cart');
        } else {
            $customer = DB::table('customers')->get();
            return view('select_customer', compact('customer'));
        }

    }

    public function CreateInvoice(Request $request, $id)
    {

        $customer = DB::table('customers')->where('id', $id)->first();
        $contents = Cart::content();

        return view('invoice', compact('customer', 'contents'));
    }

    public function FinalInvoice(Request $request)
    {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['invoice_creator'] = $request->invoice_creator;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();

        foreach ($contents as $content) {
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->id;
            $odata['quantity'] = $content->qty;
            $odata['unitcost'] = $content->price;
            $odata['total'] = $content->total;
            $odata['year'] = date("Y");

            $insert = DB::table('orderdetails')->insert($odata);
        }

        if ($insert) {
            $notification = array(
                'message' => 'Invoice Created Successfully | Please Confirm the Order',
                'alert-type' => 'success',
            );
            Cart::destroy();
            return Redirect()->route('home')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }
}
