<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index()
    {

        $contact = Contact::find(1);
        $events = Event::find(1);


        return view('frontend.blog_details.blog_details', [

            'contact' => $contact,
            'data' => $events,
        ]);
    }
}
