<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\RemainingDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{

    public function index()
    {
        return view('user.user-Dashboard');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit()
    {

        $id = Auth::user()->id;
        $user = Auth::user();
        $data = RemainingDetails::where('user_id',$id)->get();
        $remaining_filed = json_decode($data, true);
       $remaining_filed =  $remaining_filed[0];

// dd($remaining_filed[0]);

        return view('user.user-Dashboard-edit',compact('user','remaining_filed'));

    }


    public function update(Request $request)
    {

        $request->validate([
            'phone_number' => 'required',

        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $remaining_details = RemainingDetails::where('user_id',$id)->get();
// dd($remaining_details);




        $user->name = $request->name;
        $user->professional_title = $request->professional_title;
        // $user->email = $request->email;
        // $user->password = $request->password;
        $remaining_details->phone_number = $request->phone_number;
        $remaining_details->professional_license_number = $request->professional_license_number;
        $remaining_details->state_of_licensure = $request->state_of_licensure;
        $remaining_details->areas_of_expertise = $request->areas_of_expertise;
        $remaining_details->bio = $request->bio;
        $remaining_details->profile_picture = $request->profile_picture;
        $remaining_details->work_address = $request->work_address;



        $user->save();
        return "update";
        return redirect()->route('dashboard')
            ->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        //
    }
}
