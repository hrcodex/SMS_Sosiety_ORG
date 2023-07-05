<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MonthlyFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyFeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //_view Monthly Fee Report Page__//
    public function index()
    {
        $member = Member::orderBy('id', 'DESC')->get();
        $monthlyFee = MonthlyFee::orderBy('id', 'DESC')->get();
        $total_donation_amonunt = MonthlyFee::orderBy('id', 'DESC')->sum('amount');
        return view('backend.monthly_fee_report.index', ['member' => $member, 'monthlyFee' => $monthlyFee, 'SumAmount' => $total_donation_amonunt,]);
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

    //__filter Donation List__//
    public function filter($id)
    {
        date_default_timezone_set('Asia/Dhaka');


        if ($id == 1) { //__date

            $data = date('d-M-Y', strtotime(today()));
            $monthlyFee = MonthlyFee::where('payment_date', $data)->orderBy('id', 'DESC')->get();
            $total_donation_amonunt = MonthlyFee::where('payment_date', $data)->sum('amount');
        } elseif ($id == 2) { //__month

            $data = date('M-Y', strtotime(today()));
            $monthlyFee = MonthlyFee::where('payment_month', $data)->orderBy('id', 'DESC')->get();
            $total_donation_amonunt = MonthlyFee::where('payment_month', $data)->sum('amount');
        } elseif ($id == 3) { //__year

            $data = date('Y', strtotime(today()));
            $monthlyFee = MonthlyFee::where('payment_year', $data)->orderBy('id', 'DESC')->get();
            $total_donation_amonunt = MonthlyFee::where('payment_year', $data)->sum('amount');
        }

        $member = Member::orderBy('id', 'DESC')->get();
        return view('backend.monthly_fee_report.index', ['member' => $member, 'monthlyFee' => $monthlyFee, 'SumAmount' => $total_donation_amonunt]);
    }


    //Delete Donation__//
    public function destroy($id)
    {

        $monthlyFee = MonthlyFee::find($id); //retrive data by event id

        $monthlyFee->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
