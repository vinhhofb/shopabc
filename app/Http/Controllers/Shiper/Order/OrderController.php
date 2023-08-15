<?php

namespace App\Http\Controllers\Shiper\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Jobs\SendEMailAuto;

class OrderController extends Controller
{   
    public function GetOrder(){
        $getCart = DB::table('cart')->where('status','=',1)->orderBy('id','desc')->get();


        $getShopCart = DB::table('cart_item')
        ->leftJoin('shop','shop.id','cart_item.shop_id')
        ->leftJoin('users','users.id','shop.id_user')
        ->leftJoin('market','market.id','shop.id_market')
        ->select('cart_item.shop_id','shop.name as shop_name','market.name as market_name','cart_item.cart_id','users.phone')
        ->groupby('cart_item.shop_id','shop.name','market.name','cart_item.cart_id','users.phone')
        ->get();

        $getProductsCart = DB::table('cart_item')
        ->leftJoin('products','products.id','cart_item.products_id')
        ->select('cart_item.id','products.image','products.name','products.price','cart_item.quanlity','cart_item.shop_id','products.id as product_id','cart_item.cart_id')
        ->get(); 

        $getConfig = DB::table('config')->get(); 
        return view('Shiper.Order.Index',['getCart'=>$getCart,'getShopCart'=>$getShopCart,'getProductsCart'=>$getProductsCart,'getConfig'=>$getConfig]);

        
    }
    public function Ship($id){
        DB::table('cart')->where('id',$id)->update(
            [   
                'shiper_id'=>Auth::user()->id,
                'status'=>2
            ]
        );

        $getAuthorCart =  DB::table('cart')->where('id',$id)->get('user_id')->first();
        SendEmailAuto::dispatch(2,$getAuthorCart->user_id);
        return Redirect::to('/kenh-giao-hang/quan-ly-don-hang');
    }


    public function ShipManage(){
        $getCart = DB::table('cart')
        ->where('status','=',2)
        ->where('shiper_id','=',Auth::user()->id)
        ->orderBy('id','desc')
        ->first();
        
        if($getCart !=null){

            $getShopCart = DB::table('cart_item')
            ->leftJoin('shop','shop.id','cart_item.shop_id')
            ->leftJoin('market','market.id','shop.id_market')
            ->leftJoin('users','users.id','shop.id_user')
            ->select('cart_item.shop_id','shop.name as shop_name','market.name as market_name','cart_item.cart_id','users.phone')
            ->where('cart_item.cart_id','=',$getCart->id)
            ->groupby('cart_item.shop_id','shop.name','market.name','cart_item.cart_id','users.phone')
            ->get();


            $getProductsCart = DB::table('cart_item')
            ->leftJoin('products','products.id','cart_item.products_id')
            ->where('cart_item.cart_id','=',$getCart->id)
            ->select('cart_item.id','products.image','products.name','products.price','cart_item.quanlity','cart_item.shop_id','products.id as product_id','cart_item.cart_id')
            ->get(); 


            $getConfig = DB::table('config')->get(); 
            return view('Shiper.Order.ManageShip',['getCart'=>$getCart,'getShopCart'=>$getShopCart,'getProductsCart'=>$getProductsCart,'getConfig'=>$getConfig]);
        }else{
            return view('Shiper.Order.ManageShip');
        }
        
    }
    public function ShipFinish($id){
        $getInfoCart = DB::table('cart')->where('id',$id)->first();
        DB::table('cart')->where('id',$id)->update(
            [   
                'status'=>3,
            ]
        );
        DB::table('users')->where('id',Auth::user()->id)->update(
            [   
                'balance'=>Auth::user()->balance +  $getInfoCart->total + $getInfoCart->fee,
            ]
        );

        DB::table('payment')->insert(
            [
                'name' => 'Cộng tiền',
                'type'=>3,
                'status'=>0,
                'value'=>$getInfoCart->total + $getInfoCart->fee,
                'created_at'=>time(),
                'user_id' => Auth::user()->id,
            ]
        );

        DB::table('ch_messages')->where('from_id',$getInfoCart->user_id)->where('to_id',$getInfoCart->shiper_id)->delete();
        DB::table('ch_messages')->where('from_id',$getInfoCart->shiper_id)->where('to_id',$getInfoCart->user_id)->delete();
        $getAuthorCart =  DB::table('cart')->where('id',$id)->get('user_id')->first();
        SendEmailAuto::dispatch(3,$getAuthorCart->user_id);
        echo "ok";
        
    }

    public function Transaction(){
        $getPayment = DB::table('payment')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('Shiper.Transaction.Index',['getPayment'=>$getPayment]);
    }

    public function Withdraw(){
        return view('Shiper.Withdraw.Index');
    }

    public function PostWithdraw(Request $request){
        DB::table('users')->where('id',Auth::user()->id)->update(
            [   
                'balance'=>Auth::user()->balance -  $request->amount,
            ]
        );

        DB::table('payment')->insert(
            [
                'name' => 'Withdraw',
                'type'=>2,
                'status'=>0,
                'value'=>$request->amount,
                'created_at'=>time(),
                'user_id' => Auth::user()->id,
            ]
        );
        return Redirect::to('/kenh-giao-hang/lich-su-giao-dich');
    }
}
