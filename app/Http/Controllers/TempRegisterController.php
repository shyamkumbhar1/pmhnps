<?php

namespace App\Http\Controllers;

use App\Models\TempRegister;
use Illuminate\Http\Request;

class TempRegisterController extends Controller
{
    public function registerStepOne()
    {
        return view('register.step1');
    }
    public function postRegisterStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'professional_title' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $user = new TempRegister();
        $user->full_name = $validatedData['full_name'];
        $user->professional_title = $validatedData['professional_title'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];

        // Save the user to the database
        $user->save();
        $message = "Please select Any Subscription Plan";

        // return view('register.step2', ['message' => $message]);
        return redirect('register-step-two')->with('success', $message);
    }

    public function registerStepTwo()
    {
        return view('register.step2');
    }
    public function subscriptionPlan()
    {
        return view('register.step2');
    }
    public function loginCreate()
    {
        return view('register.login');
    }
    public function loginStore()
    {
        // return "user Login Successfully";
        $message = "User Login Successfully";

        return redirect('profile-page')->with('success', $message);

    }

    public function profilePage (){
        return view('register.profile-page');

    }
    public function remainingDetailsCreate (){
        return view('register.remaining-details');

    }

}
