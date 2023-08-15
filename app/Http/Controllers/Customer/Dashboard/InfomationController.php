<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;

class InfomationController extends Controller
{   
    public function index(){
        return view('Customer.Infomation.Index');
    }

    public function EditInfo(Request $request){
        
        DB::table('users')->where('id',Auth::user()->id)->update(
            [   
                'name'=>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
            ]
        );
         return redirect()->back()->with('msg', 'Đổi thông tin Success'); 
    }
}
