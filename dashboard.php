<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
}
?>

<h3>Dashboard for Representative Teams, View appointments booked by interns on this page</h3>

    LoggedIn User ID:  <?php echo $_SESSION['loggedIn'] ?>, 
    Welcome,
<?php echo $_SESSION ["fullname"]; ?>, 
    Registered on:
<?php echo $_SESSION["reg_date"]; ?>, 
Department:
<?php echo $_SESSION["department"]; ?>, 
    You are logged in as:
(<?php echo $_SESSION["designation"]; ?>), 
    Date of Last login:
<?php echo $_SESSION["login_date"]; ?>, 
<Br>
<Br>    

<a href="allappointments.php">View all appointments</a> 
                
        
 </Br>       

<?php include_once('lib/footer.php'); ?>