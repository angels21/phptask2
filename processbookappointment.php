<?php session_start();
//Collecting the data



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


    ];

    //attempmt to create session and display on other pages remove if code misbehaves
     // ($counter = 0; $counter < $countAllUsers ; $counter++) {
       // $currentUser = $allUsers[$counter];
       // if($currentUser == $email . ".json"){
            //$AlluserString = file_get_contents("db/appointments/".$countAllUsers);
            
           // $userObject =json_decode($allUsers);
            
          //  $_SESSION["allUsers"] = $userObject -> id . " " . $userObject -> appdate . " " . $userObject -> time . " " . $userObject -> nature . " " . $userObject -> icomplaint . " " . $userObject -> department;
            //ensure session is logged in vid 21
            //$contents=array_map('file_get_contents',array_filter(glob('db/appointments/*'),function($file) {
              //  return (is_file($file) && filesize($file)<30000);
              //  }));    
           

    

    //save in the database;

    file_put_contents("db/appointments/". $email . ".json", json_encode($userObject));

    $_SESSION["message"] = "Appointment has been booked successfully. We will be expecting you ";

    header("Location: internsdashboard.php");
    die();

}

  ?>