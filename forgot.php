<?php include_once('lib/header.php'); require_once('functions/alert.php'); ?>

 <h3>Forgot Password</h3>
 <p>Enter the email address associated with your account</p>

 <form action="processforgot.php" method="POST">
 <p>
        <?php print_alert();  ?>
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
            <button type="submit">Send reset code</button>
        </p>
 </form>
   
<?php include_once('lib/footer.php'); ?>