<?php include_once('lib/header.php'); require_once('functions/alert.php'); ?>

    <p>

            <?php print_alert();  ?>
        
    </p> 
    
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Welcome to SNH: A place for interns seeking help about their tasks</h1>
  <p class="lead">This is a specialist hub to help lazy interns complete their task and meet deadlines!</p>
  <p class="lead">For first timer's, you are adviced to come with your one off fees!</p>

    <p>
        <a class="btn btn-bg btn-outline-secondary" href="login.php">Login</a>
        <a class="btn btn-bg btn-outline-primary" href="register.php">Register</a> 
    </p>
</div>



<?php include_once('lib/footer.php'); ?>