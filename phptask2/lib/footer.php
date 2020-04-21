
<!-- MENU -->
<p>
        <a href="index.php">Home</a> |
        <?php if(!isset($_SESSION['loggedIn'])){ ?>
        <a href="register.php">Register</a> |
        <a href="login.php">Login</a>
        
<?php }else{ ?>

        <a href="logout.php">Logout</a>
        
<?php } ?>
        | <a href="forgot.php">Forgot Password</a>
        
    </p>    
          
</body>
</html>