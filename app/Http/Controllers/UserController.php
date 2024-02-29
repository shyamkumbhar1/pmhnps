<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CreateUserJob;
use App\Jobs\SendWelcomeEmailJob;
use App\Jobs\LogRegistrationActivityJob;
use App\Jobs\NotifyAdminJob;
use Illuminate\Support\Facades\Bus;

class UserController extends Controller
{
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
}
