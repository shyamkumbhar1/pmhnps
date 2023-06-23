<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;

class RemainingDetailsController extends Controller
{
  


    public function create()
    {
        return view('user.remaining-field');
    }


    public function store(Request $request)
    {
        $user_id =auth()->user()->id;
        $request->validate([

            'user_id' => 'required',
            'phone_number' => 'required',
            'professional_license_number' => 'required',
            'state_of_licensure' => 'required',
            'areas_of_expertise' => 'required',
            'bio' => 'required',
            'profile_picture' => '',
            'work_address' => 'required'
        ]);

        // Image Upload
       if ($request->hasFile('profile_picture')) {
        $profile_picture_name = $request->file('profile_picture')->getClientOriginalName();


        $ImagePath = $request->file('profile_picture')->storeAs('public/Profile-Picture',$profile_picture_name);

       }

        $defaultImagePath = "public/Profile-Picture/default-image.jfif";

        $RemainingDetails = RemainingDetails::create(
            [
                'user_id' => $request->user_id,
                'phone_number' => $request->phone_number,
                'phone_number' => $request->phone_number,
                'professional_license_number' => $request->professional_license_number,
               'state_of_licensure' => $request->state_of_licensure,
                'areas_of_expertise' => implode($request->areas_of_expertise),
                'bio' => $request->bio,
                'profile_picture' => ($request->hasFile('profile_picture'))?$ImagePath :$defaultImagePath,
                'work_address' => $request->work_address
            ]
        );

        // Save Data To session
        $request->session()->put('remainingDetails', [
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'professional_license_number' => $request->professional_license_number,
            'state_of_licensure' => $request->state_of_licensure,
            'areas_of_expertise' => implode($request->areas_of_expertise),
            'bio' => $request->bio,
            'profile_picture' => ($request->hasFile('profile_picture'))?$ImagePath :$defaultImagePath,
            'work_address' => $request->work_address
        ]);

        // fetch Data from session
        $remainingDetails = $request->session()->get('remainingDetails');
        dd($remainingDetails);




// Update User Remaining data
        $user = User::findOrFail($user_id);

        if ($user ) {
            $user->phone_number = $remainingDetails['phone_number'];
            $user->professional_license_number =$remainingDetails['professional_license_number'];
            $user->state_of_licensure = $remainingDetails['state_of_licensure'];
            $user->areas_of_expertise = $remainingDetails['areas_of_expertise'];
            $user->bio = $remainingDetails['bio'];
            $user->profile_picture = $remainingDetails['profile_picture'];
            $user->work_address =$remainingDetails['work_address'];
            $user->save();
        }



        return to_route('user.Dashboard');
    }


}
