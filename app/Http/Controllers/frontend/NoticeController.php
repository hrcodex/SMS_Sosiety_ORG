<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $contact = Contact::find(1);
        $notice = Notice::orderBy('id', 'DESC')->get();


        return view('frontend.notice.notice', [

            'contact' => $contact,
            'notice' => $notice,
        ]);
    }
}
