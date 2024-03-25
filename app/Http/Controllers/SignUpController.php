<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VueUser; // Import the User model or your user model
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    public function signup(Request $request)
    {
      
       
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
     
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        // Create a new user
        $VueUser = new VueUser;
        $VueUser->full_name = $request->full_name;
        $VueUser->email = $request->email;
        $VueUser->password = bcrypt($request->password);
        $VueUser->save();

        // Return a success response
        return response()->json([
            'message' => 'VueUser registered successfully',
            'user'=>$VueUser
        ], 201);
    }
}
