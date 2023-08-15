<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class ShopController extends Controller
{   

    public function ProductDetail($id){
        $GetProductDetail = DB::table('products')->where('id',$id)->first();
        if(isset(Auth::user()->id)){
            DB::table('trafic_history')
            ->insert(['product_id'=>$id,'category_id'=>$GetProductDetail->id_category,'user_id'=>Auth::user()->id,'created_at'=>time()]);
        }

        
        $GetProductReview = DB::table('review')
        ->leftJoin('users','users.id','review.user_id')
        ->select('review.*','users.name')
        ->where('product_id',$id)
        ->get();
        $GetProductReviewCount = DB::table('review')
        ->where('product_id',$id)
        ->count();
        $GetProductSellerCount = DB::table('products')
        ->where('products.id',$id)
        ->count();

        $getCategory = DB::table('products')
        ->where('products.id',$id)
        ->leftJoin('category','category.id','products.id_category')
        ->first('category.name');


        return view('Index.ProductDetail.Index',['GetProductDetail'=>$GetProductDetail,'GetProductReview'=>$GetProductReview,'GetProductReviewCount'=>$GetProductReviewCount,'GetProductSellerCount'=>$GetProductSellerCount,'getCategory'=>$getCategory]);
    }
    public function Index($id){

        $getShop =DB::table('shop')->where('shop.id',$id)
        ->leftJoin('users','users.id','shop.id_user')
        ->leftJoin('market','market.id','shop.id_market')
        ->leftJoin('city','city.id','market.id_city')
        ->select('shop.id','shop.name','shop.image','users.phone','market.name as name_market','city.name as name_city','shop.content')
        ->first();

        $GetProduct = DB::table('products')->orderBy('count_sale','desc')
        ->where('products.id_shop',$id)
        ->where('products.active',1)
        ->leftJoin('shop','shop.id','products.id_shop')
        ->leftJoin('market','market.id','shop.id_market')
        ->leftJoin('city','city.id','market.id_city')
        ->orderBy('products.id','desc')
        ->select('products.*','city.name as name_city','market.name as name_market','shop.name as name_shop')->paginate(20);

        return view('Index.Shop.Index',['getShop'=>$getShop,'GetProduct'=>$GetProduct]);
    }

    public function AllShop(){
        $GetTopShopsQuery = DB::table('shop')->orderBy('count_sale','desc')
        ->leftJoin('market','market.id','shop.id_market')
        ->leftJoin('city','city.id','market.id_city')
        ->select('shop.*','city.name as name_city','market.name as name_market')
        ->orderBy('shop.id','desc')
        ->where('shop.active','=',1);

        if(Session::get('id_city') != null){
            $GetTopShopsQuery->where('city.id', '=', Session::get('id_city'));
        }
        if(Session::get('id_market') != null && Session::get('id_market') !=0){
            $GetTopShopsQuery->where('market.id', '=', Session::get('id_market'));
        }
        $GetTopShops=$GetTopShopsQuery->paginate(20);
        return view('Index.AllShop.Index',['GetTopShops'=>$GetTopShops]);
    }

}
