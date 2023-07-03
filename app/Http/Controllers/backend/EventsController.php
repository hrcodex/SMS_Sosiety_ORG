<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //__view All product list__//
    public function index()
    {
        $event = Event::orderBy('id', 'DESC')->get();

        return view('backend.events.index', ['event' => $event]);
    }
    //__view product details__//
    public function create()
    {
        return view('backend.events.create');
    }
    //__view Edit Event details__//
    public function edit($id)
    {
        $event = Event::find($id);
        return view('backend.events.edit', ['data' => $event]);
    }


    //__store new Event//
    public function store(Request $request)
    {
        //Store In data base
        $event = new Event();
        $event->title = $request->title;
        $event->project_name = $request->project_name;
        $event->date = date('d-M-Y', strtotime($request->date));
        $event->month = date('M-Y', strtotime($request->date));
        $event->year = date('Y', strtotime($request->date));

        $event->time = $request->time;
        $event->budget = $request->budget;
        $event->donner = $request->donner;
        $event->category = $request->category;
        $event->admin_id = $request->admin_id;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->publication_status = $request->publication_status;

        //__prepared image for upload start__//
        $image = $request->file('image');
        $imageName = 'eventsImage_' . time() . '.' . $image->getClientOriginalExtension();
        $directory = 'images/events_images/';
        $image->move($directory, $imageName);
        $imageUrl = $directory . $imageName;
        //__prepared image for upload end__//

        $event->image = $imageUrl;
        $event->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect('/event/index')->with($notification);
    }

    //__Update Event__//
    public function update(Request $request)
    {
        $event = Event::find($request->event_id);
        $image = $request->file('image');

        if (file_exists($image)) { //if user select new image
            if ($event->image == null) {
                $imageNameUpload = 'EventImage_' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/events_images/';
                $image->move($directory, $imageNameUpload);
                $imageUrl = $directory . $imageNameUpload;
            } else {
                unlink($event->image);
                $imageNameUpdate = 'EventImageUpdated' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/events_images/';
                $image->move($directory, $imageNameUpdate);
                $imageUrl = $directory . $imageNameUpdate;
            }
        } else { //if user does not select new image
            $imageUrl = $event->image;
        }
        $event->image = $imageUrl;
        $event->title = $request->title;
        $event->project_name = $request->project_name;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->budget = $request->budget;
        $event->donner = $request->donner;
        $event->category = $request->category;
        $event->admin_id = $request->admin_id;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->publication_status = $request->publication_status;
        $event->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect('/event/index')->with($notification);
    }

    //Delete Product__//
    public function destroy($id)
    {
        $event = Event::find($id); //retrive data by event id

        if (file_exists($event->image)) {
            unlink($event->image);
        }
        $event->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect('/event/index')->with($notification);
    }
}
