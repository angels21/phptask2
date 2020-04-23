<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
}
?>

<h3>Pay your bills here</h3>




<?php include_once('lib/footer.php'); ?>