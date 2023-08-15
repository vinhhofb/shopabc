<?php

namespace App\Http\Controllers\Customer\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Jobs\SendEMailAuto;

class CartController extends Controller
{   
    public function Cart(){
        $getShopCart = DB::table('cart_item')
        ->leftJoin('shop','shop.id','cart_item.shop_id')
        ->leftJoin('market','market.id','shop.id_market')
        ->where('cart_item.user_id','=',Auth::user()->id)
        ->where('cart_item.status','=',0)
        ->select('cart_item.shop_id','shop.name as shop_name','market.name as market_name')
        ->groupby('cart_item.shop_id','shop.name','market.name')
        ->get();


        $getProductsCart = DB::table('cart_item')
        ->leftJoin('products','products.id','cart_item.products_id')
        ->select('cart_item.id','products.image','products.name','products.price','cart_item.quanlity','cart_item.shop_id','products.id as product_id')
        ->where('cart_item.status','=',0)
        ->where('cart_item.user_id','=',Auth::user()->id)->get();
        
        $getConfig = DB::table('config')->get();
        return view('Index.Cart.Index',['getShopCart'=>$getShopCart,'getProductsCart'=>$getProductsCart,'getConfig'=>$getConfig]);
    }
    public function AddToCart($id_product){

        $getInfoProduct = DB::table('products')
        ->leftJoin('shop','shop.id','products.id_shop')
        ->leftJoin('market','market.id','shop.id_market')
        ->select('products.*','shop.id as shop_id')
        ->where('products.id','=',$id_product)->first();
        // dd($getInfoProduct);
        $getCart = DB::table('cart')->where('user_id',Auth::user()->id)->where('status',0)->first();
        
        $checkHaveItem = DB::table('cart_item')
        ->leftJoin('cart','cart.id','cart_item.cart_id')
        ->where('cart_item.products_id','=',$id_product)
        ->where('cart_item.user_id','=',Auth::user()->id)
        ->where('cart.status','=',0)
        ->select('cart_item.id','cart_item.quanlity')->first();
        if($checkHaveItem == null){
            DB::table('cart_item')->insert(
                [
                    'products_id' => $id_product,
                    'quanlity'=>1,
                    'cart_id'=>$getCart->id,
                    'shop_id'=>$getInfoProduct->shop_id,
                    'created_at'=>time(),
                    'user_id' => Auth::user()->id,
                ]
            ); 
        }else{
            DB::table('cart_item')->where('id',$checkHaveItem->id)->update(
                [
                    'quanlity'=>$checkHaveItem->quanlity+1,
                    'updated_at'=>time(),
                ]
            ); 
        }
        echo "Thêm vào giỏ hàng thành công";
        
    }

    public function Payment(Request $request){

        $getConfig = DB::table('config')->get();
        $getCart = DB::table('cart')->where('user_id',Auth::user()->id)->where('status',0)->first();
        $user=DB::table('users')->where('id',Auth::user()->id)->first();
        DB::table('users')->where('id',Auth::user()->id)->update(
            [
                'balance'=>$user->balance-$request->total-$request->feeship,
            ]
        ); 
        DB::table('payment')->insert(
            [
                'name' => 'Đặt đơn hàng',
                'type'=>0,
                'status'=>0,
                'cart_id'=>$getCart->id,
                'value'=>$request->total+$request->feeship,
                'created_at'=>time(),
                'user_id' => Auth::user()->id,
            ]
        ); 
        DB::table('cart')->where('id',$getCart->id)->where('status',0)->update(
            [   
                'total'=>$request->total,
                'status'=>1,
                'fee'=>$request->feeship,
                'discount'=>$getConfig[2]->value,
                'vat'=>$getConfig[1]->value
            ]
        );
        DB::table('cart')->insert(
            [
                'user_id' => Auth::user()->id,
                'created_at' => time()
            ]
        );
        DB::table('cart_item')->where('user_id',Auth::user()->id)->where('status',0)->update(
            [   
                'status'=>1,
            ]
        );
        SendEmailAuto::dispatch(1,Auth::user()->id);
        return Redirect::to('/don-hang');
    }
    public function UpProduct($id_cart_item){
        if(isset($id_cart_item)){
            $getProduct = DB::table('cart_item')->where('id',$id_cart_item)->first();
            DB::table('cart_item')->where('id',$id_cart_item)->update(
                [   
                    'quanlity'=>$getProduct->quanlity+1,
                ]
            );
            return back();
        }
    }
    public function DowProduct($id_cart_item){
        if(isset($id_cart_item)){
            $getProduct = DB::table('cart_item')->where('id',$id_cart_item)->first();
            if($getProduct->quanlity !=1){
                DB::table('cart_item')->where('id',$id_cart_item)->update(
                    [   
                        'quanlity'=>$getProduct->quanlity-1,
                    ]
                );
            }
            return back();
        }
    }
    public function RemoveProduct($id_cart_item){
        if(isset($id_cart_item)){
            $getProduct = DB::table('cart_item')->where('id',$id_cart_item)->first();
            DB::table('cart_item')->where('id',$id_cart_item)->delete();
            return back();
        }
    }
}
