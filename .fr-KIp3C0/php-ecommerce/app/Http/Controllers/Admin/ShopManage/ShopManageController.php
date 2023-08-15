<?php

namespace App\Http\Controllers\Admin\ShopManage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\shop;
use App\Models\products;
use Illuminate\Support\Facades\Redirect;
use DB;

class ShopManageController extends Controller
{   

    public function ListProducts($id){
        $GetProducts = DB::table('products')
        ->where('products.id_shop',  '=', $id)  
        ->orderBy('products.id', 'DESC')
        ->paginate(15);
        


        return view('Admin.ShopManage.ListProduct',
            [
                'GetProducts'=>$GetProducts,
            ]
        );
    }


    

    public function BlockUnBlockProduct($id){
        if(isset($id)){
            $FindProductById = products::find($id);
            if($FindProductById != null){
                if($FindProductById->active == 0){
                    $FindProductById->active=1;
                    $FindProductById->save();
                    return back();
                }else if($FindProductById->active == 1){
                    $FindProductById->active=0;
                    $FindProductById->save();
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

    public function ListAllShop($id){
        $GetShops = DB::table('shop')
        ->orderBy('shop.id', 'DESC') 
        ->where('shop.id_user','=',$id)
        ->paginate(10);
    
        return view('Admin.ShopManage.ListShopByIdUser',
            [
                'GetShops'=>$GetShops,
            ]
        );
    }
    
    public function ShopManage(){
        $GetShop = DB::table('shop')
        ->join('market', 'market.id', '=', 'shop.id_market')    
        ->join('city', 'city.id', '=', 'market.id_city')    
        ->orderBy('shop.id', 'DESC')
        ->select(
            'shop.id as id',
            'shop.image',
            'shop.title',
            'shop.active',
            'market.name as name_market',
            'city.name as name_city',       
        ) 
        ->get();
        
        $CountShop = DB::table('shop')->count();

        return view('Admin.UserManage.ListUser',
            [
                'GetShop'=>$GetShop,
                'CountShop'=>$CountShop,
            ]
        );
    }


    public function ListAccountShop(){
        $GetShops = DB::table('users')
        ->orderBy('users.id', 'DESC') 
        ->where('users.role','=',2)
        ->paginate(10);
        return view('Admin.ShopManage.ListShop',
            [
                'GetShops'=>$GetShops,
            ]
        );
    }

    public function BlockUnBlockAccountShop($id){

        if(isset($id)){
            $FindShopById = User::find($id);
            if($FindShopById != null){
                if($FindShopById->active == 0){
                    $FindShopById->active=1;
                    $FindShopById->save();
                    return back();
                }else if($FindShopById->active == 1){
                    $FindShopById->active=0;
                    $FindShopById->save();
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

    public function BlockUnBlockShop($id){
        if(isset($id)){
            $FindShopById = shop::find($id);
            if($FindShopById != null){
                if($FindShopById->active == 0){
                    $FindShopById->active=1;
                    $FindShopById->save();
                    return back();
                }else if($FindShopById->active == 1){
                    $FindShopById->active=0;
                    $FindShopById->save();
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

    public function SearchAccountShop(Request $request){
        if(isset($request->keyword)){
            $GetShops = DB::table('users')
            ->where('users.role', '=','3')
            ->Where('users.phone', '=', $request->keyword)
            ->orderBy('users.id', 'DESC') 
            ->paginate(10);
            return view('Admin.ShopManage.ListShop',
                [
                    'GetShops'=>$GetShops,
                ]
            );
        }
    }
    
}
