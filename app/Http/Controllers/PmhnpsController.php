<?php

namespace App\Http\Controllers;

use App\Models\City;

use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use App\Http\Requests\PmhnpRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PmhnpsController extends Controller
{
  
    public function index()
    {
        // $pmhnps= User::all();
        // $pmhnps = User::orderBy('id','desc')->paginate(5);
        $pmhnps = User::where('is_admin', null)->orderBy('id', 'desc')->paginate(10);
        // dd($pmhnps);
        return view('Admin.pmhnps.index', compact('pmhnps'));
    }

  
    public function create()
    {
        return view('Admin.pmhnps.create');
    }

   
    public function store(PmhnpRequest $request)
    {
        $pmhnp = new User;
		$pmhnp->name = $request->input('name');
		$pmhnp->email = $request->input('email');
        $pmhnp->save();

        return to_route('pmhnps.index');
    }

 
    public function show($id)
    {
        $pmhnp = User::findOrFail($id);
        return view('Admin.pmhnps.show',['pmhnp'=>$pmhnp]);
    }


    public function edit( Request $request , $id)
    {
        $pmhnp = User::findOrFail($id);
        $id = Auth::user()->id;
        $user = Auth::user();
        $data = RemainingDetails::where('user_id', $id)->get();
        $remaining_filed = json_decode($data, true);
        // $remaining_filed =  $remaining_filed[0];
        $states = State::where("country_id", 254)
        ->get(["name", "id"]);
        $state_of_licensures = json_decode($states,true);


        // dd($remaining_filed[0]);

        $cities = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);
        $states = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);
        $countries= Country::get(["name", "id"]);
        // return view('Admin.pmhnps.edit',['pmhnp'=>$pmhnp]);
        return view('Admin.pmhnps.edit', compact('pmhnp','user', 'remaining_filed','cities','states','countries','state_of_licensures'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PmhnpRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PmhnpRequest $request, $id)
    {
        $pmhnp = User::findOrFail($id);
		$pmhnp->name = $request->input('name');
		$pmhnp->email = $request->input('email');
        $pmhnp->save();

        return to_route('pmhnps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pmhnp = User::findOrFail($id);
        $pmhnp->delete();

        return to_route('pmhnps.index');
    }
}
