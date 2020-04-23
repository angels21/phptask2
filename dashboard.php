<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
}
?>

<h3>Dashboard for Representative Teams, Some items in this dashboard are not visible to interns</h3>

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
<?php
function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}
?>
 

<?php include_once('lib/footer.php'); ?>