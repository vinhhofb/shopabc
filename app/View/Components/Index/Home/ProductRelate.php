<?php

namespace App\View\Components\Index\Home;

use Illuminate\View\Component;
use DB;
use Session;

class ProductRelate extends Component
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
        $GetProductRelatesQuery = DB::table('products')
        ->leftJoin('category','products.id_category','category.id')
        ->leftJoin('shop','shop.id','products.id_shop')
        ->leftJoin('market','market.id','shop.id_market')
        ->leftJoin('city','city.id','market.id_city')
        ->select('products.*','city.name as name_city','market.name as name_market','shop.name as name_shop','category.name as name_category')
        ->where('products.active','=',1);
       

        if(Session::get('id_city') != null){
            $GetProductRelatesQuery->where('city.id', '=', Session::get('id_city'));
        }
        if(Session::get('id_market') != null && Session::get('id_market') !=0){
            $GetProductRelatesQuery->where('market.id', '=', Session::get('id_market'));
        }
        $GetProductRelates=$GetProductRelatesQuery->inRandomOrder()->paginate(8);
        
       
        return view('components.index.home.product-relate',['GetProductRelates'=>$GetProductRelates]);
    }
}
