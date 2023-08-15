<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;


class TransactionController extends Controller
{   
    public function Index(){
        $getPayment = DB::table('payment')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('Customer.Transaction.Index',['getPayment'=>$getPayment]);
    }

    
}
