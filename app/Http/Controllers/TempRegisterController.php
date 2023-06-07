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

        return view('register.step2', ['message' => $message]);
        // return redirect()->back()->with('success', $message);
    }


}
