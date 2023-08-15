<?php

namespace App\View\Components\Index\Layouts;

use Illuminate\View\Component;
use DB;

class SideBar extends Component
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
        $getCategoryLevel0 = DB::table('category')->where('level',0)->get();
        $getCategoryLevel1 = DB::table('category')->where('level',1)->orderBy('order_by','asc')->get();
        return view('components.index.layouts.side-bar',
            [
                'getCategoryLevel0'=>$getCategoryLevel0,
                'getCategoryLevel1'=>$getCategoryLevel1
            ]
        );
    }
}
