<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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


    public function AddProduct(){
        return view('add_product');
    }


    public function AllProduct(){
        $product=DB::table('products')->get();
        return view('all_product',compact('product'));
    }


    public function InsertProduct(Request $request){
        $month=date("F");
        $year=date("Y");
        $date=date("d-m-y");

        $validatedData=$request->validate([
            'product_name'=>'required',
            'product_quantity'=>'required',
            'cat_id'=>'required',
            'sup_id'=>'required',
            'product_garage'=>'required',
            'buy_date'=>'required',
            'expire_date'=>'required',
            'buying_price'=>'required',
            'selling_price'=>'required',
            'product_image'=>'required',
        ]);

        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_quantity']=$request->product_quantity;
        $data['product_quantity_update']=0;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['previous_price']=$request->selling_price;
        $data['previous_selling_price']=$request->selling_price;
        $data['selling_price']=$request->selling_price;

        $data2=array();
        $data2['sup_id']=$request->sup_id;
        $data2['details']=$request->product_name;
        $data2['quantity']=$request->product_quantity;
        $price=$request->buying_price;
        $quantity=$request->product_quantity;
        $amount=$price * $quantity; 
        $data2['amount']=$amount;
        $data2['month']=$month;
        $data2['year']=$year;
        $data2['date']=$date;
        $expense=DB::table('expenses')->insert($data2);

        $image=$request->file('product_image');

        if($image){
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplaod_path='public/product/';
            $image_url=$uplaod_path.$image_full_name;
            $success=$image->move($uplaod_path,$image_full_name);

            if($success){
                $data['product_image']=$image_url;
                $product=DB::table('products')->insert($data);

            if ($product) {
                $notification=array(
                    'message'=>'Product Inserted Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.product')->with($notification);
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
    }


    public function ViewProduct($id){
        //$single=Product::findorfail($id);
        $product=DB::table('products')
        ->join('categories','products.cat_id','categories.id')
        ->join('suppliers','products.sup_id','suppliers.id')
        ->select('categories.cat_name','products.*','suppliers.name')
        ->where('products.id',$id)->first();
        
        return view('view_product',compact('product'));
     }


    public function DeleteProduct($id){
        //$delete=Customer::findorfail($id);
        $delete=DB::table('products')->where('id',$id)->first();
        
        $photo=$delete->product_image;
        unlink($photo);
        $dltproduct=DB::table('products')->where('id',$id)->delete();

        if ($dltproduct) {
            $notification=array(
                'message'=>'Product Deleted Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function EditProduct($id){
        $product=DB::table('products')->where('id',$id)->first();
        //$product=Product::findorfail($id)->first();
        return view('edit_product',compact('product'));
    }


    public function UpdateProduct(Request $request,$id){
        $validatedData=$request->validate([
            'product_name'=>'required',
            'cat_id'=>'required',
            'sup_id'=>'required',
            'product_garage'=>'required',
            'buy_date'=>'required',
            'expire_date'=>'required',
        ]);

        $data=array();
        $data['product_name']=$request->product_name;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_garage']=$request->product_garage;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        
        $image=$request->file('product_image');

        if($image){
            $image_name=str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $uplaod_path='public/product/';
            $image_url=$uplaod_path.$image_full_name;
            $success=$image->move($uplaod_path,$image_full_name);

            if($success){
                $data['product_image']=$image_url;
                $img=DB::table('products')->where('id',$id)->first();
                $image_path=$img->product_image;
                $done=unlink($image_path);

                $product=DB::table('products')->where('id',$id)->update($data);

            if ($product) {
                $notification=array(
                    'message'=>'Product Updated Successfully',
                    'alert-type'=>'success'
                );
                return Redirect()->route('all.product')->with($notification);
            }    

            else {
                return Redirect()->back();
            }

        }
    }

    else {
        $oldphoto=$request->old_photo;
        if($oldphoto){
            $data['product_image']=$oldphoto;
            $product=DB::table('products')->where('id',$id)->update($data);

        if ($product) {
            $notification=array(
                'message'=>'Product Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }    

        else {
            return Redirect()->back();
        }
      }
    }
  }

  public function UpdateStock(Request $request,$id){

    $data=array();
    $data['product_quantity']=$request->product_quantity;
    $data['product_quantity_update']=$request->product_quantity_update;

    $sum=array_sum($data);

    if($sum){
        $data['product_quantity']=$sum;
        $data['product_quantity_update']=0;
    }

    $update=DB::table('products')->where('id',$id)->update($data);

    if ($update) {
        $notification=array(
            'message'=>'Stock Updated Successfully',
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

public function UpdatePrice(Request $request,$id){

    $data=array();
    $data['previous_price']=$request->previous_selling_price;
    $data['previous_selling_price']=$request->selling_price;
    $data['selling_price']=$request->selling_price;

    $update=DB::table('products')->where('id',$id)->update($data);

    if ($update) {
        $notification=array(
            'message'=>'Price Updated Successfully',
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

    public function export(){
        return Excel::download(new ProductsExport,'products.xlsx');
    }

    public function ImportProduct(){
        return view('import_product');
    }

    public function import(Request $request){
        $import=Excel::import(new ProductsImport,$request->file('import_file'));

        if ($import) {
            $notification=array(
                'message'=>'Product Imported Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }    

        else {
            return Redirect()->back();
        }
    }

    

}
