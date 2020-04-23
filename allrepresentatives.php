<?php include_once('lib/header.php');


function ViewPatients(){
    $patient = "";
    $allpatient = scandir("db/users/");
$countallpatient = count($allpatient);
for ($counter = 2; $counter < $countallpatient; $counter++ ){
    $currentpatient =$allpatient[$counter]; 
      $patient_record = file_get_contents("db/users/". $currentpatient);
      $userpatient = json_decode($patient_record);
      if($userpatient->designation == "Representative Team (RT)" ){
        $patient .= "
          <tr>
                <td>$userpatient->id</td>
                <td>$userpatient->first_name . $userpatient->last_name</td>
                <td>$userpatient->email</td>
                <td>$userpatient->department</td>
            </tr>
            ";
      }
    }
    return $patient;
    }

?>

<table >
                <thead>
                    <tr>
                        <th>Representative ID</th>
                        <th>Representative Name</th>
                        <th>Representative Email</th>
                        <th>Representative Department</th>
                    </tr>
                </thead>
                <tbody>
               <?php
                $showpatient = viewPatients();
                echo $showpatient;
               ?>
                </tbody>
            </table>
            