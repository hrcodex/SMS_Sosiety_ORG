<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //_view expense Page__//
    public function index()
    {
        $member = Member::orderBy('id', 'DESC')->get();
        $expense = Expense::orderBy('id', 'DESC')->get();
        $total_expense_amonunt = Expense::orderBy('id', 'DESC')->sum('amount');
        return view('backend.expense.index', ['member' => $member, 'expense' => $expense, 'SumAmount' => $total_expense_amonunt]);
    }
    //_store expense entry__//
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');


        //Store In database
        $expense = new Expense();
        $expense->expense_id = $request->expense_id;
        $expense->amount = $request->amount;
        $expense->payment_method = $request->payment_method;
        $expense->expense_date = date('d-M-Y', strtotime($request->expense_date));
        $expense->expense_month = date('M-Y', strtotime($request->expense_date));
        $expense->expense_year = date('Y', strtotime($request->expense_date));
        $expense->note = $request->note;
        $expense->created_admin_id = Auth::user()->id;
        $expense->updated_admin_id = Auth::user()->id;

        if (file_exists($request->image)) { //if user select  image
            //__prepared image for upload start__//
            $image = $request->file('image');
            $imageName = 'expenseImage_' . time() . '.' . $image->getClientOriginalExtension();
            $directory = 'images/expense_images/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
            //__prepared image for upload end__//
            $expense->image = $imageUrl;
        }


        $expense->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__filter expense List__//
    public function filter($id)
    {
        date_default_timezone_set('Asia/Dhaka');


        if ($id == 1) { //__date

            $data = date('d-M-Y', strtotime(today()));
            $expense = Expense::where('expense_date', $data)->orderBy('id', 'DESC')->get();
            $total_expense_amonunt = Expense::where('expense_date', $data)->sum('amount');
        } elseif ($id == 2) { //__month

            $data = date('M-Y', strtotime(today()));
            $expense = Expense::where('expense_month', $data)->orderBy('id', 'DESC')->get();
            $total_expense_amonunt = Expense::where('expense_month', $data)->sum('amount');
        } elseif ($id == 3) { //__year

            $data = date('Y', strtotime(today()));
            $expense = Expense::where('expense_year', $data)->orderBy('id', 'DESC')->get();
            $total_expense_amonunt = Expense::where('expense_year', $data)->sum('amount');
        }

        $member = Member::orderBy('id', 'DESC')->get();
        return view('backend.expense.index', ['member' => $member, 'expense' => $expense, 'SumAmount' => $total_expense_amonunt]);
    }

    //Delete expense__//
    public function destroy($id)
    {
        $expense = Expense::find($id); //retrive data by event id

        if (file_exists($expense->image)) {
            unlink($expense->image);
        }
        $expense->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
