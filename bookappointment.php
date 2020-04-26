<?php include_once('lib/header.php');
//if a session is logged in and you dont want to be sent back to the login page v21 redirect to dashbord
//For ACL, if a designation session is set and the session is logged in, then go to Interns or Representative team dashboard

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: bookappointment.php");
}

//include_once('lib/header.php'); 
?>
<div class="container">
    <div class="row col-6"> 
        <h3>Book an appointment</h3>
    </div>
    <div class="row col-6">
        <p><strong>Book appointment to resolve issues with your account or to have a session with a representative</strong></p>
    </div>
    <div class="row col-6">
    <p> <p>All fields are required</p></p>
    </div>
    <div class="row col-6">

            <form method="POST" action="processbookappointment.php">
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
                    Date of Appointment:<br/>
                    <input class="form-control" type ="date" name="dateFrom" value="<?php
                        echo date('Y-m-d');?>" />
                    
                </p>

                <p>
                    <label>Time of Appointment</label><br />
                    <select class="form-control" name="time" >
                        <option value="">Select one</option>
                        <option
                        <?php
                        if(isset($_SESSION['time']) && $_SESSION['time'] == "10:00AM"){
                            echo "selected";
                        }
                        ?>
                        >10:00AM</option>
                        <option
                        <?php
                        if(isset($_SESSION['time']) && $_SESSION['time'] == "12:00PM"){
                            echo "selected";
                        }
                        ?>
                        >12:00PM</option>
                        <option
                        <?php
                        if(isset($_SESSION['time']) && $_SESSION['time'] == "2:00PM"){
                            echo "selected";
                        }
                        ?>
                        >2:00PM</option>
                        <option
                        <?php
                        if(isset($_SESSION['time']) && $_SESSION['time'] == "4:00PM"){
                            echo "selected";
                        }
                        ?>
                        >4:00PM</option>
                    </select>

                </p>

                <p>
                    <label>Nature of Appointment</label><br />
                    <select class="form-control" name="nature" >
                        <option value="">Select one</option>
                        <option
                        <?php
                        if(isset($_SESSION['nature']) && $_SESSION['nature'] == "Account"){
                            echo "selected";
                        }
                        ?>
                        >Account</option>
                        <option
                        <?php
                        if(isset($_SESSION['nature']) && $_SESSION['nature'] == "Tutoring"){
                            echo "selected";
                        }
                        ?>
                        >Tutoring</option>
                    </select>

                </p>

                <p>
                    <label>Initial Complaint</label><br />
                    <input 
                    <?php
                        if(isset($_SESSION['icomplaint'])){
                            echo "value=" .$_SESSION['icomplaint'];
                        }
                    ?>
                    type="text" class="form-control" name="icomplaint" placeholder="Initial Complaint" />
                </p>

                <p>
                    <label>Department to Visit</label><br />
                    <select class="form-control" name="department" >
                        <option value="">Select one</option>
                        <option
                        <?php
                        if(isset($_SESSION['department']) && $_SESSION['department'] == "Representative"){
                            echo "selected";
                        }
                        ?>
                        >Representative </option>
                        <option
                        <?php
                        if(isset($_SESSION['department']) && $_SESSION['department'] == "Administration"){
                            echo "selected";
                        }
                        ?>
                        >Administration</option>
                    </select>

                </p>
                
                <p>
                    <button class="btn btn-sm btn-success" type="submit">Book appointment</button>
                </p>
            </form>
    </div>
</div>
<?php include_once('lib/footer.php'); ?>