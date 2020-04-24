<?php session_start();
    require_once('functions/user.php');
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
    require_once('functions/email.php');
    require_once('functions/token.php');
//Collecting the data


$errorCount = 0;

if(!$_SESSION['loggedIn']){//undone today from !is_user_LoggedIn()
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

    $allUserTokens = scandir("db/token/");
    $countAllUserTokens = count($allUserTokens);


    for ($counter = 0; $counter < $countAllUserTokens ; $counter++) {

        $currentTokenFile = $allUserTokens[$counter];
    
        
        
        if($currentTokenFile == $email . ".json"){
            //check for if token in current token file is same as $token
            $tokenContent = file_get_contents("db/token/".$currentTokenFile);
            
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject->token;

            if($_SESSION['loggedIn']){
                $checkToken = true;
                
            }else{
                $checkToken = $tokenFromDB == $token;
                
            }
               

            if($checkToken){
                $allUsers = scandir("db/users/"); 
                $countAllUsers = count($allUsers);
                
            
                for ($counter = 0; $counter < $countAllUsers ; $counter++) {
                    
                    $currentUser = $allUsers[$counter];
                
                    if($currentUser == $email . ".json"){
                        
                        $userString = file_get_contents("db/users/".$currentUser);                    
                        $userObject =json_decode($userString);

                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);
                        
                        unlink("db/users/".$currentUser);
                        
                        file_put_contents("db/users/". $email . ".json", json_encode($userObject));

                        $_SESSION["message"] = "Password Reset Successful, you can now login ";
                        
                        $subject = "Password Reset Successful";
                        $message = "Your account on snh has just been updated, your password has changed. If you did not initiate this change, kindly visit snh.org and reset your password immediately.";
                        $headers = "From: no-reply@snh.org" . "\r\n" .
                        "CC:solo@snh.org";

                        $try = mail($subject,$message,$email,$headers);
                        
                        
                        header("Location: login.php");
                            die();
                    }
                } 
            }    
        }  
    }   
    $_SESSION["error"] = "Password reset failed, token/email invalid or expired";             
    header("Location: login.php");
}