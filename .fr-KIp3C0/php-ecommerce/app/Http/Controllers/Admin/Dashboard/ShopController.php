<?php

namespace App\Http\Controllers\Shop\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\shop;
use App\Models\products;
use Illuminate\Support\Facades\Redirect;
use Validator;

use DB;


class ShopController extends Controller
{   

    public function AddProduct($id){
        $IdShop=$id;
        return view('Shop.ShopManage.AddProduct',['IdShop'=>$IdShop]);
    }

    public function AddProductSubmit($id,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:300',
            'content' => 'required',
            'price' => 'required|max:300',
            'unit' => 'required|max:300',
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $image =  $request->file('image');
            $AddProduct = new products();
            $AddProduct->name = $request['name'];
            $AddProduct->content = $request['content'];
            $AddProduct->price = $request['price'];
            $AddProduct->unit = $request['unit'];
            $AddProduct->id_shop = $id;
            $AddProduct->id_user = Auth::user()->id;
            $AddProduct->active = 1;
            if(isset($image)){
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('index/images/products/'), $new_name);
                $AddProduct->image=$new_name;
            }
            $AddProduct->save();
        }
        return redirect('kenh-cua-hang/quan-ly-cua-hang/san-pham/'.$id);  
    }

    function EditShop($id){
        $GetShopById = DB::table('shop')->where('id', $id)->first();
        $GetMarkets = DB::table('market')->where('market.id_city','=',Auth::user()->id_city)->get();
        return view('Shop.ShopManage.EditShop',['GetShopById'=>$GetShopById,'GetMarkets'=>$GetMarkets]); 
    }

    public function EditShopSubmit($id, Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:300',
            'content' => 'required|max:300',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $GetShopById = shop::where('id',$id)->first();
            $image =  $request->file('image');  
            $GetShopById->name = $request['title'];
            $GetShopById->content = $request['content'];

            if(isset($image)){
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('index/images/shops/'), $new_name);
                $GetShopById->image=$new_name;
            }
            $GetShopById->save();
            return redirect('kenh-cua-hang/quan-ly-cua-hang');   
        }
        
    }

    public function GetCity($idcity)
    {       
        $addresslv2 = DB::table('market')->where('id_city',$idcity)->get();
        foreach($addresslv2 as $item){
            echo "<option value='".$item->id."'>".$item->name."</option>";
        }
    }

    public function AddShop(){
        $GetCitys = DB::table('city')->get();
        $GetMarkets = DB::table('market')->where('id_city',1)->get();
        return view('Shop.ShopManage.AddShop',['GetCitys'=>$GetCitys,'GetMarkets'=>$GetMarkets]);
    }
    

    public function AddShopSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:300',
            'content' => 'required|max:300',
            'id_market' => 'required|max:300',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $image =  $request->file('image');
            $AddShop = new shop();
            $AddShop->name = $request['title'];
            $AddShop->content = $request['content'];
            $AddShop->id_market = $request['id_market'];
            $AddShop->id_user = Auth::user()->id;
            $AddShop->active = 1;
            if(isset($image)){
                
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('index/images/shops/'), $new_name);
                $AddShop->image=$new_name;
            }
            $AddShop->save();
        }
        return redirect('kenh-cua-hang/quan-ly-cua-hang');   
    }


    public function index(){
        $GetShops = DB::table('shop')
        ->where('shop.id_user','=',Auth::user()->id)    
        ->orderBy('shop.id', 'DESC')
        ->paginate(10);
        $CountShop = DB::table('shop')->count();
        return view('Shop.ShopManage.Index',[
            'GetShops'=>$GetShops,
            'CountShop'=>$CountShop,
        ]);
    }

    public function ListProducts($id){
        $GetProductByShops = DB::table('products')->where('id_shop', $id)->orderBy('products.id', 'DESC')->paginate(10);
        $IdShop=$id;
        return view('Shop.ShopManage.ListProducts',
            [
                'GetProductByShops'=>$GetProductByShops,    
                'IdShop'=>$IdShop,  
            ]
        );
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

}
