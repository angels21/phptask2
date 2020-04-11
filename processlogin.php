<?php session_start();
//added first
date_default_timezone_set('Africa/Lagos');
//added to test user log for time
$login_date = date("Y-m-d, h:i:sa");

$errorCount = 0;



$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;

$_SESSION['email'] = $email;
//added for login log
$_SESSION['login_date'] = $login_date;

if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"] = $session_error;
    header("Location: login.php");

 

}else{
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);
    //just added
    $logUsers = scandir("db/log/"); //return @array (2 filled)
    $countlogUsers = count($logUsers);
    $logId = ($countlogUsers-1);
    $logObject = [
//
        'id'=>$logId,
        'login_date'=>$login_date,
        'email'=>$email,
    ];

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
        $currentUser = $allUsers[$counter];
        if($currentUser == $email . ".json"){
            $userString = file_get_contents("db/users/".$currentUser);
            
            $userObject =json_decode($userString);
            $passwordFromDB =$userObject->password;
           
            $passwordFromUser = password_verify($password, $passwordFromDB);
            //ensure session is logged in vid 21
           
           if($passwordFromDB == $passwordFromUser){
                $_SESSION ["loggedIn"] = $userObject -> id;
                $_SESSION ["fullname"] = $userObject -> first_name . " " . $userObject -> last_name;
                $_SESSION ["department"] = $userObject -> department;
                $_SESSION ["designation"] = $userObject -> designation;
                $_SESSION ["reg_date"] = $userObject -> reg_date;
                //adding user log record
                file_put_contents("db/log/". $email . ".json", json_encode($logObject));
                
                //Page redirect based on Access Level
                if ($_SESSION["email"] == "admin@yahoo.com"){
                    header("Location: superadmin.php");
                    } elseif ($_SESSION["designation"] == "Interns"){
                    header("Location: internsdashboard.php");
                    }else{
                        header("Location:dashboard.php");
                    }
            }
               die();
               
            
        }
        
    }
    
    $_SESSION["error"] = "Invalid Email or Password";
    header("Location: login.php");
    die();
}
