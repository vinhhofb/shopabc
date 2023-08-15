<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Mail;
use DB;


class SendEmailAuto implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id_template;
    protected $id_user;
    public function __construct($id_template,$id_user)
    {
        $this->id_template = $id_template;
        $this->id_user = $id_user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){

        $getEmailTemplate = DB::table('admin_mail_template')
        ->where('id','=',$this->id_template)
        ->first();
        $getEmailConfig = DB::table('admin_mail_config')->where('type_email','=',1)->first();

        $getNameUser = DB::table('users')->where('id',$this->id_user)->first();
        
        $titleEmailReplace = str_replace("%ten_nguoi_nhan%", $getNameUser->name, $getEmailTemplate->template_title);
        $contentEmailReplace = str_replace("%ten_nguoi_nhan%", $getNameUser->name, $getEmailTemplate->template_content);
        try{
            $transport = (new \Swift_SmtpTransport($getEmailConfig->mail_host,$getEmailConfig->mail_port))
            ->setUsername($getEmailConfig->mail_username)->setPassword($getEmailConfig->mail_password)->setEncryption($getEmailConfig->mail_encryption);
            $mailer = new \Swift_Mailer($transport);


            $message = (new \Swift_Message($titleEmailReplace))
            ->setFrom($getEmailConfig->mail_username)
            ->setTo($getNameUser->email)
            ->addPart(
              $contentEmailReplace,
              'text/html'
          );
            $mailer->send($message);
        }catch (\Swift_TransportException $transportExp){

        }
        
    }
}
