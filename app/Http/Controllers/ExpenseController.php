<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;

class ExpenseController extends Controller
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


    public function AddExpense(){
        return view('add_expense');
    }


    public function InsertExpense(Request $request){

        $validatedData=$request->validate([
            'sup_id'=>'required',
            'details'=>'required',
            'amount'=>'required',
        ]);

        $data=array();
        $data['sup_id']=$request->sup_id;
        $data['details']=$request->details;
        $data['quantity']=$request->quantity;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $exp=DB::table('expenses')->insert($data);
        
        if ($exp) {
            $notification=array(
                'message'=>'Expense Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }


    public function TodayExpense(){
        $date=date("d-m-y");
        
        $today=DB::table('expenses')
              ->join('suppliers','expenses.sup_id','suppliers.id')
              ->select('expenses.*','suppliers.name')      
              ->where('date',$date)->get();

        return view('today_expense',compact('today'));
    }

    public function DeleteTodayExpense($id){

        $dltexpense=DB::table('expenses')->where('id',$id)->delete();

        if ($dltexpense) {
            $notification=array(
                'message'=>'Expense Deleted Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
     }


     public function EditTodayExpense($id){

        //$edit=Expense::findorfail($id);
        $edit=DB::table('expenses')
             ->join('suppliers','expenses.sup_id','suppliers.id')
             ->where('expenses.id',$id)->first();
        
        return view('edit_today_expense',compact('edit'));
     }

     public function UpdateTodayExpense(Request $request,$id){
        $data=array();
        $data['sup_id']=$request->sup_id;
        $data['details']=$request->details;
        $data['quantity']=$request->quantity;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $exp=DB::table('expenses')->where('id',$id)->update($data);
        
        if ($exp) {
            $notification=array(
                'message'=>'Expense Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        }    

        else {
            $notification=array(
                'message'=>'Error',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

     }


     public function MonthlyExpense(){
         $month=date("F");
         $year=date("Y");

         $expense=DB::table('expenses')
                 ->join('suppliers','expenses.sup_id','suppliers.id')        
                 ->where('month',$month)->where('year',$year)->get();

         return view('monthly_expense',compact('expense'));
     }


    public function JanuaryExpense(){
        $month="january";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function FebruaryExpense(){
        $month="february";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function MarchExpense(){
        $month="march";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function AprilExpense(){
        $month="april";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function MayExpense(){
        $month="may";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function JuneExpense(){
        $month="june";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function JulyExpense(){
        $month="july";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function AugustExpense(){
        $month="august";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function SeptemberExpense(){
        $month="september";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function OctoberExpense(){
        $month="october";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function NovemberExpense(){
        $month="november";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function DecemberExpense(){
        $month="december";
        $year=date("Y");

        $expense=DB::table('expenses')->where('month',$month)->where('year',$year)->get();
        return view('second_monthly_expense',compact('expense'));
    }

    public function YearlyExpense(){
        $year=date("Y");
        $year=DB::table('expenses')
             ->join('suppliers','expenses.sup_id','suppliers.id') 
             ->where('year',$year)->get();

        return view('yearly_expense',compact('year'));
    }


}
