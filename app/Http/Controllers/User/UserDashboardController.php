<?php

namespace App\Http\Controllers\User;

use Throwable;
use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use Laravel\Cashier\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Yaml\Exception\ParseException;

class UserDashboardController extends Controller
{

    public function index(Request $request)
    {

        $cities = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);
        $states = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        $countries = Country::get(["name", "id"]);

        return view('user.user-Dashboard', compact('cities', 'states', 'countries'));
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


    public function edit(Request $request)
    {

        $id = Auth::user()->id;
        $user = Auth::user();
        $data = RemainingDetails::where('user_id', $id)->get();
        $remaining_filed = json_decode($data, true);
        // $remaining_filed =  $remaining_filed[0];

        // dd($remaining_filed[0]);

        $cities = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);
        $states = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        $countries= Country::get(["name", "id"]);
        return view('user.user-Dashboard-edit', compact('user', 'remaining_filed','cities','states','countries'));
    }


    public function update(Request $request)
    {
        // dd($request->all());

        $validator=  $request->validate([
            'phone_number' => 'required',
           'postal_code'=> 'required '

        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $remaining_details = RemainingDetails::where('user_id', $id)->get();

        $user->name = $request->name;
        $user->professional_title = $request->professional_title;
        // $user->email = $request->email;
        // $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        $user->professional_license_number = $request->professional_license_number;
        $user->state_of_licensure = $request->state_of_licensure;
        $user->areas_of_expertise = $request->areas_of_expertise;
        $user->bio = $request->bio;
        $user->profile_picture = $request->profile_picture;
        $user->work_address = $request->work_address;
        $user->address_line1 = $request->address_line1;
        $user->address_line2 = $request->address_line2;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;



        $user->save();
       
        return to_route('user.Dashboard')
            ->with('success', 'User updated successfully');
    }


    public function mySubscription()
    {
        $subscriptions = Subscription::where('user_id', auth()->id())->get();
        return view('user.my-subscription', compact('subscriptions'));
    }
    public function destroy($id)
    {
        //
    }
}
