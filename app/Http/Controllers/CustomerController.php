<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;

class CustomerController extends Controller
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

//new customer view

    public function index(){
        return view('add_customer');
    }

    public function InsertCustomer(Request $request){

        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|unique:customers|max:255',
            'phone'=>'required|max:25',
            'address'=>'required',
            'photo'=>'required',
            'city'=>'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;


        $image=$request->file('photo');

        if($image){
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplaod_path='public/customer/';
            $image_url=$uplaod_path.$image_full_name;
            $success=$image->move($uplaod_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $customer=DB::table('customers')->insert($data);

            if ($customer) {
                $notification=array(
                    'message'=>'Customer Inserted Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.customer')->with($notification);
            }    

            else {
                $notification=array(
                    'message'=>'Error!',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }

        }

            else {
               return Redirect()->back(); 
            }

        }

        else {
            return Redirect()->back();
        }

    }

    public function SaveCustomer(Request $request){

        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|unique:customers|max:255',
            'phone'=>'required|max:25',
            'address'=>'required',
            'photo'=>'required',
            'city'=>'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;


        $image=$request->file('photo');

        if($image){
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplaod_path='public/customer/';
            $image_url=$uplaod_path.$image_full_name;
            $success=$image->move($uplaod_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $customer=DB::table('customers')->insert($data);

            if ($customer) {
                $notification=array(
                    'message'=>'Customer Inserted Successfully',
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

            else {
               return Redirect()->back(); 
            }

        }

        else {
            return Redirect()->back();
        }

    }

    public function AllCustomer(){
        $customer=Customer::all();
        //$customer=DB::table('customers)->get();
        return view('all_customer',compact('customer'));
    }


    public function ViewCustomer($id){
        $single=Customer::findorfail($id);
        //$single=DB::table('customers')->where('id',$id)->first();
        
        return view('view_customer',compact('single'));
     }


    public function DeleteCustomer($id){
        $delete=Customer::findorfail($id);
        //$delete=DB::table('customers')->where('id',$id)->first();
        
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('customers')->where('id',$id)->delete();

        if ($dltuser) {
            $notification=array(
                'message'=>'Customer Deleted Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.customer')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
     }


     public function EditCustomer($id){
        $edit=Customer::findorfail($id);
        //$edit=DB::table('customers')->where('id',$id)->first();
        
        return view('edit_customer',compact('edit'));
     }
   

     public function UpdateCustomer(Request $request,$id){
        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:25',
            'address'=>'required',
            'account_holder'=>'required',
            'account_number'=>'required',
            'bank_name'=>'required',
            'bank_branch'=>'required',
            'city'=>'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;        
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        $image=$request->photo;

        if($image){
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplaod_path='public/customer/';
            $image_url=$uplaod_path.$image_full_name;
            $success=$image->move($uplaod_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $img=DB::table('customers')->where('id',$id)->first();
                $image_path=$img->photo;
                $done=unlink($image_path);

                $user=DB::table('customers')->where('id',$id)->update($data);

            if ($user) {
                $notification=array(
                    'message'=>'Customer Updated Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.customer')->with($notification);
            }    

            else {
                return Redirect()->back();
            }

        }
    }

    else {
        $oldphoto=$request->old_photo;
        if($oldphoto){
            $data['photo']=$oldphoto;
            $user=DB::table('customers')->where('id',$id)->update($data);

        if ($user) {
            $notification=array(
                'message'=>'Customer Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.customer')->with($notification);
        }    

        else {
            return Redirect()->back();
        }

     }
    }
 }     

}
