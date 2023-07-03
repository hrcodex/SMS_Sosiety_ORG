<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //__view admin list__//
    public function index()
    {

        $adminUser = User::all();
        $AllMembers = Member::all();
        return view('backend.admin.index', ['user' => $adminUser, 'members' => $AllMembers]);
    }

    //__store new admin user__//
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users|max:255',

        ]);

        if ($validator->fails()) {

            $notification = array('messege' => $validator->errors(), 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->created_date = date('d-M-Y', strtotime(today()));
            $user->created_month = date('M-Y', strtotime(today()));
            $user->created_year = date('Y', strtotime(today()));
            $user->save();


            $notification = array('messege' => 'Save Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }


    //__destroy admin__//
    public function destroy($id)
    {

        $user = User::find($id); //retrive data by product id
        $user->delete();
        $notification = array('messege' => 'Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__view admin profile__//
    public function profile($id)
    {
        $user = User::find($id);
        return view('backend.admin_profile.index', ['user' => $user,]);
    }

    //__change Password__//
    public function changePassword(Request $request)
    {

        $user = User::find($request->id);
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        } else {
            $user->password = $user->password;
        }

        $user->role = $request->role;

        $user->save();

        $notification = array('messege' => 'Successfully Updated', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__Edit admin Profile information __//
    public function edit($id)
    {
        $userRow = User::find($id);
        return response()->json($userRow);
    }

    //__Update Admin Profile information __//
    public function update(Request $request)
    {

        $user = User::find($request->id);
        $image = $request->file('image');

        if (file_exists($image)) { //if user select new image
            if ($user->image == null) {
                $imageNameUpload = 'UsersImage_' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/Users_images/';
                $image->move($directory, $imageNameUpload);
                $imageUrl = $directory . $imageNameUpload;
            } else {
                unlink($user->image);
                $imageNameUpdate = 'UsersImageUpdate_' . time() . '.' . $image->getClientOriginalExtension();
                $directory = 'images/Users_images/';
                $image->move($directory, $imageNameUpdate);
                $imageUrl = $directory . $imageNameUpdate;
            }
        } else { //if user does not select new image
            $imageUrl = $user->image;
        }


        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageUrl,

        ]);
        $notification = array('messege' => 'Update Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
