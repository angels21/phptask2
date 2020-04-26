<?php session_start();
//Collecting the data
require_once('functions/user.php');


$errorCount = 0;

//Verifying the data, validation

$appdate = date('Y-m-d', strtotime($_POST['dateFrom']));
echo $appdate;
$time = $_POST['time'] != "" ? $_POST['time'] :  $errorCount++;
$nature = $_POST['nature'] != "" ? $_POST['nature'] :  $errorCount++;
$icomplaint = $_POST['icomplaint'] != "" ? $_POST['icomplaint'] :  $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] :  $errorCount++;

$_SESSION['appdate'] = $appdate;
$_SESSION['time'] = $time;
$_SESSION['nature'] = $nature;
$_SESSION['icomplaint'] = $icomplaint;
$_SESSION['department'] = $department;

if(isset($_SESSION['email'])){
    $email= $_SESSION['email'];
  }
                

if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"] = $session_error;
    header("Location: bookappointment.php");

}else{

    $allUsers = scandir("db/appointments/"); //return @array (2 filled)
    $countAllUsers = count($allUsers);
    $newUserId = ($countAllUsers-1);
    $userObject = [

        'id'=>$newUserId,
        'appdate'=>$appdate,
        'time'=>$time,
        'nature'=>$nature,
        'icomplaint'=>$icomplaint,
        'department'=>$department,
        'email'=>$email,

    ];
 
              $userExists = find_user($email);

              if($userExists){
                file_put_contents("db/appointments/". $email . ".json", json_encode($userObject));
                $_SESSION["message"] = "Appointment has been booked successfully. We will be expecting you ";
                header("Location: appsuccess.php");
                die();
              }

    $_SESSION["error"] = "You are not suppossed to be on this page";
    header("Location: bookappointment.php");
    die();

}

  ?>