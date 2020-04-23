<?php include_once('lib/header.php');


function ViewPatients(){
    $patient = "";
    $allpatient = scandir("db/appointments/");
$countallpatient = count($allpatient);
for ($counter = 2; $counter < $countallpatient; $counter++ ){
    $currentpatient =$allpatient[$counter]; 
      $patient_record = file_get_contents("db/appointments/". $currentpatient);
      $userpatient = json_decode($patient_record);
      if($countallpatient > 2 ){
        $patient .= "
          <tr>
                <td>$userpatient->id</td>
                <td>$userpatient->appdate</td>
                <td>$userpatient->time</td>
                <td>$userpatient->nature</td>
                <td>$userpatient->icomplaint</td>
                <td>$userpatient->department</td>
            </tr>
            ";   
        }else{
            $patient .= "
            <tr>
                <td>You have no pending appointments</td>
                
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
                        <th>Interns ID</th>
                        <th>Appointment Date</th>
                        <th>Time of appointment</th>
                        <th>Nature of appointment</th>
                        <th>initial Complaint</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
               <?php
                $showpatient = viewPatients();
                echo $showpatient;
               ?>
                </tbody>
            </table>