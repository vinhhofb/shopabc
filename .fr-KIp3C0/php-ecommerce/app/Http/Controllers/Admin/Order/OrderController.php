<?php

namespace App\Http\Controllers\Shiper\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;


class OrderController extends Controller
{   
    public function GetOrder(){
        $getCart = DB::table('cart')->where('status','=',1)->orderBy('id','desc')->get();


        $getShopCart = DB::table('cart_item')
        ->leftJoin('shop','shop.id','cart_item.shop_id')
        ->leftJoin('market','market.id','shop.id_market')
        ->select('cart_item.shop_id','shop.name as shop_name','market.name as market_name','cart_item.cart_id')
        ->groupby('cart_item.shop_id','shop.name','market.name','cart_item.cart_id')
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
            ->select('cart_item.shop_id','shop.name as shop_name','market.name as market_name','cart_item.cart_id')
            ->where('cart_item.cart_id','=',$getCart->id)
            ->groupby('cart_item.shop_id','shop.name','market.name','cart_item.cart_id')
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
        DB::table('cart')->where('id',$id)->update(
            [   
                'status'=>3,
            ]
        );
        echo "ok";
        
    }
}
