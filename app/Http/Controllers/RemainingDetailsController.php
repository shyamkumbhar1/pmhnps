<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use Illuminate\Support\Facades\DB;

class RemainingDetailsController extends Controller
{



    public function create()
    {
      
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $data1 = DB::table('users')->paginate(10);

     
    return view('user.remaining-field', compact('cities', 'states', 'countries','data1'));

    }


    public function store(Request $request)
    {
        // dd($request->all());
        $user_id =auth()->user()->id;
        $request->validate([

            'user_id' => 'required',
            'phone_number' => 'required|numeric',
            'professional_license_number' => 'required',
            'state_of_licensure' => 'required',
            'areas_of_expertise' => 'required',
            'bio' => 'required',
            'profile_picture' => '',
            "address_line1" => 'required',
                  "address_line2" => 'required',
                  "country" => 'required',
                  "state" => 'required',
                  "city" => 'required',
                  "postal_code" => 'required |numeric|digits:5',
            
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
                'areas_of_expertise' => implode(', ',$request->areas_of_expertise),
                'bio' => $request->bio,
                'profile_picture' => ($request->hasFile('profile_picture'))?$ImagePath :$defaultImagePath,
                'work_address' => $request->work_address,
                
                  "address_line1" => $request->address_line1,
                  "address_line2" => $request->address_line2,
                  "country" => $request->country,
                  "state" => $request->state,
                  "city" => $request->city,
                  "postal_code" => $request->postal_code,
            ]
        );

        // Save Data To session
        $request->session()->put('remainingDetails', [
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'professional_license_number' => $request->professional_license_number,
            'state_of_licensure' => $request->state_of_licensure,
            'areas_of_expertise' => implode(', ',$request->areas_of_expertise),
            'bio' => $request->bio,
            'profile_picture' => ($request->hasFile('profile_picture'))?$ImagePath :$defaultImagePath,
            "address_line1" => $request->address_line1,
            "address_line2" => $request->address_line2,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "postal_code" => $request->postal_code,
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
            $user->address_line1 =$remainingDetails['address_line1'];
            $user->address_line2 =$remainingDetails['address_line2'];
            $user->country =$remainingDetails['country'];
            $user->state =$remainingDetails['state'];
            $user->city =$remainingDetails['city'];
            $user->city =$remainingDetails['city'];
            $user->postal_code =$remainingDetails['postal_code'];
            $user->save();
        }



        return to_route('user.Dashboard');
    }


}
