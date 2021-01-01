<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
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

    public function AllEmployee(){
        $employee=DB::table('users')->where('role','manager')->orWhere('role','cashier')->get();
        return view ('all_employee',compact('employee'));
    }

    public function EditEmployee($id){
        $emp=DB::table('users')->where('id',$id)->first();
        return view('edit_employee',compact('emp'));
    }

    public function UpdateEmployee(request $request,$id){
        
        $data=array();
        $data['role']=$request->role;

        $update=DB::table('users')->where('id',$id)->update($data);

        if ($update) {
            $notification=array(
                'message'=>'Employee Role Changed Successfully',
                'alert-type'=>'success'
            );
            return redirect('/all-employee')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function DeleteEmployee($id){
        $delete=DB::table('users')->where('id',$id)->first();
        $pic=$delete->photo;
        if($pic){
            $photo=$delete->photo;
            unlink($photo);
        }
        $dlt=DB::table('users')->where('id',$id)->delete();
        
        if ($dlt) {
            $notification=array(
                'message'=>'Employee Deleted Successfully',
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

    public function view_profile($id){
        return view('view_profile');
    }

    public function update_profile($id){
        return view('update_profile');
    }

    public function save_profile(Request $request,$id){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['shopname']=$request->shopname;
        $role=$request->role;
        if($role=='admin'){
            $shop=$request->shopname;
            DB::table('users')->where('role','manager')->orWhere('role','cashier')->update(['shopname'=>$shop]);
        }
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $image=$request->file('photo');

        if($image){
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplaod_path='public/employee/';
            $image_url=$uplaod_path.$image_full_name;
            $success=$image->move($uplaod_path,$image_full_name);

            if($success){
                $data['photo']=$image_url;
                $student=DB::table('users')->where('id',$id)->update($data);

            if ($student) {
                $notification=array(
                    'message'=>'Profile Updated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('home')->with($notification);
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
            $data['photo']=$request->old_photo;
            $student=DB::table('users')->where('id',$id)->update($data);

        if ($student) {
            $notification=array(
                'message'=>'Profile Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('home')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
        }
    }
}