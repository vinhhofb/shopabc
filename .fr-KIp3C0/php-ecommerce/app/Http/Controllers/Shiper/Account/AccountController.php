<?php

namespace App\Http\Controllers\Shiper\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;


class AccountController extends Controller
{   
    public function Logout(){
        if(Auth::user()){
            Auth::logout();
            return Redirect::to('/');
        }
    }
    public function Login(){
        if(Auth::user()){
            return Redirect::to('/');
        }else{
            return view('Shiper.Login.Index');
        } 
    }
    public function LoginPost(Request $request){
        $phone =  $request->phone;
        $password =  md5($request->password);
        $user = User::where('phone', '=', $phone)->where('password', '=', $password)->first();
        

        if($user){
            if($user->role==4){
                if($user->active == 1){
                    Auth::login($user,true);
                    return Redirect::to('/kenh-giao-hang/nhan-dien-guong-mat');
                }else{
                    return redirect()->back()->with('msg', 'Tài khoản của bạn đã bị khóa');
                }  
            }else{
                return redirect()->back()->with('msg', 'Sai tài khoản hoặc mật khẩu');
            }
        }else{
             return redirect()->back()->with('msg', 'Sai tài khoản hoặc mật khẩu'); 
        }  

    }

    public function Signup(){
        if(Auth::user()){
            return Redirect::to('/');
        }else{
            $getCity = DB::table('city')->get();
            return view('Shiper.Signup.Index',['getCity'=>$getCity]);
        } 
    }
    public function SignupPost(Request $request){
        $phone =  $request->phone;
        $user = User::where('phone', '=', $phone)->first();
        if(isset($user)){
            return redirect()->back()->with('msg', 'Phone đã tồn tại');
        }else{
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->password =  md5($request['password']);
            $user->area =  $request['area'];
            $user->role = 4;
            if($user->save()){  
                Auth::login($user,true); 
                DB::table('cart')->insert(
                    [
                        'user_id' => Auth::user()->id,
                        'created_at' => time()
                    ]
                );           
                return Redirect::to('/kenh-giao-hang/dang-ky-guong-mat');
            }
        }
        
    }
}
