<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;

class PaymentController extends Controller
{   
    public function Payment(){
       $GetPayment = DB::table('payment')
       ->leftJoin('users','users.id','payment.user_id')
       ->leftJoin('bank','bank.id','users.bank_id')
       ->orderBy('payment.id', 'DESC') 
       ->where('payment.type','=',2)
       ->select('payment.*','users.name','users.phone','users.bank_code','users.bank_id','bank.name as bank_name')
       ->paginate(10);

       return view('Admin.Payment.ListPayment',['GetPayment'=>$GetPayment]);
   }

   public function FinishPayment($id){
    $getValue = DB::table('payment')->where('id',$id)->first();
    $balanceAdmin = DB::table('users')->where('id',54)->first('balance');
    DB::table('users')->where('id',54)->update(
        [
            'balance'=>$balanceAdmin->balance-$getValue->value,
        ]
    );

    DB::table('payment')->where('id',$id)->update(
        [   
            'status'=>1,
            'updated_at'=>time()
        ]
    );
    return back();     
}
}
