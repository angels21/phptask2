<?php include_once('lib/header.php');
//if a session is logged in and you dont want to be sent back to the login page v21 redirect to dashboard/

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: dashboard.php");
}

//include_once('lib/header.php'); 
?>
<h3>Register</>
    <p><strong>Welcome, Please register</strong></p>
    <p>All fields are required</p>

    <form method="POST" action="processregister.php">
    <p>
        <?php
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
//unsets session message on page refresh
                session_destroy();
            }
        ?>
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
            type="text" name="first_name" placeholder="First Name"/>
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
            type="text" name="last_name" placeholder="Last Name"  />
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
            <label>Gender</label><br />
            <select name="gender" >
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
            <select name="designation" >
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
            <label>Department</label><br />
            <input 
            <?php
                if(isset($_SESSION['department'])){
                    echo "value=" .$_SESSION['department'];
                }
            ?>
            type="text" name="department" placeholder="Department" />
        </p>
        <p>
            <button type="submit">Register</button>

    </form>

<?php include_once('lib/footer.php'); ?>