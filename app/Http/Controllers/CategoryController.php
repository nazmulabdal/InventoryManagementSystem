<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
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


    public function AddCategory(){
        return view('add_category');
    }

    public function InsertCategory(Request $request){
        $data=array();
        $data['cat_name']=$request->cat_name;
        $cat=DB::table('categories')->insert($data);

        if ($cat) {
            $notification=array(
                'message'=>'Category Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function AllCategory(){
        $category=DB::table('categories')->get();
        return view('all_category',compact('category'));
    }


    public function DeleteCategory($id){
        $dlt=DB::table('categories')->where('id',$id)->delete();
        
        if ($dlt) {
            $notification=array(
                'message'=>'Category Deleted Successfully',
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


    public function EditCategory($id){
        $cat=DB::table('categories')->where('id',$id)->first();
        return view('edit_category',compact('cat'));
    }

    public function UpdateCategory(request $request,$id){
        
        $data=array();
        $data['cat_name']=$request->cat_name;
        $cat_up=DB::table('categories')->where('id',$id)->update($data);

        if ($cat_up) {
            $notification=array(
                'message'=>'Category Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
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
