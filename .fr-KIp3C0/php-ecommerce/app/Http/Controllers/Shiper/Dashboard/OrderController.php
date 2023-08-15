<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;

class OrderController extends Controller
{   
    public function index(){

        if(Session::get('confirm_face')  == "ok"){
            $getCart = DB::table('cart')->where('user_id',Auth::user()->id)->where('status','!=',0)->orderBy('id','desc')->get();
            $getShopCart = DB::table('cart_item')
            ->leftJoin('shop','shop.id','cart_item.shop_id')
            ->leftJoin('market','market.id','shop.id_market')
            ->where('cart_item.user_id','=',Auth::user()->id)
            ->select('cart_item.shop_id','shop.name as shop_name','market.name as market_name','cart_item.cart_id')
            ->groupby('cart_item.shop_id','shop.name','market.name','cart_item.cart_id')
            ->get();
            $getProductsCart = DB::table('cart_item')
            ->leftJoin('products','products.id','cart_item.products_id')
            ->where('cart_item.user_id','=',Auth::user()->id)
            ->select('cart_item.id','products.image','products.name','products.price','cart_item.quanlity','cart_item.shop_id','products.id as product_id','cart_item.cart_id')

            ->where('cart_item.user_id','=',Auth::user()->id)->get();       
            $getConfig = DB::table('config')->get(); 
            return view('Customer.Order.Index',['getCart'=>$getCart,'getShopCart'=>$getShopCart,'getProductsCart'=>$getProductsCart,'getConfig'=>$getConfig]);
        }else{
            return redirect('kenh-giao-hang/nhan-dien-guong-mat');
        }
    }
}
