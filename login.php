<?php include_once('lib/header.php'); 
 
 if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: dashboard.php");
    if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
        header("Location: interndashboard.php");
}
?>

<h3>Login</>
    <p>
        <?php
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
//unsets session message on page refresh
                session_destroy();
            }
        ?>
    </p>
    <form method="POST" action="processlogin.php">
    <p>
        <?php
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
//unsets session message on page refresh
                session_destroy();
            }
        ?>
    </p>

        
        <p>
            <label>Email address</label><br />
            <input 
            <?php
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];
                }
            ?>
            type="text" name="email" placeholder="Email Address"  />
        </p>
        <p>
            <label>Password</label><br />
            <input type="password" name="password" placeholder="Password"  />
        </p>
        
       
      
        <p>
            <button type="submit">Login</button>
        </p>

    </form>
 

<?php include_once('lib/footer.php'); ?>