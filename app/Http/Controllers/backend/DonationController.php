<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //_view Donation Page__//
    public function index()
    {
        $member = Member::orderBy('id', 'DESC')->get();
        $donation = Donation::orderBy('id', 'DESC')->get();
        $total_donation_amonunt = Donation::orderBy('id', 'DESC')->sum('amount');
        return view('backend.donation.index', ['member' => $member, 'donation' => $donation, 'SumAmount' => $total_donation_amonunt]);
    }
    //_store Donation entry__//
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');


        //Store In database
        $donation = new Donation();
        $donation->donner_id = $request->donner_id;
        $donation->amount = $request->amount;
        $donation->payment_method = $request->payment_method;
        $donation->donation_date = date('d-M-Y', strtotime($request->donation_date));
        $donation->donation_month = date('M-Y', strtotime($request->donation_date));
        $donation->donation_year = date('Y', strtotime($request->donation_date));
        $donation->note = $request->note;
        $donation->created_admin_id = Auth::user()->id;
        $donation->updated_admin_id = Auth::user()->id;

        if (file_exists($request->image)) { //if user select  image
            //__prepared image for upload start__//
            $image = $request->file('image');
            $imageName = 'donationImage_' . time() . '.' . $image->getClientOriginalExtension();
            $directory = 'images/donation_images/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
            //__prepared image for upload end__//
            $donation->image = $imageUrl;
        }


        $donation->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__filter Donation List__//
    public function filter($id)
    {
        date_default_timezone_set('Asia/Dhaka');


        if ($id == 1) { //__date

            $data = date('d-M-Y', strtotime(today()));
            $donation = Donation::where('donation_date', $data)->orderBy('id', 'DESC')->get();
            $total_donation_amonunt = Donation::where('donation_date', $data)->sum('amount');
        } elseif ($id == 2) { //__month

            $data = date('M-Y', strtotime(today()));
            $donation = Donation::where('donation_month', $data)->orderBy('id', 'DESC')->get();
            $total_donation_amonunt = Donation::where('donation_month', $data)->sum('amount');
        } elseif ($id == 3) { //__year

            $data = date('Y', strtotime(today()));
            $donation = Donation::where('donation_year', $data)->orderBy('id', 'DESC')->get();
            $total_donation_amonunt = Donation::where('donation_year', $data)->sum('amount');
        }

        $member = Member::orderBy('id', 'DESC')->get();
        return view('backend.donation.index', ['member' => $member, 'donation' => $donation, 'SumAmount' => $total_donation_amonunt]);
    }

    //Delete Donation__//
    public function destroy($id)
    {
        $donation = Donation::find($id); //retrive data by event id

        if (file_exists($donation->image)) {
            unlink($donation->image);
        }
        $donation->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
