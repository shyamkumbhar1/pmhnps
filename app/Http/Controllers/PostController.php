<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PostCreated;

class PostController extends Controller
{
    
    public function userCreated(){
// Post Created Logic
$user  = ['email'=>'shyamkumbhar509@gmail.com','name'=>'shyam Kumbhar'];
event(new PostCreated ($user));
return "post Created successfully";


    }
}
