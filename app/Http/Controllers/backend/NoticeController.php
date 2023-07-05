<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    //__view Notice pages list__//
    public function index()
    {

        $data = Notice::orderBy('id', 'DESC')->get();
        return view('backend.notice.index', ['data' => $data]);
    }

    //__store new Notice __//
    public function store(Request $request)
    {
        $Notice = new Notice();
        $Notice->title = $request->title;
        $Notice->description = $request->description;

        $Notice->date = date('d-M-Y', strtotime(today()));
        $Notice->month = date('M-Y', strtotime(today()));
        $Notice->year = date('Y', strtotime(today()));

        $Notice->admin_id = Auth::user()->id;
        $Notice->created_admin_id = Auth::user()->id;
        $Notice->updated_admin_id = Auth::user()->id;
        $Notice->publication_status = $request->publication_status;
        $Notice->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__destroy new Notice __//
    public function destroy($id)
    {
        $Notice = Notice::find($id); //retrive data by product id
        $Notice->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__view data  in edit form [Ajax] __//
    public function edit($id)
    {
        $Notice = Notice::find($id); //retrive data by product id
        return response()->json($Notice);
    }
    //__update data __//
    public function update(Request $request)
    {
        $Notice = Notice::find($request->id); //retrive data by product id

        $Notice->title = $request->title;
        $Notice->description = $request->description;
        $Notice->updated_admin_id = Auth::user()->id;
        $Notice->publication_status = $request->publication_status;
        $Notice->save();
        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
