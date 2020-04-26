<?php include_once('lib/header.php');

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: appsuccess.php");
}
?>

<div class="container">
    <div class="row col-6"> 
        <h3>Appointment successfully booked!</h3>
    </div>
    <div class="row col-6">
        <p><strong>We will be expecting you. Come with your fees and learning materials that were allotted to you after signup.</strong></p>
    </div>
    <div class="row col-6">
    <p> <p>Keep record of your time and date</p></p>
    </div>
    <p>
                <a href="internsdashboard.php">Return to dashboard</a>
                <a href="bookappointment.php">Book another appointment</a>
    </p>
    </div>
</div>
 

<?php include_once('lib/footer.php'); ?>