<?php

namespace App\Http\Controllers\backend\website;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    //__view FAQ pages list__//
    public function index()
    {



        $data = Faq::orderBy('id', 'DESC')->get();
        return view('backend.website.faq.index', ['data' => $data]);
    }

    //__store new FAQ __//
    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->admin_id = Auth::user()->id;
        $faq->created_admin_id = Auth::user()->id;
        $faq->updated_admin_id = $request->updated_admin_id;
        $faq->publication_status = $request->publication_status;
        $faq->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__destroy new FAQ __//
    public function destroy($id)
    {
        $faq = Faq::find($id); //retrive data by product id
        $faq->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__view data  in edit form [Ajax] __//
    public function edit($id)
    {
        $faq = Faq::find($id); //retrive data by product id
        return response()->json($faq);
    }
    //__update data __//
    public function update(Request $request)
    {
        $faq = Faq::find($request->id); //retrive data by product id

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->created_admin_id = Auth::user()->id;
        $faq->updated_admin_id = $request->updated_admin_id;
        $faq->publication_status = $request->publication_status;
        $faq->save();
        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
