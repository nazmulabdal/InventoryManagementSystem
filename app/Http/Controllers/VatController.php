<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VatController extends Controller
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

    public function AddVat()
    {
        return view('add_vat');
    }

    public function InsertVat(Request $request)
    {
        $data = array();
        $data['vat_percentage'] = $request->vat_percentage;

        $vat = DB::table('vats')->insert($data);

        if ($vat) {
            $notification = array(
                'message' => 'VAT Inserted Successfully',
                'alert-type' => 'success',
            );
            return Redirect::to('/home')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function ViewVat()
    {
        $vat = DB::table('vats')->get();
        return view('update_vat', compact('vat'));
    }

    public function UpdateVat(request $request, $id)
    {

        $data = array();
        $data['vat_percentage'] = $request->vat_percentage;

        $vat_update = DB::table('vats')->where('id', $id)->update($data);

        if ($vat_update) {
            $notification = array(
                'message' => 'VAT Updated Successfully',
                'alert-type' => 'success',
            );
            return Redirect::to('/home')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

}
