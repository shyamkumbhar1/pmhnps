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
            'email' => 'required |email |unique:users',
            'password' => 'min:8|confirmed',
            'password_confirmation' => 'min:8'
        ]);



        $temp_user = new TempRegister();
        $temp_user->name = $validatedData['name'];
        $temp_user->professional_title = $validatedData['professional_title'];
        $temp_user->email = $validatedData['email'];
        $temp_user->password = Hash::make($validatedData['password']);



        $temp_user->save();

        $request->session()->put('user_id', $temp_user->id);

        return to_route('plans.all')->with('success', 'User created successfully.');
    }
}
