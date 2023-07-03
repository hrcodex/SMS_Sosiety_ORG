<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $contact = Contact::find(1);
        $image = Event::orderBy('id', 'DESC')->get();

    
        return view('frontend.gallery.gallery', [

            'contact' => $contact,
            'image' => $image,
        ]);
    }
}
