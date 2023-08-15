<?php

namespace App\Http\Controllers\Shop\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;

class InfomationController extends Controller
{   
    public function index(){
        return view('Shop.Infomation.Index');
    }
    public function EditInfo(Request $request){
        
        DB::table('users')->where('id',Auth::user()->id)->update(
            [   
                'name'=>$request->name,
                'email'=>$request->email,
            ]
        );
         return redirect()->back()->with('msg', 'Đổi thông tin Success'); 
    }
}
