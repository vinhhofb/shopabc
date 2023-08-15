<?php

namespace App\Http\Controllers\Shiper\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;

class InfomationController extends Controller
{   
    public function index(){
        $getCity = DB::table('city')->get();
        return view('Shiper.Infomation.Index',['getCity'=>$getCity]);
    }
    public function EditInfo(Request $request){
        
        DB::table('users')->where('id',Auth::user()->id)->update(
            [   
                'name'=>$request->name,
                'email'=>$request->email,
                'area'=>$request->area,
            ]
        );
         return redirect()->back()->with('msg', 'Đổi thông tin Success'); 
    }
}
