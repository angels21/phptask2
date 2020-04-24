<?php include_once('lib/header.php'); 
    require_once('functions/alert.php');
    require_once('functions/user.php');
    require_once('functions/email.php');
    require_once('functions/token.php');

//if token is set not set, user shouldnt access reset page

if(!is_user_LoggedIn() && !is_token_set()){
    $_SESSION["error"] = "You are not authorized to view that page";
    header("Location: login.php");

}

?>

    <h3>Reset Password</h3>
    <p>Reset Password associated with your account : [email]</p>

    <form action="processreset1.php" method="POST">
    <p>
        <?php   print_alert();     ?>
    </p>
    <?php if(!is_user_LoggedIn()){ ?>
    <input 
        <?php
            if(is_token_set_in_session()){
                echo "value='" . $_SESSION['token'] . "'";
            }else{

                echo "value='" . $_GET['token'] . "'";
            }
        ?>

        type="hidden" name="token" />
    <?php } ?>

    <p>
            <label>Email address</label><br />
            <input 
                <?php
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];
                    }
                ?>
                        type="text" name="email" placeholder="Email address" 
            />
    
        </p>
        <p>
            <label>Enter New Password</label><br />
            <input type="password" name="password" placeholder="Password"  />
        </p>
        <p>
            <button type="submit">Reset Password</button>
        </p>
    </form>
   
<?php include_once('lib/footer.php'); ?>