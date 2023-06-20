<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;

class RemainingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.remaining-field');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        // $profile_picture_name = $request->file('profile_picture')->getClientOriginalName();


        // $path = $request->file('profile_picture')->store('public/Profile-Picture');
        // dd($request->profile_picture,$profile_picture_name,$path);

        $defaultImagePath = "public/Profile-Picture/pgBeIZNuHOeTh953DjfA2hOwSfBwQd7ixDameesb.png";

        $RemainingDetails = RemainingDetails::create(
            [
                'user_id' => $request->user_id,
                'phone_number' => $request->phone_number,
                'phone_number' => $request->phone_number,
                'professional_license_number' => $request->professional_license_number,
               'state_of_licensure' => $request->state_of_licensure,
                'areas_of_expertise' => implode($request->areas_of_expertise),
                'bio' => $request->bio,
                'profile_picture' => $defaultImagePath, // $profile_picture_name,
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
            'profile_picture' => $defaultImagePath,
            'work_address' => $request->work_address
        ]);

        // fetch Data from session
        $remainingDetails = $request->session()->get('remainingDetails');




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


    public function show(RemainingDetails $remainingDetails)
    {

    }


    public function edit(RemainingDetails $remainingDetails)
    {

    }


    public function update(Request $request, RemainingDetails $remainingDetails)
    {

    }


    public function destroy(RemainingDetails $remainingDetails)
    {

    }
}
