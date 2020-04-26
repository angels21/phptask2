<?php include_once('lib/header.php');


function ViewPatients(){
    $patient = "";
    $allpatient = scandir("db/users/");
$countallpatient = count($allpatient);
for ($counter = 2; $counter < $countallpatient; $counter++ ){
    $currentpatient =$allpatient[$counter]; 
      $patient_record = file_get_contents("db/users/". $currentpatient);
      $userpatient = json_decode($patient_record);
      if($userpatient->designation == "Interns" ){
        $patient .= "
          <tr>
                <th></th>
                <th></th>
                <td>$userpatient->id</td>
                <th></th>
                <th></th>
                <td>$userpatient->first_name . $userpatient->last_name</td>
                <th></th>
                <th></th>
                <td>$userpatient->email</td>
                <th></th>
                <th></th>
                <td>$userpatient->department</td>
            </tr>
            ";
      }
    }
    return $patient;
    }

?>
<div class="container">
    <div class="row col-6"> 
        <table >
                <thead>All interns registered with us

                    <tr>
                        <th></th>
                        <th></th>
                        <th>ID</th>
                        <th></th>
                        <th></th>
                        <th>Name</th>   
                        <th></th>
                        <th></th>                   
                        <th>Email</th> 
                        <th></th> 
                        <th></th>
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
    </div>
</div> 