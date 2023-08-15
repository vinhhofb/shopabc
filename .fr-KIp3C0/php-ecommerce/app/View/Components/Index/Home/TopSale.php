<?php

namespace App\View\Components\Index\Home;

use Illuminate\View\Component;
use DB;

class TopSale extends Component
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
        $GetTopSales = DB::table('top_sale')->get();
        return view('components.index.home.top-sale',['GetTopSales'=>$GetTopSales]);
    }
}
