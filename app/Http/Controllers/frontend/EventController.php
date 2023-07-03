<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $contact = Contact::find(1);
        $events = Event::orderBy('id', 'DESC')->get();


        return view('frontend.events.events', [

            'contact' => $contact,
            'events' => $events,
        ]);
    }
}
