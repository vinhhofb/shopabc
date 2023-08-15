<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class SearchController extends Controller
{   
    public function Search(Request $request){




        //search with voice 
        $voice = DB::table('voice_search')->get();
        for ($i = 0; $i < count($voice); $i++) {
            if($request->keyword == $voice[$i]->text){
                return Redirect($voice[$i]->link);
            }
        }
        if(isset(Auth::user()->id)){
            DB::table('relate')->insert(['type'=>0,'param'=>$request->keyword,'user_id'=>Auth::user()->id,'created_at'=>time()]);
        }
        
        
        $searchProductQuery = DB::table('products')
        ->leftJoin('shop','shop.id','products.id_shop')
        ->leftJoin('market','market.id','shop.id_market')
        ->leftJoin('city','city.id','market.id_city')
        ->select('products.*','city.name as name_city','market.name as name_market','shop.name as name_shop')
        ->where('products.name', 'like', '%' . $request->keyword. '%');


        if(Session::get('id_city') != null){
            $searchProductQuery->where('city.id', '=', Session::get('id_city'));
        }
        $searchProduct=$searchProductQuery->get();
        return view('Index.Search.Index',['searchProduct'=>$searchProduct]);
    }

}
