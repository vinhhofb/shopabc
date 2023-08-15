<?php

namespace App\View\Components\Index\Layouts;

use Illuminate\View\Component;
use Session;
use DB;

class Header extends Component
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
        $locationHeader ="";
        if(Session::get('id_city') ==null){
            $locationHeader = "Chọn tỉnh thành, quận huyện để xem chính xác mặt hàng";  
        }else{
            $GetNameCity = DB::table('city')->where('id',Session::get('id_city'))->first();
            if(Session::get('id_market') ==null || Session::get('id_market') ==0){
                $locationHeader = "You are viewing items at ".$GetNameCity->name;
            }else if(Session::get('id_market') !=null || Session::get('id_market') !=0){
                $GetNameMarket = DB::table('market')->where('id',Session::get('id_market'))->first(); 
                $locationHeader = "You are viewing items at ".$GetNameMarket->name."-".$GetNameCity->name;
            } 
        }
        return view('components.index.layouts.header',['locationHeader'=>$locationHeader]);
    }
}
