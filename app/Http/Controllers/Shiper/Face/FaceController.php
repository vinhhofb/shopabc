<?php

namespace App\Http\Controllers\Shiper\Face;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
use Session;


class FaceController extends Controller
{   

    public function DataFace(){
        $getImages = DB::table('user_face')->where('user_id',Auth::user()->id)->get();
        return view('Shiper.DataFace.Index',['getImages'=>$getImages]);
    }

    public function ConfirmFace(){
        Session::put('confirm_face', 'ok');
        return redirect(url('kenh-giao-hang/thong-tin-tai-khoan'));
    }
    public function RegisterFace(){
        $checkHaveFace = DB::table('user_face')->where('user_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->first();
        if($checkHaveFace == null){
            return view('Shiper.RegisterFace.Index');
        }else{
            return redirect('kenh-giao-hang/thong-tin-tai-khoan');
        }   
    }

    public function PostRegisterFace(Request $request){
        $getMax = DB::table('user_face')->where('user_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->first();
        if($getMax == null){
            $getMax=1;
        }else{
            $getMax = $getMax->order_by+1;
        }
        $image_64 = $request->image;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
        $image = str_replace($replace, '', $image_64); 
        $image = str_replace(' ', '+', $image); 
        $imageName = $getMax.'.jpg';
        Storage::put('face-data/'.Auth::user()->name.'/'.$imageName, base64_decode($image));

        DB::table('user_face')->insert(['image'=>$imageName,'name'=>Auth::user()->name,'order_by'=>$getMax,'created_at'=>time(),'user_id'=>Auth::user()->id]);
    }


    public function CheckFace(){
        $checkHaveFace = DB::table('user_face')->where('user_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->first();

   

        $getShiper =DB::table('users')
        ->leftJoin('user_face','user_face.user_id','users.id')
        ->where('users.active',1)
        ->where('users.role',4)
        ->select('user_face.name')
        ->groupBy('user_face.name')
        ->get();
    

        if($checkHaveFace == null){
            return redirect('kenh-giao-hang/dang-ky-guong-mat');
        }else{
            return view('Shiper.CheckFace.Index',['getShiper'=>$getShiper]);
        }   
    }
}
