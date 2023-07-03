<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Motive;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {


        $slider = Slider::orderBy('id', 'DESC')->get();
        $about = About::find(1);
        $faq = Faq::where('publication_status', 'Published')->get();
        $event = Event::latest()->take(3)->get();
        $motive = Motive::find(1);
        $contact = Contact::find(1);

        return view('frontend.home.home', [

            'slider' => $slider,
            'about' => $about,
            'faq' => $faq,
            'event' => $event,
            'motive' => $motive,
            'contact' => $contact,
        ]);
    }
}
