<?php

namespace App\Http\Controllers\backend\website;

use App\Http\Controllers\Controller;
use App\Models\Motive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //view about content
    public function index()
    {
        $motive = Motive::find(1);

        return view('backend.website.motive.index', ['data' => $motive]);
    }


    //update about content
    public function update(Request $request)
    {
        $motive = Motive::find(1);
        $motive->title = $request->title;
        $motive->slogan = $request->slogan;
        $motive->description = $request->description;
        $motive->video_link = $request->video_link;
        $motive->updated_admin_id = Auth::user()->id;
        $motive->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
