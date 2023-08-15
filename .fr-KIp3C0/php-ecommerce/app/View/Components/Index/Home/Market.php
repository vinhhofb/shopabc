<?php

namespace App\View\Components\Index\Home;

use Illuminate\View\Component;
use DB; 
use Session;

class Market extends Component
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
        $GetMarketsQuery = DB::table('market');

        if(Session::get('id_city') != null){
            $GetMarketsQuery->where('id_city', '=', Session::get('id_city'));
        }

        $GetMarkets=$GetMarketsQuery->get();
        return view('components.index.home.market',['GetMarkets'=>$GetMarkets]);
    }
}
