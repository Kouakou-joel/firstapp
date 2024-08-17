<?php

namespace App\services;

use App;
use PHPMailer\PHPMailer\PHPMailer;
class  EmailServices
{
  protected $app_name;
  protected $port;
  protected $host;
  protected $username;
  protected $password;


  function __construct()
  {
      $this->app_name = env('APP_NAME', '');
      $this->host = env('MAIL_HOST', '');
      $this->port =  env('MAIL_PORT', '');
      $this->username = env('MAIL_USERNAME', '');
      $this->password = env('MAIL_PASSWORD', '');
  }


 public function  sendEmail($subject, $emailUser, $nameUser, $isHtml, $message)
 {
    $email = new PHPMailer;
    $email->isSMTP();
    $email->SMTPDebug = 0;
    $email->Host = $this->host;
    $email->Port = $this->port;
    $email->Username = $this->username;
    $email->Password = $this->password;
    $email->SMTPAuth = true;
    $email->Subject = $subject;
    $email->setFrom($this->app_name,$this->app_name );
    $email->addReplyTo($this->app_name,$this->app_name);
    $email->addAddress($emailUser, $emailUser);
    $email->isHTML($isHtml);
    $email->Body = $message;
    $email->send();
 }

}




