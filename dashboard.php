<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
}
?>

<div class="container">
    <div class="row col-6"> 
        <h3>Dashboard for Representatives</h3>
    </div>
    <div class="row col-6">
        <p><strong>Welcome to your dashboard: <?php echo $_SESSION ["fullname"]; ?>, you are logged in with user ID: <?php echo $_SESSION['loggedIn'] ?> </strong></p>
    </div>
    <div class="row col-6">
    <p> <p>You registered on: <?php echo $_SESSION["reg_date"]; ?>, with department: <?php echo $_SESSION["department"]; ?> </p></p>
    </div>
    <div class="row col-6">
    <p> <p>Your designation access level is: <?php echo $_SESSION["designation"]; ?>, and your date of last login is: <?php echo $_SESSION["login_date"]; ?> </p></p>
    </div>

    <Br>    
        <a href="allappointments.php">View all appointments</a>        
    </Br>       
    </div>
</div>
<?php include_once('lib/footer.php'); ?>