<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
}
?>

<h3>Dashboard for Representative Teams, Some items in this dashboard are not visible to interns</h3>

    LoggedIn User ID:  <?php echo $_SESSION['loggedIn'] ?>
    Registered on:
<?php echo $_SESSION["reg_date"]; ?>
Department:
<?php echo $_SESSION["department"]; ?>
    AccessLevel:
<?php echo $_SESSION["designation"]; ?>
    Date of Last login:
<?php echo $_SESSION["login_date"]; ?>

<?php include_once('lib/footer.php'); ?>