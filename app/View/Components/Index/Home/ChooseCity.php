<?php

namespace App\View\Components\Index\Home;

use Illuminate\View\Component;
use DB;

class ChooseCity extends Component
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
        $GetCitys = DB::table('city')->get();
        return view('components.index.home.choose-city',['GetCitys'=>$GetCitys]);
    }
}
