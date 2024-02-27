<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


class PracticeController extends Controller
{
    public function practice (){
   

      
            return config('constants.name');
    }
}
