<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\AuthenticationException;



class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // If validation fails, return validation errors in JSON response
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // dd($request->all());
            // Attempt to authenticate the user
            if (Auth::attempt($request->only('email', 'password'))) {
             
                $user = Auth::user();
                // Generate a token for the authenticated user
                $token = $user->createToken('Personal Access Token')->plainTextToken;

               // Return a JSON response with the token and user information
        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                // Add more user information fields here if needed
            ]
        ], 200);
            }

            // If authentication fails, throw an AuthenticationException with a suitable error message
            throw new AuthenticationException('The provided credentials are incorrect.');
        } catch (AuthenticationException $e) {
            // Catch the AuthenticationException and return a JSON response with the error message
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
