<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\backend\MemberController as BackendMemberController;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $contact = Contact::find(1);
        $member = Member::orderBy('id', 'DESC')->get();


        return view('frontend.members.members', [

            'contact' => $contact,
            'member' => $member,
        ]);
    }
}
