<?php

namespace App\Http\Controllers;

use App\Models\RemainingDetails;
use Illuminate\Http\Request;

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
        $user =auth()->user()->id;
    //    ddd($request->all());
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
        // return  $RemainingDetails;
        return to_route('user.Dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RemainingDetails  $remainingDetails
     * @return \Illuminate\Http\Response
     */
    public function show(RemainingDetails $remainingDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RemainingDetails  $remainingDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(RemainingDetails $remainingDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RemainingDetails  $remainingDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RemainingDetails $remainingDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RemainingDetails  $remainingDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(RemainingDetails $remainingDetails)
    {
        //
    }
}
