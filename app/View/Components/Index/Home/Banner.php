<?php

namespace App\View\Components\Index\Home;

use Illuminate\View\Component;
use DB;

class Banner extends Component
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
        $GetBanners = DB::table('banner')->get();
        return view('components.index.home.banner',['GetBanners'=>$GetBanners]);
    }
}
