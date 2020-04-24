<?php session_start();
    require_once('functions/user.php');
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
    require_once('functions/email.php');
    require_once('functions/token.php');
//Collecting the data


$errorCount = 0;

if(!is_user_LoggedIn()){//undone today from !is_user_LoggedIn()
    $token = $_POST['token'] != "" ? $_POST['token'] :  $errorCount++;
    $_SESSION['token'] = $token;
}
//Verifying the data, validation

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;


$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    set_alert('error',$session_error);

    redirect_to("reset.php");


}else{

    $checkToken = is_user_LoggedIn() ? true: find_token($email);

            if($checkToken){
                $userExists = find_user($email);
    
                if($userExists){
                        //$currentUser = $email.".json";
                        $userObject = find_user($email); 

                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);
                        
                        unlink("db/users/".$currentUser);// file data belonging to user deleted
                        unlink("db/token/".$currentUser);
                        
                        save_user($userObject);

                        set_alert("Password Reset Successful, you can now login ");
                        
                        $subject = "Password Reset Successful";
                        $message = "Your account on snh has just been updated, your password has changed. If you did not initiate this change, kindly visit snh.org and reset your password immediately.";
                        send_mail($subject,$message,$email);
                        
                        
                        redirect_to("Location: login.php");
                        return;
                    
                }
               
            }       
    set_alert('error',"Password Reset Failed, token/email invalid or expired");               
    redirect_to("login.php");
}