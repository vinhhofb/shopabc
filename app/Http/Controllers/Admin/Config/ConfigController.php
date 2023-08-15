<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;

class ConfigController extends Controller
{   
    public function Config(){
        $config = DB::table('config')->get();
        return view('Admin.Config.Index',['config'=>$config]);
    }

    public function PostConfig(Request $request){

        DB::table('config')->where('id',1)->update(
            [   
                'value'=>$request['vat'],
            ]
        );
        DB::table('config')->where('id',2)->update(
            [   
                'value'=>$request['discount'],
            ]
        );
        DB::table('config')->where('id',3)->update(
            [   
                'value'=>$request['feeship'],
            ]
        );
        return redirect()->back()->with('msg', 'Change Success');     
    }
}
