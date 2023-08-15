<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Session;

class LocationController extends Controller
{   
    public function SetSessionCity($id_city){
        Session::put('id_city', $id_city);
        return back();
    }

    public function SetSessionMarket($id_market){
        Session::put('id_market', $id_market);
        return back();
    }

    public function ResetLocation(){
        Session::forget('id_city');
        Session::forget('id_market');
        return back();
    }

}
