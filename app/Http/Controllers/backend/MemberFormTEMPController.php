<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberFormTEMPController extends Controller
{
    //__view All Member list__//
    public function index()
    {
        return view('backend.MemberFormTEMP.index');
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

        $member->payment_date = date('d-M-Y', strtotime($request->payment_month));
        $member->payment_month = date('M-Y', strtotime($request->payment_month));
        $member->payment_year = date('Y', strtotime($request->payment_month));

        $member->email = $request->email;
        $member->publication_status = 1;
        $member->address = $request->address;
        $member->position = 'Member';
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
        return redirect('/create_member/registration/success');
    }

    //__view All Member list__//
    public function registrationSuccess()
    {
        return view('backend.MemberFormTEMP.success');
    }
}
