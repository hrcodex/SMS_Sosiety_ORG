<?php

namespace App\Http\Controllers\backend\settings;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //view about content
    public function index()
    {
        $position = Position::orderBy('id', 'DESC')->get();
        return view('backend.settings.position.index', ['position' => $position]);
    }

    //__store new Position __//
    public function store(Request $request)
    {
        $position = new Position();
        $position->name = $request->name;
        $position->created_admin_id = Auth::user()->id;
        $position->publication_status = 1;
        $position->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__destroy new Position __//
    public function destroy($id)
    {
        $faq = Position::find($id); //retrive data by product id
        $faq->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
