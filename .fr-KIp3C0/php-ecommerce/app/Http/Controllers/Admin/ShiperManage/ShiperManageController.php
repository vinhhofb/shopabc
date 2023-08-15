<?php

namespace App\Http\Controllers\Admin\ShiperManage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Redirect;
use DB;

class ShiperManageController extends Controller
{   
    public function DataFace($id){
        $getImages = DB::table('user_face')
        ->leftJoin('users','users.id','user_face.user_id')
        ->select('user_face.*','users.name')
        ->where('user_id',$id)
        ->get();
        return view('Admin.ShiperManage.DataFace',['getImages'=>$getImages]);
    }

    public function ResetFace($id){
        
        DB::table('user_face')->where('user_id',$id)->delete();
        return back();
    }

    public function ListFaceUser(){
        $GetShipers = DB::table('users')
        ->leftJoin('user_face','user_face.user_id','users.id')
        ->select('users.id','users.name','users.phone','users.email','user_face.user_id as check')
        ->orderBy('users.id', 'DESC') 
        ->where('users.role','=',4)
        ->groupBy('users.id','users.name','users.phone','users.email','user_face.user_id')
        ->paginate(10);
       
        return view('Admin.ShiperManage.ListShiperFace',
            [
                'GetShipers'=>$GetShipers,
            ]
        );
    }
    public function ListShiper(){
        $GetShipers = DB::table('users')
        ->orderBy('users.id', 'DESC') 
        ->where('users.role','=',4)
        ->paginate(10);
        return view('Admin.ShiperManage.ListShiper',
            [
                'GetShipers'=>$GetShipers,
            ]
        );
    }

    public function BlockUnBlockAccountShiper($id){
        if(isset($id)){

            $FindShiperById = User::find($id);
            if($FindShiperById != null){
                if($FindShiperById->active == 0){
                    $FindShiperById->active=1;
                    $FindShiperById->save();
                    return back();
                }else if($FindShiperById->active == 1){
                    $FindShiperById->active=0;
                    $FindShiperById->save();
                    return back();
                }else{
                    return Redirect::to('/404');
                }               
            }else{
                return Redirect::to('/404');
            }
        }else{
            return Redirect::to('/404');
        }
    }

    public function SearchShiper(Request $request){
    
        if(isset($request->keyword)){
            $GetShipers = DB::table('users')
            ->where('users.role', '=',4)
            ->Where('users.phone', '=', $request->keyword)
            ->orderBy('users.id', 'DESC') 
            ->paginate(10);
            return view('Admin.ShiperManage.ListShiper',
                [
                    'GetShipers'=>$GetShipers,
                ]
            );
        }
    }
    
}
