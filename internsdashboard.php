<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
}
?>

<h3>Dashboard for Interns</h3>

    LoggedIn User ID:  <?php echo $_SESSION['loggedIn'] ?>
    Registered on:
<?php echo $_SESSION["reg_date"]; ?>
    Department:
<?php echo $_SESSION["department"]; ?>
    AccessLevel:
<?php echo $_SESSION["designation"]; ?>
    Date of Last login:
<?php echo $_SESSION["login_date"]; ?>


<Br>    

<a href="paybill.php">Pay Bill</a> |
<a href="bookappointment.php">Book Appointment</a> 
        
 </Br>       
        
        
   

<?php include_once('lib/footer.php'); ?>