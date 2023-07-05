<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Expense;
use App\Models\Member;
use App\Models\MonthlyFee;
use App\Models\Notice;
use App\Models\OrderEntry;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function default()
    {
        $filter_by = 'All Time';

        $total_member = Member::all();
        $total_admin = User::all();
        $total_donner = Member::where('position', 'Donner')->get();
        // ---------------
        $total_monthly_fees = MonthlyFee::orderBy('id', 'DESC')->sum('amount');
        $total_donation = Donation::orderBy('id', 'DESC')->sum('amount');
        $total_expense = Expense::orderBy('id', 'DESC')->sum('amount');
        // ---------------
        $in_total_amount = $total_monthly_fees + $total_donation;
        $current_amount = $in_total_amount - $total_expense;
        // ---------------
        $total_project = Event::all();
        $total_images = Event::all();

        $notice = Notice::all();

        return view('backend.dashboard.dashboard', [

            'total_member' => $total_member,
            'total_admin' => $total_admin,
            'total_donner' => $total_donner,
            'total_monthly_fees' => $total_monthly_fees,
            'total_donation' => $total_donation,
            'total_expense' => $total_expense,
            'in_total_amount' => $in_total_amount,
            'current_amount' => $current_amount,
            'total_project' => $total_project,
            'total_images' => $total_images,
            'notice' => $notice,
            'filter_by' => $filter_by,

        ]);
    }


    public function index($id)
    {


        if ($id == 2) { //day wize information 

            $data = date('d-M-Y', strtotime(today()));

            $filter_by = $data;
            $total_member = Member::where('created_date', $data)->get();
            $total_admin = User::where('created_date', $data)->get();
            $total_donner = Member::where('position', 'Donner')->where('created_date', $data)->get();
            // ---------------
            $total_monthly_fees = MonthlyFee::where('payment_date', $data)->sum('amount');
            $total_donation = Donation::where('donation_date', $data)->sum('amount');
            $total_expense = Expense::where('expense_date', $data)->sum('amount');

            // ---------------
            $in_total_amount = $total_monthly_fees + $total_donation;
            $current_amount = $in_total_amount - $total_expense;
            // ---------------
            $total_project = Event::where('date', $data)->get();
            $total_images = Event::where('date', $data)->get();
            // ---------------
            $notice = Notice::where('date', $data)->get();
        }
        if ($id == 3) { //month wize information 

            $data = date('M-Y', strtotime(today()));
            $filter_by = $data;

            $total_member = Member::where('created_month', $data)->get();
            $total_admin = User::all();
            $total_donner = Member::where('position', 'Donner')->where('created_month', $data)->get();
            // ---------------
            $total_monthly_fees = MonthlyFee::where('payment_month', $data)->sum('amount');
            $total_donation = Donation::where('donation_month', $data)->sum('amount');
            $total_expense = Expense::where('expense_month', $data)->sum('amount');
            // ---------------
            $in_total_amount = $total_monthly_fees + $total_donation;
            $current_amount = $in_total_amount - $total_expense;
            // ---------------
            $total_project = Event::where('month', $data)->get();
            $total_images = Event::where('month', $data)->get();
            // ---------------
            $notice = Notice::where('month', $data)->get();
        } elseif ($id == 4) { //Year wize information 

            $data = date('Y', strtotime(today()));
            $filter_by = $data;

            $total_member = Member::where('created_year', $data)->get();
            $total_admin = User::all();
            $total_donner = Member::where('position', 'Donner')->where('created_year', $data)->get();
            // ---------------
            $total_monthly_fees = MonthlyFee::where('payment_year', $data)->sum('amount');
            $total_donation = Donation::where('donation_year', $data)->sum('amount');
            $total_expense = Expense::where('expense_year', $data)->sum('amount');
            // ---------------
            $in_total_amount = $total_monthly_fees + $total_donation;
            $current_amount = $in_total_amount - $total_expense;
            // ---------------
            $total_project = Event::where('year', $data)->get();
            $total_images = Event::where('year', $data)->get();
            // ---------------
            $notice = Notice::where('year', $data)->get();
        }


        return view('backend.dashboard.dashboard', [

            'total_member' => $total_member,
            'total_admin' => $total_admin,
            'total_donner' => $total_donner,
            'total_monthly_fees' => $total_monthly_fees,
            'total_donation' => $total_donation,
            'total_expense' => $total_expense,
            'in_total_amount' => $in_total_amount,
            'current_amount' => $current_amount,
            'total_project' => $total_project,
            'total_images' => $total_images,
            'notice' => $notice,
            'filter_by' => $filter_by,

        ]);
    }
}
