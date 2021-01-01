<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Supplier;

class SupplierController extends Controller
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

//new supplier view

    public function index(){
        return view('add_supplier');
    }

//new supplier view

    public function InsertSupplier(Request $request){

        $validatedData=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|unique:suppliers|max:255',
            'phone'=>'required|max:25',
            'address'=>'required',
            'photo'=>'required',
            'city'=>'required',
            'type'=>'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['branchname']=$request->branchname;
        $data['city']=$request->city;
        $data['type']=$request->type;


        $image=$request->file('photo');

        if($image){
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplaod_path='public/supplier/';
            $image_url=$uplaod_path.$image_full_name;
            $success=$image->move($uplaod_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $customer=DB::table('suppliers')->insert($data);

            if ($customer) {
                $notification=array(
                    'message'=>'Supplier Inserted Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.supplier')->with($notification);
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

//show all suppliers----

    public function AllSupplier(){
        $supplier=Supplier::all();
        return view('all_supplier',compact('supplier'));
    }

//view a single supplier----

    public function ViewSupplier($id){
        $supplier=Supplier::findorfail($id);
        //$single=DB::table('suppliers')->where('id',$id)->first();
        
        return view('view_supplier',compact('supplier'));
     }

//delete a customer----

public function DeleteSupplier($id){
    $delete=Supplier::findorfail($id);
    //$delete=DB::table('suppliers')->where('id',$id)->first();
    
    $photo=$delete->photo;
    unlink($photo);
    $dltuser=DB::table('suppliers')->where('id',$id)->delete();

    if ($dltuser) {
        $notification=array(
            'message'=>'Supplier Deleted Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.supplier')->with($notification);
    }    

    else {
        $notification=array(
            'message'=>'Error!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }
 }     

 //edit a customer

 public function EditSupplier($id){
    $edit=Supplier::findorfail($id);
    //$edit=DB::table('suppliers')->where('id',$id)->first();
    
    return view('edit_supplier',compact('edit'));
 }


//update a supplier     

public function UpdateSupplier(Request $request,$id){
    $validatedData=$request->validate([
        'name'=>'required|max:255',
        'email'=>'required|max:255',
        'phone'=>'required|max:25',
        'address'=>'required',
        'type'=>'required',
        'accountholder'=>'required',
        'accountnumber'=>'required',
        'bankname'=>'required',
        'branchname'=>'required',
        'city'=>'required',
    ]);

    $data=array();
    $data['name']=$request->name;
    $data['email']=$request->email;
    $data['phone']=$request->phone;
    $data['address']=$request->address;
    $data['type']=$request->type;
    $data['accountholder']=$request->accountholder;
    $data['accountnumber']=$request->accountnumber;        
    $data['bankname']=$request->bankname;
    $data['branchname']=$request->branchname;
    $data['city']=$request->city;

    $image=$request->photo;

    if($image){
        $image_name=str_random(5);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $uplaod_path='public/supplier/';
        $image_url=$uplaod_path.$image_full_name;
        $success=$image->move($uplaod_path,$image_full_name);

        if($success){
            $data['photo']=$image_url;
            $img=DB::table('suppliers')->where('id',$id)->first();
            $image_path=$img->photo;
            $done=unlink($image_path);

            $user=DB::table('suppliers')->where('id',$id)->update($data);

        if ($user) {
            $notification=array(
                'message'=>'Supplier Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.supplier')->with($notification);
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
                $user=DB::table('suppliers')->where('id',$id)->update($data);
    
            if ($user) {
                $notification=array(
                    'message'=>'Supplier Updated Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.supplier')->with($notification);
            }    
    
            else {
                return Redirect()->back();
            }
    
         }
        }
    }     

}
