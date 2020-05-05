<?php include_once('lib/header.php'); 

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: paybill.php");
}

//include_once('lib/header.php'); 
?>
<section id="plans">
        <div class="container">
            <div class="row col-13"> 
                    <h3>Pay your bill</h3>
            </div>
            <div class="row col-13">
                <p><strong>Select the appropriate options and pay your bill by clicking the pay now button. Take note of your transaction reference</strong></p>
            </div>
            <div class="row col-13">
            <p> <p>All fields are required</p></p>
            </div>
            

                    <form action="">
                    <p>
                        <?php
                            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                //unsets session message on page refresh
                                session_destroy();
                            }
                        ?>
                    </p>

                   

                    <div style="float:left;">
                        <label class="label" for="email">Use default email shown or enter another email</label><br />
                        <input 
                        <?php
                            if(isset($_SESSION['email'])){
                                echo "value=" .$_SESSION['email'];
                            }
                        ?>
                        type="text" id="email" class="form-control" name="email" size="30" placeholder="email" />
                    </div>
                    <div style="float:right;">    
                        <label>Phone Number</label><br />
                        <input 
                        <?php
                            if(isset($_SESSION['phone'])){
                                echo "value=" .$_SESSION['phone'];
                            }
                        ?>
                        type="text" class="form-control" name="phone" id="phone" size="40" placeholder="Phone number" />
                    </div>
 
                    
                                <div style="float:left;" class="col-md4 text-center">
                                    <div class="panel panel-danger panel-pricing">
                                        <div class="panel-heading">
                                            <i class="fa fa-money"></i>
                                            <h3>PHP beginner</h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p><strong>N10000</strong></p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><i class="fa fa-check"></i>Create and deploy simple webpages</li>
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn simple conditional statements</li>
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn  to make payments</li>
                                        </ul>
                                        <div class="panel-footer">
                                            <label class="btn btn-danger btn-block">
                                                <input type="radio" name="amount" id="amount" value="10000"> Click to select PHP
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div style="float:middle;" class="col-md4 text-center">
                                    <div class="panel panel-warning panel-pricing">
                                        <div class="panel-heading">
                                            <i class="fa fa-money"></i>
                                            <h3>NodeJS beginner</h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p><strong>N20000</strong></p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn to create simple API</li>
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn to use CRUD</li>
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn to deploy to Heroku</li>
                                        </ul>
                                        <div class="panel-footer">
                                            <label class="btn btn-warning btn-block">
                                                <input type="radio" name="amount" id="amount" value="20000"> Click to select NodeJS
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div style="float:right;" class="col-md4 text-center">
                                    <div class="panel panel-success panel-pricing">
                                        <div class="panel-heading">
                                            <i class="fa fa-money"></i>
                                            <h3>Python beginner</h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p><strong>N30000</strong></p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn to develop simple games</li>
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn to use conditionals</li>
                                            <li class="list-group-item"><i class="fa fa-check"></i>Learn to use list and arrays</li>
                                        </ul>
                                        <div class="panel-footer">
                                            <label class="btn btn-success btn-block">
                                                <input type="radio" name="amount" id="amount" value="30000"> Click to select Python
                                            </label>
                                        </div>
                                    </div>
                                </div>
                           
                            <p>
                            <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                            <script src="js/billscript.js"></script>
                            <center><button class="btn btn-sm btn-success" type="submit" id="submit" >Pay Now</button></center>
                            </p>
                        
                    </form>
            
            
        </div>
</section>



<?php include_once('lib/footer.php'); ?>