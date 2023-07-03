<?php

namespace App\Http\Controllers\backend\website;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //_view Donation Page__//
    public function index()
    {

        $slider = Slider::all();
        return view('backend.website.sliders.index', ['slider' => $slider]);
    }

    //_store new slider__//
    public function store(Request $request)
    {
       
        //Store In data base
        $slider = new Slider();
        $slider->description = $request->description;

        //__prepared image for upload start__//
        $image = $request->file('image');
        $imageName = 'sliderImage_' . time() . '.' . $image->getClientOriginalExtension();
        $directory = 'images/sliderImage/';
        $image->move($directory, $imageName);
        $imageUrl = $directory . $imageName;
        //__prepared image for upload end__//

        $slider->image = $imageUrl;
        $slider->save();

        $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Edit Slider's Information__//
    public function edit($id)
    {
        $slider = Slider::find($id);

        return response()->json($slider);
    }


    //_Update slider Information__//
    public function update(Request $request)
    {
        //Store In data base
        $event = Slider::find($request->slide_id);
        $event->description = $request->description;
        $image = $request->file('image');

        if (file_exists($image)) { //if user select new image
            if ($event->image == null) {
                $imageNameUpload = 'sliderImage_' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/sliderImage/';
                $image->move($directory, $imageNameUpload);
                $imageUrl = $directory . $imageNameUpload;
            } else {
                unlink($event->image);
                $imageNameUpdate = 'sliderImage' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/sliderImage/';
                $image->move($directory, $imageNameUpdate);
                $imageUrl = $directory . $imageNameUpdate;
            }
        } else { //if user does not select new image
            $imageUrl = $event->image;
        }

        $event->image = $imageUrl;
        $event->save();

        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //Delete Product__//
    public function destroy($id)
    {
        $slider = Slider::find($id); //retrive data by id

        if (file_exists($slider->image)) {
            unlink($slider->image);
        }
        $slider->delete();

        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
