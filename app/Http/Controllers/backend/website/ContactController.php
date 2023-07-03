<?php

namespace App\Http\Controllers\backend\website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //view about content
    public function index()
    {
        $contact = Contact::find(1);
        return view('backend.website.contact.index', ['contact' => $contact]);
    }

    //update Contact content
    public function update(Request $request)
    {
        $contact = Contact::find(1);
        $contact->website_name = $request->website_name;
        $contact->author_name = $request->author_name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->base_url = $request->base_url;
        $contact->main_url = $request->main_url;
        $contact->keywords = $request->keywords;
        $contact->description = $request->description;
        $contact->facebook_id = $request->facebook_id;
        $contact->instagram_id = $request->instagram_id;
        $contact->twitter_id = $request->twitter_id;
        $contact->linkedin_id = $request->linkedin_id;
        $contact->updated_admin_id = Auth::user()->id;


        $image = $request->file('image');

        if (file_exists($image)) { //if user select new image
            if ($contact->image == null) {
                $imageNameUpload = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/logo/';
                $image->move($directory, $imageNameUpload);
                $imageUrl = $directory . $imageNameUpload;
            } else {
                unlink($contact->image);
                $imageNameUpdate = 'logo' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/logo/';
                $image->move($directory, $imageNameUpdate);
                $imageUrl = $directory . $imageNameUpdate;
            }
        } else { //if user does not select new image
            $imageUrl = $contact->image;
        }

        $contact->image = $imageUrl;
        $contact->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
