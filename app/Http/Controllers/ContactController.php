<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function contact_information(Request $request)
    {

        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_message']=$request->customer_message;

        $contact=DB::table('contacts')->insert($data);

        if ($contact) {
            return Redirect()->back();
        }    

        else {
            return Redirect()->back();
        }
    }

    public function all_contact(){

        $all_contact=DB::table('contacts')->get();

        return view('all_contact',compact('all_contact'));
    }

    public function delete_contact($id){

        $delete_contact=DB::table('contacts')->where('id',$id)->delete();
        
        if ($delete_contact) {
            $notification=array(
                'message'=>'Contact Deleted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function view_contact($id){

        $view_contact=DB::table('contacts')->where('id',$id)->first();

        return view('view_contact',compact('view_contact'));
    } 
}
