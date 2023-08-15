<?php

namespace App\Http\Controllers\Customer\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;


class ChatController extends Controller
{   
   
    

    public function Index($user_id){
            return view('Customer.Chat.Index',['user_id'=>$user_id]);
    }
    
}
