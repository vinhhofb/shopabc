<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;


class ChangePasswordController extends Controller
{   
    public function index(){
        return view('Admin.ChangePassword.Index');
    }

    public function ChangePasswordPost(Request $request){
        
        $passwordNow =  md5($request['passwordNow']);
        $passwordNew =  $request['passwordNew'];
        $passwordNewRe =  $request['passwordNewRe'];
        $CheckPassword = User::where('id',Auth::user()->id)->first();
        if($passwordNew == $passwordNewRe && $passwordNow == $CheckPassword->password){
            $CheckPassword->password = md5($passwordNew);
            $CheckPassword->save();
            return redirect()->back()->with('msg', 'Change Password Success'); 
        }else{
            return redirect()->back()->with('msg', 'Old password is not correct');
        }
        
    }
}
