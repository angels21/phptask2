<?php 
require_once('alert.php');
require_once('redirect.php');

function send_mail(
    $subject = "",
    $message = "",
    $email =""

    ){

    $headers = "From: no-reply@snh.org" . "\r\n" .
    "CC: solo@snh.org";
    
    $try = mail($email,$subject,$message,$headers);

    if($try){
        set_alert('message',"Password reset link has been sent to your email: " . $email);
        //display a success message
        redirect_to("login.php");

    }else{

        set_alert('message',"Something went wrong, we could not send password reset to: " . $email);
        redirect_to("forgot.php");
    }

}