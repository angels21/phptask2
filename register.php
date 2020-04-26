<?php include_once('lib/header.php');
//if a session is logged in and you dont want to be sent back to the login page v21 redirect to dashboard/
require_once('functions/alert.php');

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: dashboard.php");
}

//include_once('lib/header.php'); 
?>
<div class="container">
    <div class="row col-6"> 
        <h3>Register</h3>
    </div>
    <div class="row col-6">
        <p><strong>Welcome, Please register</strong></p>
    </div>
    <div class="row col-6">
    <p>All fields are required</p>
    </div>
    <div class="row col-6">


        <form method="POST" action="processregister.php">
        <p>
            <?php print_alert();  ?>
        </p>

        </p>

            <p>
                <label>First Name</label><br />
                <input 
                <?php
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];
                    }
                ?>
                type="text" class="form-control" name="first_name" placeholder="First Name"/>
            </p>
            <p>
            <p>
                <label>Last Name</label><br />
                <input 
                <?php
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];
                    }
                ?>
                type="text" class="form-control" name="last_name" placeholder="Last Name"  />
            </p>
            <p>
                <label>Email address</label><br />
                <input 
                <?php
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];
                    }
                ?>
                type="text"  class="form-control" name="email" placeholder="Email Address"  />
            </p>
            <p>
                <label>Password</label><br />
                <input type="password" class="form-control" name="password" placeholder="Password"  />
            </p>
            <p>
                <label>Gender</label><br />
                <select class="form-control" name="gender" >
                    <option value="">Select one</option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == "Female"){
                        echo "selected";
                    }
                    ?>
                    >Female</option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == "Male"){
                        echo "selected";
                    }
                    ?>
                    >Male</option>
                </select>

            </p>

            <p>
                <label>Designation</label><br />
                <select class="form-control" name="designation" >
                    <option value="">Select one</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == "Representative Team (RT)"){
                        echo "selected";
                    }
                    ?>
                    >Representative Team (RT)</option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == "Interns"){
                        echo "selected";
                    }
                    ?>
                    >Interns</option>
                </select>

            </p>
            <p>
                <label class="label" for="department">Department</label><br />
                <input 
                <?php
                    if(isset($_SESSION['department'])){
                        echo "value=" .$_SESSION['department'];
                    }
                ?>
                type="text" id="department" class="form-control" name="department" placeholder="Department" />
            </p>
            <p>
                <button class="btn btn-sm btn-success" type="submit">Register</button>
            </p>
            <p>
                <a href="forgot.php">Forgot Password</a><br />
                <a href="login.php">Already have an account? Login</a>
            </p>
        </form>
</div>
<?php include_once('lib/footer.php'); ?>