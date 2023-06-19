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
        // dd($basic);
        $professional = ModelsPlan::where('name', 'professional')->first();
        $enterprise = ModelsPlan::where('name', 'enterprise')->first();
        return view('strip.plans', compact('basic', 'professional', 'enterprise'));
    }
}
