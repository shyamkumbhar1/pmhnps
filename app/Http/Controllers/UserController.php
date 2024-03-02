<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\CreateUserJob;
use Illuminate\Support\Str;
use App\Jobs\NotifyAdminJob;
use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmailJob;
use Illuminate\Support\Facades\Bus;
use App\Jobs\LogRegistrationActivityJob;

use App\Services\VerificationMailService;
use App\Services\VerificationMailServiceInterface;

class UserController extends Controller
{
    protected $verificationMailService;

    public function __construct(VerificationMailServiceInterface $verificationMailService)
    {
        $this->verificationMailService = $verificationMailService;
    }

    public function register(Request $request)
    {
        // Assuming $userData is retrieved from the request
        $userData = $request->all();

        // Chain the jobs for user registration workflow
        $chain = [
            new CreateUserJob($userData),
            new SendWelcomeEmailJob($userData),
            new LogRegistrationActivityJob($userData),
            new NotifyAdminJob($userData),
        ];

        // Dispatch the job chain
        Bus::chain($chain)->dispatch();

        // Optionally, return a response to indicate successful registration
        return response()->json(['message' => 'User registration process initiated']);
    }

    public function registerUsingServiceProvider(Request $request)
    {

        $userData = $request->all();
        $verificationToken = Str::random(60);
        $userData['verification_token'] = $verificationToken;
       // Generate the verification link
       $verificationLink = 'http://localhost:8000/verify?verification_token=' . $verificationToken . '&email=' . urlencode($request->input('email'));


        $user = User::create($userData);
        // dd($user);
        $verificationMailService = app(VerificationMailService::class);
       // Send verification email
        $verificationMailService->sendVerificationEmail($user,$verificationLink);



        return response()->json(['message' => 'User registered successfully']);
    }




    public function verify(Request $request )
    {

       $verificationToken = $request->query('verification_token');
       $email = $request->query('email');

       $user = User::where('verification_token', $verificationToken)->where('email',$email)->first();



        if (!$user) {
            return response()->json(['message' => 'Invalid verification token'], 404);
        }

        $user->is_verified = true;
        $user->verification_token = null;
        $user->save();


        return response()->json(['message' => 'User verified successfully']);
    }

}
