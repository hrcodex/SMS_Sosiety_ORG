<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\MonthlyFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyFeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //__store New member in database__//
    public function store(Request $request)
    {

        //Store In data base
        $member = new MonthlyFee();
        $member->member_uniq_id = $request->member_uniq_id;

        $member->payment_date = date('d-M-Y', strtotime(today()));
        $member->payment_month = date('M-Y', strtotime($request->payment_month));
        $member->payment_year = date('Y', strtotime($request->payment_month));

        $member->amount = $request->amount;
        $member->payment_method = $request->payment_method;
        $member->created_admin_id = Auth::user()->id;
        $member->updated_admin_id = Auth::user()->id;

        $member->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
