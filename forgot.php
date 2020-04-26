<?php include_once('lib/header.php'); require_once('functions/alert.php'); ?>

<div class="container">
    <div class="row col-6">
        <h3>Forgot Password</h3>
    </div>
    <div class="row col-6">
        <p>Enter the email address associated with your account</p>
    </div>
    <div class="row col-6">
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
                    type="text" class="form-control" name="email" placeholder="Email Address"  />
                </p>
                <p>
                    <button class="btn btn-sm btn-primary" type="submit">Send reset code</button>
                </p>
                <p>
                <a href="register.php">Don't have an account? Register here</a><br />
                <a href="login.php">Already have an account? Login</a>
            </p>
        </form>
    </div>
</div>
   
<?php include_once('lib/footer.php'); ?>