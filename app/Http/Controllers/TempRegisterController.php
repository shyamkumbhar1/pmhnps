<?php

namespace App\Http\Controllers;

use App\Models\TempRegister;
use Illuminate\Http\Request;
use App\Models\RemainingDetails;
use Illuminate\Support\Facades\Hash;

class TempRegisterController extends Controller
{
    public function registerStepOne()
    {


        return view('register.step1');
    }
    public function postRegisterStepOne(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required',
            'professional_title' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);



        $temp_user = new TempRegister();
        $temp_user->name = $validatedData['name'];
        $temp_user->professional_title = $validatedData['professional_title'];
        $temp_user->email = $validatedData['email'];
        $temp_user->password = Hash::make($validatedData['password']);


        $temp_user->save();

        $request->session()->put('user_id', $temp_user->id);
        // dd($request->session()->all('user_id'));


        $message = "Please select Any Subscription Plan";


        // return view('register.step2', ['message' => $message]);
        return to_route('plans.all')->with('success', $message);
    }



}
