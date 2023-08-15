<?php

namespace App\Http\Controllers\Shiper\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class InfomationController extends Controller
{   
    public function index(){
       
        if(Session::get('confirm_face')  == "ok"){
           $getCity = DB::table('city')->get();
           $getBank = DB::table('bank')->get();
           return view('Shiper.Infomation.Index',['getCity'=>$getCity,'getBank'=>$getBank]);
       }else{
        return redirect('kenh-giao-hang/nhan-dien-guong-mat');
       }
       
   }
   public function EditInfo(Request $request){

    DB::table('users')->where('id',Auth::user()->id)->update(
        [   
            'email'=>$request->email,
            'area'=>$request->area,
            'bank_code'=>$request->bank_code,
            'bank_id'=>$request->bank_id,
        ]
    );
    return redirect()->back()->with('msg', 'Đổi thông tin thành công'); 
}
}
