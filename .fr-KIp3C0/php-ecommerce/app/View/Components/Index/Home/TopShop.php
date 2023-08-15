<?php

namespace App\View\Components\Index\Home;

use Illuminate\View\Component;
use DB;
use Session;

class TopShop extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        $GetTopShopsQuery = DB::table('shop')->orderBy('count_sale','desc')
        ->leftJoin('market','market.id','shop.id_market')
        ->leftJoin('city','city.id','market.id_city')
        ->select('shop.*','city.name as name_city','market.name as name_market')
        ->orderBy('shop.id','desc')
        ->where('shop.active','=',1)
        ->skip(0)
        ->take(16);

        if(Session::get('id_city') != null){
            $GetTopShopsQuery->where('city.id', '=', Session::get('id_city'));
        }
        if(Session::get('id_market') != null && Session::get('id_market') !=0){
            $GetTopShopsQuery->where('market.id', '=', Session::get('id_market'));
        }
        $GetTopShops=$GetTopShopsQuery->get();
        return view('components.index.home.top-shop',['GetTopShops'=>$GetTopShops]);
    }
}
