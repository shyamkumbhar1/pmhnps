<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan as ModelsPlan;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $basic = ModelsPlan::where('name', 'basic')->first();
        $user = auth()->user();

        $professional = ModelsPlan::where('name', 'professional')->first();
        $enterprise = ModelsPlan::where('name', 'enterprise')->first();
        return view('home', compact('basic', 'professional', 'enterprise','user'));
    }
}
