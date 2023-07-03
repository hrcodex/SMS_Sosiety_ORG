<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //__view All Member list__//
    public function index()
    {
        $member = Member::orderBy('id', 'DESC')->get();
        $position = Position::orderBy('id', 'DESC')->get();


        return view('backend.members.index', ['member' => $member, 'position' => $position]);
    }

    //__store New member in database__//
    public function store(Request $request)
    {

        //Store In data base
        $member = new Member();
        $member->name = $request->name;
        $member->fathers_name = $request->fathers_name;
        $member->mothers_name = $request->mothers_name;
        $member->profession = $request->profession;
        $member->national_identity = $request->national_identity;
        $member->phone = $request->phone;

        $member->created_date = date('d-M-Y', strtotime(today()));
        $member->created_month = date('M-Y', strtotime(today()));
        $member->created_year = date('Y', strtotime(today()));

        $member->email = $request->email;
        $member->publication_status = $request->publication_status;
        $member->address = $request->address;
        $member->position = $request->position;
        $member->facebook_id = $request->facebook_id;
        $member->instagram_id = $request->instagram_id;
        $member->twitter_id = $request->twitter_id;
        $member->linkedin_id = $request->linkedin_id;

        //UserID Start
        $givenLength = 6;
        $data = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $userId = '';
        for ($i = 1; $i <= $givenLength; $i++) {
            $index = rand(0, 34);
            $userId .= $data[$index];
        }
        $memberUserId = '#' . $userId;

        $member->user_id = $memberUserId;
        //UserID End

        //__prepared image for upload start__//
        $image = $request->file('image');
        $imageName = 'membersImage_' . time() . '.' . $image->getClientOriginalExtension();
        $directory = 'images/members_images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory . $imageName;
        //__prepared image for upload end__//
        $member->image = $imageUrl;
        $member->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Delete Member__//
    public function destroy($id)
    {
        $member = Member::find($id); //retrive data by product id
        if (file_exists($member->image)) {
            unlink($member->image);
        }
        $member->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //Edit Member's Information__//
    public function edit($id)
    {
        $member = Member::find($id);

        return response()->json($member);
    }


    //__Update Members Information__//
    public function update(Request $request)
    {
        $member = Member::find($request->member_id);
        $image = $request->file('image');

        if (file_exists($image)) { //if user select new image
            if ($member->image == null) {
                $imageNameUpload = 'MemberImage_' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/members_images/';
                $image->move($directory, $imageNameUpload);
                $imageUrl = $directory . $imageNameUpload;
            } else {
                unlink($member->image);
                $imageNameUpdate = 'MventImageUpdated' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/members_images/';
                $image->move($directory, $imageNameUpdate);
                $imageUrl = $directory . $imageNameUpdate;
            }
        } else { //if user does not select new image
            $imageUrl = $member->image;
        }
        $member->image = $imageUrl;
        $member->name = $request->name;
        $member->fathers_name = $request->fathers_name;
        $member->mothers_name = $request->mothers_name;
        $member->profession = $request->profession;
        $member->national_identity = $request->national_identity;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->publication_status = $request->publication_status;
        $member->address = $request->address;
        $member->position = $request->position;
        $member->facebook_id = $request->facebook_id;
        $member->instagram_id = $request->instagram_id;
        $member->twitter_id = $request->twitter_id;
        $member->linkedin_id = $request->linkedin_id;
        $member->updated_admin_id = Auth::user()->id;
        $member->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return  redirect()->back()->with($notification);
    }
}
