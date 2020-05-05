<?php include_once('lib/header.php');

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: payfailure.php");
}
?>

<div class="container">
    <div class="row col-6"> 
        <h3>Payment unsuccessful! Check your payment details or try again later</h3>
    </div>
   
    <p>
                <a href="internsdashboard.php">Return to dashboard</a>
                <a href="paybill.php">Try again</a>
    </p>
    </div>
</div>
 

<?php include_once('lib/footer.php'); ?>