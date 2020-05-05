<?php include_once('lib/header.php');

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: paysuccess.php");
}
?>

<div class="container">
    <div class="row col-6"> 
        <h3>Payment successful!</h3>
    </div>
    <div class="row col-6">
        <p><strong>We will be expecting you. Come with your transaction reference for further validation.</strong></p>
    </div>
    <div class="row col-6">
    <p> <p>Keep record of your transaction reference</p></p>
    </div>
    <p>
                <a href="internsdashboard.php">Return to dashboard</a>
                <a href="paybill.php">Pay another bill</a>
    </p>
    </div>
</div>
 

<?php include_once('lib/footer.php'); ?>