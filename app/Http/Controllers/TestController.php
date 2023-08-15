<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Jobs\SendEmailCampaignNow;
use Carbon\Carbon;

class TestController extends Controller
{   
    public function test(){
        //  $getEmailCampaign= DB::table('admin_mail_campaign')
        // ->where('admin_mail_campaign.start_date','<',time())
        // ->where('admin_mail_campaign.total_receipt_mail','=',0)
        // ->where('admin_mail_campaign.is_deleted','=',0)
        // ->get();
      
        // dd($getEmailCampaign);
        // for ($i=1; $i <=6599 ; $i++) { 
        //     $getProduct = DB::table('products')->where('id',$i)->first('image_slide');
        //     if($getProduct !=null){
        //         $productReplace = str_replace("'", '"', $getProduct->image_slide);
        //         DB::table('products')->where('id',$i)->update(
        //             [
        //                 "image_slide"=>$productReplace
        //             ]
        //         );
        //     }
            
        // }

        // dd($productReplace);

        // for ($i=406; $i <=763 ; $i++) {
        //     $getProduct = DB::table('products')->where('id',$i)->first('content');
        //     $productReplace = str_replace("']", "", $getProduct->content);
        //     DB::table('products')->where('id',$i)->update(
        //         [
        //             "content"=>$productReplace
        //         ]
        //     );
            // $productReplace2 = str_replace("']", "", $getProduct->content);
            // DB::table('products')->where('id',$i)->update(
            //     [
            //         "content"=>$productReplace2
            //     ]
            // );
        // }
        
    }
}
