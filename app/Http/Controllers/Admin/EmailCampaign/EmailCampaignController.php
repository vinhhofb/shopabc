<?php

namespace App\Http\Controllers\Admin\EmailCampaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\shop;
use App\Models\products;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Jobs\SendEmailCampaignNow;

class EmailCampaignController extends Controller
{   

    public function DeleteEmailCampaign($id){
        DB::table('admin_mail_campaign')->where('id',$id)->update(['is_deleted'=>1]);
        return back();
    }
    //tạo chiến dịch cho filter user
    public function PostAddEmailCampaignTypeUser(Request $request){    
      
        $checkIdTemplate = DB::table('admin_mail_template')
        ->where('admin_mail_template.id',$request->mail_template_id)
        ->where('admin_mail_template.is_deleted',0)
        ->first();
        if($checkIdTemplate == null){
            return back();
        }

        $getUser = DB::table('users')
        ->where('users.email','!=', null)
        ->orderBy('users.id','desc');
        if($request->type_user !=0){
           $getUser =$getUser->where('role',$request->type_user);
        }
        $getUser = $getUser->get();
       

       $insertGetId;
        //kiểu gửi
       $type_send;
       if(isset($request->start_date)){
        $type_send="send_set_time";
        $validate = $request->validate([
           'campaign_name' => 'required|min:1|max:250',
           'mail_template_id'=>'required|integer',
           'start_date' => 'required',
       ]); 
        //gửi ngay    
    }else{
        $type_send="send_now";
        $validate = $request->validate([
           'campaign_name' => 'required|min:1|max:250',
           'mail_template_id'=>'required|integer',
       ]);
    }
         //đặt lịch cronjob
    if($type_send =="send_set_time"){

            //ngày giờ đặt lịch lấy từ input chuyển sang unixtime
        $datetime = date(strtotime($request->start_date));
            //insert chiến dịch vào bảng admin_mail_campaign và lấy ra id vừa insert
        $insertGetId = DB::table('admin_mail_campaign')->insertGetId(
            [
                'campaign_name' => $request->campaign_name,
                'mail_template_id'=>$request->mail_template_id,
                'total_mail'=>count($getUser),
                'total_receipt_mail'=>0,
                'start_date'=>$datetime-25200,
                'type_send'=>1,
                'created_at' => time(),
                'created_by'=>Auth::user()->id          
            ]
        );
            //lấy ra các email cấu hình của account đang đăng nhập
        $listMailConfig = DB::table('admin_mail_config')
        ->where('admin_mail_config.is_deleted','=',0)
        ->get();
            //tạo biến i =0   
        $i2=0;
            //nếu request có list_user      
        if($getUser){
                //lặp tất cả user đó
            for ($i = 1; $i <= count($getUser); $i++) {
                if($listMailConfig->count() == $i2){
                    $i2=1;
                }else{
                    $i2++;
                }
                    //lấy id từng user               
                $getIdUserMail = DB::table('users')
                ->where('users.id','=',$getUser[$i-1]->id)->first();
                    //insert vào bảng admin_mail_campaign_detail     
                $insertMailSend = DB::table('admin_mail_campaign_detail')->insert(
                    [
                        'admin_campaign_id' => $insertGetId,
                        'admin_mail_config_id'=>$listMailConfig[$i2-1]->id,
                        'user_id'=>$getIdUserMail->id,
                        'user_email'=>$getIdUserMail->email,
                        'created_by'=>Auth::user()->id      
                    ]
                );      
            }
                //chuyển hướng đến trang chi tiết gửi
            return Redirect::to('admin/chien-dich-email/gui-email/chi-tiet/'.$insertGetId);
        }
    }
    if($type_send == "send_now"){
        $insertGetId = DB::table('admin_mail_campaign')->insertGetId(
            [
                'campaign_name' => $request->campaign_name,
                'mail_template_id'=>$request->mail_template_id,
                'total_mail'=>count($getUser),
                'total_receipt_mail'=>0,
                'created_at' => time(),
                'created_by'=>Auth::user()->id          
            ]
        );
        $listMailConfig = DB::table('admin_mail_config')
        ->where('admin_mail_config.is_deleted','=',0)
        ->get();   
        $i2=0;
        for ($i = 1; $i <= count($getUser); $i++) {
            if($listMailConfig->count() == $i2){
                $i2=1;
            }else{
                $i2++;
            }               
            $getIdUserMail = DB::table('users')->where('id','=',$getUser[$i-1]->id)->first();     
            $insertMailSend = DB::table('admin_mail_campaign_detail')->insert(
                [
                    'admin_campaign_id' => $insertGetId,
                    'admin_mail_config_id'=>$listMailConfig[$i2-1]->id,
                    'user_id'=>$getIdUserMail->id,
                    'user_email'=>$getIdUserMail->email,
                    'created_at' => time(),
                    'created_by'=>Auth::user()->id      
                ]
            );      
        }
        if(isset($insertGetId)){
            SendEmailCampaignNow::dispatch($insertGetId);
        }
        return Redirect::to('admin/chien-dich-email/gui-email/chi-tiet/'.$insertGetId);
    }

}
public function SetDefaultEmailConfig($id){
    DB::table('admin_mail_config')->where('type_email',1)->update(['type_email'=>0]);
    DB::table('admin_mail_config')->where('id',$id)->update(['type_email'=>1]);
    return back();
}
public function EditEmailConfig($id){
    $GetEmailConfig = DB::table('admin_mail_config')->where('id',$id)->first();
    return view('Admin.EmailCampaign.EditEmailConfig',['GetEmailConfig'=>$GetEmailConfig,'id'=>$id]);
}

public function PostEditEmailConfig($id, Request $request){
    try{
        $transport = (new \Swift_SmtpTransport($request->mail_host,$request->mail_port))
        ->setUsername($request->mail_username)->setPassword($request->mail_password)->setEncryption('tls');
        $mailer = new \Swift_Mailer($transport);
        $message = (new \Swift_Message('Test mail'))
        ->setFrom([$request->mail_username => 'Account Test'])
        ->setTo([$request->mail_username,$request->mail_username => 'Name test'])
        ->setBody('Test email');
        $result = $mailer->send($message);

        $data = [
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => 'tls',
            'is_deleted' => 0,
            'created_at' => time(),
            'created_by'=>Auth::user()->id
        ];
        
        $emailconfig = DB::table('admin_mail_config')->where('id',$id)->update($data);
        return redirect('admin/chien-dich-email/cau-hinh-email');
    }
    catch (\Swift_TransportException $transportExp){

        return redirect()->back()->with('msg', 'Thông tin thiết lập không chính xác, vui lòng kiểm tra lại');
    }   
}

public function Config(){
    $GetTimeDelay = DB::table('config')->where('id',6)->first();
    return view('Admin.EmailCampaign.Config',['GetTimeDelay'=>$GetTimeDelay]);
}
public function PostConfig(Request $request){
    DB::table('config')->where('id',6)->update(['value'=>$request->time]);
    return back();
}

public function GetListUserByType($type){
    $getUserByType = DB::table('users')->where('role',$type)->orderBy('id','desc')->get();
    return response()->json(['getUserByType' => $getUserByType]);
}

public function ListEmailCampaignDetail($id){
    $getDetail = DB::table('admin_mail_campaign_detail')
    ->where('admin_mail_campaign_detail.admin_campaign_id',$id)
    ->leftJoin('admin_mail_config','admin_mail_config.id','admin_mail_campaign_detail.admin_mail_config_id')
    ->select('admin_mail_campaign_detail.*','admin_mail_config.mail_username')
    ->paginate(20);
    return view('Admin.EmailCampaign.ListEmailCampaignDetail',['getDetail'=>$getDetail]);
}
public function AddEmailCampaign(){
    $listUser=DB::table('users')->where('email','!=',null)->where('role','!=',1)->get();
    $listTemplate = DB::table('admin_mail_template')->where('type',0)->where('is_deleted',0)->orderBy('id','desc')->get();
    return view('Admin.EmailCampaign.AddEmailCampaign',['listUser'=>$listUser,'listTemplate'=>$listTemplate]);
}
public function PostAddEmailCampaignListUser(Request $request){
        //tạo chiến dịch cho list user
    $checkIdTemplate = DB::table('admin_mail_template')
    ->where('admin_mail_template.id',$request->mail_template_id)
    ->where('admin_mail_template.is_deleted',0)
    ->first();
    if($checkIdTemplate == null){
        return back();
    }
    $insertGetId;
        //kiểu gửi
    $type_send;
        //đến ngày sinh nhật thì gửi
    if(isset($request->start_date)){
        $type_send="send_set_time";
        $validate = $request->validate([
           'campaign_name' => 'required|min:1|max:250',
           'mail_template_id'=>'required|integer',
           'start_date' => 'required' 
       ]); 
        //gửi ngay    
    }else{
        $type_send="send_now";
        $validate = $request->validate([
           'campaign_name' => 'required|min:1|max:250',
           'mail_template_id'=>'required|integer',
       ]);
    }
        //đặt lịch cronjob
    if($type_send =="send_set_time"){
            //ngày giờ đặt lịch lấy từ input chuyển sang unixtime
        $datetime = date(strtotime($request->start_date));
            //insert chiến dịch vào bảng admin_mail_campaign và lấy ra id vừa insert
        $insertGetId = DB::table('admin_mail_campaign')->insertGetId(
            [
                'campaign_name' => $request->campaign_name,
                'mail_template_id'=>$request->mail_template_id,
                'total_mail'=>count($request->list_user),
                'total_receipt_mail'=>0,
                'type_send'=>1,
                'start_date'=>$datetime,
                'created_at' => time(),
                'created_by'=>Auth::user()->id          
            ]
        );
            //lấy ra các email cấu hình của account đang đăng nhập
        $listMailConfig = DB::table('admin_mail_config')
        ->where('admin_mail_config.is_deleted','=',0)
        ->get();
            //tạo biến i =0   
        $i2=0;
            //nếu request có list_user      
        if($request->list_user){
                //lặp tất cả user đó
            for ($i = 1; $i <= count($request->list_user); $i++) {
                if($listMailConfig->count() == $i2){
                    $i2=1;
                }else{
                    $i2++;
                }
                    //lấy id từng user               
                $getIdUserMail = DB::table('users')
                ->where('users.id','=',$request->list_user[$i-1])->first();
                    //insert vào bảng admin_mail_campaign_detail     
                $insertMailSend = DB::table('admin_mail_campaign_detail')->insert(
                    [
                        'admin_campaign_id' => $insertGetId,
                        'admin_mail_config_id'=>$listMailConfig[$i2-1]->id,
                        'user_id'=>$getIdUserMail->id,
                        'user_email'=>$getIdUserMail->email,
                        'created_by'=>Auth::user()->id      
                    ]
                );      
            }
                //chuyển hướng đến trang chi tiết gửi
            return Redirect::to('../admin/chien-dich-email/gui-email/chi-tiet/'.$insertGetId);
        }
    }
    if($type_send == "send_now"){
        $insertGetId = DB::table('admin_mail_campaign')->insertGetId(
            [
                'campaign_name' => $request->campaign_name,
                'mail_template_id'=>$request->mail_template_id,
                'total_mail'=>count($request->list_user),
                'total_receipt_mail'=>0,
                'type_send'=>0,
                'created_at' => time(),
                'created_by'=>Auth::user()->id          
            ]
        );
        $listMailConfig = DB::table('admin_mail_config')
        ->where('admin_mail_config.is_deleted','=',0)
        ->get();   
        $i2=0;
        for ($i = 1; $i <= count($request->list_user); $i++) {
            if($listMailConfig->count() == $i2){
                $i2=1;
            }else{
                $i2++;
            }               
            $getIdUserMail = DB::table('users')->where('id','=',$request->list_user[$i-1])->first();     
            $insertMailSend = DB::table('admin_mail_campaign_detail')->insert(
                [
                    'admin_campaign_id' => $insertGetId,
                    'admin_mail_config_id'=>$listMailConfig[$i2-1]->id,
                    'user_id'=>$getIdUserMail->id,
                    'user_email'=>$getIdUserMail->email,
                    'created_at' => time(),
                    'created_by'=>Auth::user()->id      
                ]
            );      
        }
        if(isset($insertGetId)){
            SendEmailCampaignNow::dispatch($insertGetId);
        }
        return Redirect::to('../admin/chien-dich-email/gui-email/chi-tiet/'.$insertGetId);
    }
}

public function ListEmailCampaign(){
    $getEmailCampaign = DB::table('admin_mail_campaign')
    ->leftJoin('admin_mail_template','admin_mail_template.id','admin_mail_campaign.mail_template_id')
    ->where('admin_mail_campaign.is_deleted',0)
    ->select('admin_mail_campaign.*','admin_mail_template.template_title')
    ->orderBy('admin_mail_campaign.id','desc')->paginate(20);

    return view('Admin.EmailCampaign.ListEmailCampaign',
        [
            'getEmailCampaign'=>$getEmailCampaign,
        ]
    );
}


public function PostAddEmailConfig(Request $request){

    try{

        $transport = (new \Swift_SmtpTransport($request->mail_host,$request->mail_port))
        ->setUsername($request->mail_username)->setPassword($request->mail_password)->setEncryption('tls');
        $mailer = new \Swift_Mailer($transport);
        $message = (new \Swift_Message('Test mail'))
        ->setFrom([$request->mail_username => 'Account Test'])
        ->setTo([$request->mail_username,$request->mail_username => 'Name test'])
        ->setBody('Test email');
        $result = $mailer->send($message);

        $data = [
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => 'tls',
            'is_deleted' => 0,
            'created_at' => time(),
            'created_by'=>Auth::user()->id
        ];
        
        $emailconfig = DB::table('admin_mail_config')->insert($data);
        return redirect('admin/chien-dich-email/cau-hinh-email');
    }
    catch (\Swift_TransportException $transportExp){

        return redirect()->back()->with('msg', 'Thông tin thiết lập không chính xác, vui lòng kiểm tra lại');
    }   
}
public function ListEmailConfig(){
    $getEmailConfig = DB::table('admin_mail_config')->where('is_deleted',0)->orderBy('id','desc')->paginate(20);
    return view('Admin.EmailCampaign.ListEmailConfig',
        [
            'getEmailConfig'=>$getEmailConfig,
        ]
    );
}
public function DeleteEmailConfig($id){
    DB::table('admin_mail_config')->where('id',$id)->update(['is_deleted'=>1,'updated_at'=>time(),'updated_by'=>Auth::user()->id]);
    return redirect()->back();
}
public function AddEmailConfig(){
    return view('Admin.EmailCampaign.AddEmailConfig');
}

public function ListEmailTemplate(){
    $getEmailTemplate = DB::table('admin_mail_template')->where('admin_mail_template.is_deleted',0)
    ->orderBy('admin_mail_template.show_order','desc')
    ->orderBy('admin_mail_template.id','desc')
    ->paginate(20);
    return view('Admin.EmailCampaign.ListEmailTemplate',
        [
            'getEmailTemplate'=>$getEmailTemplate,
        ]
    );
}

public function DeleteEmailTemplate($id){
    DB::table('admin_mail_template')->where('admin_mail_template.id',$id)->update(['is_deleted'=>1,'updated_at'=>time(),'updated_by'=>Auth::user()->id]);
    return redirect()->back();
}

public function EditEmailTemplate($id){
    $getEmailTemplate = DB::table('admin_mail_template')->where('admin_mail_template.id',$id)->first();

    return view('Admin.EmailCampaign.EditEmailTemplate',
        [
            'getEmailTemplate'=>$getEmailTemplate,
        ]
    );
}

public function PostEditEmailTemplate($id,Request $request){
    $getEmailTemplate = DB::table('admin_mail_template')
    ->where('id',$id)
    ->update(
        [
            'template_title'=>$request->template_title,
            'template_content'=>$request->template_content,
            'updated_at'=>time(),
            'updated_by'=>Auth::user()->id
        ]
    );
    return redirect('/admin/chien-dich-email/mau-email');
}

public function AddEmailTemplate(){
    return view('Admin.EmailCampaign.AddEmailTemplate');
}
public function PostAddEmailTemplate(Request $request){
    DB::table('admin_mail_template')
    ->insert(
        [
            'template_title'=>$request->template_title,
            'template_content'=>$request->template_content,
            'created_at'=>time(),
            'updated_by'=>Auth::user()->id
        ]
    );

    return redirect('/admin/chien-dich-email/mau-email');


}
}













