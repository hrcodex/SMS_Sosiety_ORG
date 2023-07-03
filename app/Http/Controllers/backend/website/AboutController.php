<?php

namespace App\Http\Controllers\backend\website;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //view about content
    public function index()
    {
        $about = About::find(1);

        return view('backend.website.about.index', ['data' => $about]);
    }


    //update about content
    public function update(Request $request)
    {
        $About = About::find(1);
        $About->desctiption = $request->desctiption;
        $About->video_link = $request->video_link;
        $About->updated_admin_id = Auth::user()->id;
        $About->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
