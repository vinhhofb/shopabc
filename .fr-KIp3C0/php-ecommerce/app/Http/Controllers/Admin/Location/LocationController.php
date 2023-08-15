<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\category;
use App\Models\city;
use App\Models\market;
use Illuminate\Support\Facades\Redirect;
use DB;

class LocationController extends Controller
{   
    public function CityManage(){
        $GetCitys = DB::table('city')->orderBy('city.id', 'DESC') ->paginate(20);
        return view('Admin.Location.ListCity',
            [
                'GetCitys'=>$GetCitys,
            ]
        );  
    }

    public function AddCity(){
        return view('Admin.Location.AddCity'); 
    }
    public function AddCitySubmit(Request $request){
        

            $name =  $request['name'];
            $image =  $request->file('image');
            $AddCity = new city();

            $AddCity->name = $name;
            if(isset($image)){
               $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('Index/images/citys/'), $new_name);
                $AddCity->image=$new_name;
            }
            $AddCity->save();
        
        return redirect('admin/quan-ly-dia-diem');  
    }
    public function DeleteCity($id){
        $DeleteCity = DB::table('city')->where('id', $id)->delete();
        return Redirect::back()->with('msg', 'Delete Success');
    }

    public function EditCity($id){
        $GetCityById = DB::table('city')->where('id', $id)->first();
        return view('Admin.Location.EditCity',['GetCityById'=>$GetCityById]);  
    }

    public function EditCitySubmit($id, Request $request){
            $GetCityById = city::where('id',$id)->first();
            $name =  $request['name'];
            $image =  $request->file('image');
            ;
            $GetCityById->name = $name;
            if(isset($image)){
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('Index/images/citys/'), $new_name);
                $GetCityById->image=$new_name;
            }
            $GetCityById->save();
            return redirect('admin/quan-ly-dia-diem');  
    }

    public function ListShop($id){
        $GetShops = DB::table('shop')->where('id_market',$id)->orderBy('shop.id', 'DESC')->paginate(20);
        return view('Admin.Location.ListShop',
            [
                'GetShops'=>$GetShops,
            ]
        );  
    }

    public function MarketManage($id){
        $GetMarketByCitys = DB::table('market')->where('id_city',$id)->orderBy('market.id', 'DESC')->paginate(10);
        return view('Admin.Location.ListMarket',
            [
                'GetMarketByCitys'=>$GetMarketByCitys,
                'IdCity'=>$id
            ]
        );
    }


    public function DeleteMarket($id){
        $DeleteMarket = DB::table('market')->where('id', $id)->delete();
        return Redirect::back()->with('msg', 'Delete Success');
    }



    public function AddMarket($id){
        return view('Admin.Location.Addmarket',['IdCity'=>$id]);   
    }
    public function AddMarketSubmit($id,Request $request){
        

            $name =  $request['name'];
            $address =  $request['address'];
            $image =  $request->file('image');
            $AddMarket = new market();

            $AddMarket->name = $name;
            $AddMarket->address = $address;
            $AddMarket->id_city = $id;
            $AddMarket->id_user = 1;
            if(isset($image)){
                 $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('Index/images/markets/'), $new_name);
                $AddMarket->image=$new_name;
            }
            $AddMarket->save();

        return redirect('admin/quan-ly-dia-diem/xem-cho/'.$id); 
    }


    public function EditMarket($id){
        $GetMarketById = DB::table('market')->where('id', $id)->first();
        return view('Admin.Location.EditMarket',['GetMarketById'=>$GetMarketById]);    
    }

    public function EditMarketSubmit($id, Request $request){
        
            $name =  $request['name'];
            $address =  $request['address'];
            $image =  $request->file('image');
            $GetMarketById = market::where('id',$id)->first();
            $GetMarketById->name = $name;
            $GetMarketById->address = $address;
            if(isset($image)){
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('Index/images/markets/'), $new_name);
                $GetMarketById->image=$new_name;
            }
            $GetMarketById->save();
            return redirect('admin/quan-ly-dia-diem/xem-cho/'.$GetMarketById->id_city);
       


    }


    public function ShopManage($id){
        $GetShopByMarket = DB::table('shop')
        ->where('shop.id_market', '=',$id)
        ->orderBy('shop.id', 'DESC')
        ->get();
        
        $CountShop = DB::table('shop')->where('id_market',$id)->count();

        return view('Admin.Location.ListShop',
            [
                'GetShopByMarket'=>$GetShopByMarket,
                'CountShop'=>$CountShop,
                'IdMarket'=>$id
            ]
        );
    }

    public function BlockShop($id){
        $GetShopById = shop::where('id',$id)->first();
        if($GetShopById->active==1){
            $GetShopById->active=0;
            $GetShopById->save();
            return Redirect::back();
        }else if($GetShopById->active==0){
            $GetShopById->active=1;
            $GetShopById->save();
            return Redirect::back();
        }
    }


    public function SearchCity(Request $request){

        if(isset($request->keyword)){
            $GetCitys = DB::table('city')
            ->Where('city.name', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10);

            return view('Admin.Location.ListCity',
                [
                    'GetCitys'=>$GetCitys,
                ]
            );
        }
    }

}
