<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;



class PracticeController extends Controller
{
    public function practice (){
   
        $plainPassword  = "Shyam Kumbhar Babu  ";
        // $hashedPassword = Hash::make($plainPassword);
        $cryptData = Crypt::encrypt($plainPassword);


         
        //  return $password ;
        dd($cryptData);
     
    }
}
