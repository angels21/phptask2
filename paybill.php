<?php include_once('lib/header.php'); 

if(isset($SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: paybill.php");
}

//include_once('lib/header.php'); 
?>
<section id="plans">
        <div class="container">
            <div class="row"> 
                    <h3>Pay your bill</h3>
            </div>
            <div class="row">
                <p><strong>Select the appropriate options and pay your bill by clicking the pay now button. Take note of your Transaction Reference Code.</strong></p>
            </div>
            <div class="row">
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
               
                    <div style="float:left;" class="row">
                        <label class="label" for="email">Use default email or enter another email address</label><br />
                        <input 
                        <?php
                            if(isset($_SESSION['email'])){
                                echo "value=" .$_SESSION['email'];
                            }
                        ?>
                        type="text" id="email" class="form-control" name="email"  placeholder="email" />
                    </div>
                    <div style="float:right;" class="row">    
                        <label>Phone Number</label><br />
                        <input 
                        <?php
                            if(isset($_SESSION['phone'])){
                                echo "value=" .$_SESSION['phone'];
                            }
                        ?>
                        type="text" class="form-control" name="phone" id="phone"  placeholder="Phone number" />
                    </div>

                    <div style="clear:both;">&nbsp;</div>
                                       
                            <div class="container">
                                            <div style="float:center;" class="card-deck mb-3 text-center">
                                                <div style="float:left;" class="card mb-4 shadow-sm">
                                                <div class="card-header">
                                                    <h4 class="my-0 font-weight-normal">PHP</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title">₦10000 <small class="text-muted">/ mo</small></h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                    <li>10 users included</li>
                                                    <li>2 GB of storage</li>
                                                    <li>Email support</li>
                                                    <li>Help center access</li>
                                                    </ul>
                                                    <div class="card-footer">
                                                        <label class="btn btn-lg btn-block btn-primary">
                                                            <input type="radio" name="amount" id="amount" value="10000"> Select PHP
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>
                                                <div style="float:center;" class="card mb-4 shadow-sm">
                                                <div class="card-header">
                                                    <h4 class="my-0 font-weight-normal">NodeJS</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title">₦20000 <small class="text-muted">/ mo</small></h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                    <li>20 users included</li>
                                                    <li>10 GB of storage</li>
                                                    <li>Priority email support</li>
                                                    <li>Help center access</li>
                                                    </ul>
                                                    <div class="card-footer">
                                                        <label class="btn btn-lg btn-block btn-primary">
                                                            <input type="radio" name="amount" id="amount" value="20000"> Select NodeJS
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>
                                                <div style="float:center;" class="card mb-4 shadow-sm">
                                                <div class="card-header">
                                                    <h4 class="my-0 font-weight-normal">Python</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title">₦30000 <small class="text-muted">/ mo</small></h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                    <li>30 users included</li>
                                                    <li>15 GB of storage</li>
                                                    <li>Phone and email support</li>
                                                    <li>Help center access</li>
                                                    </ul>
                                                    
                                                    <div class="card-footer">
                                                        <label class="btn btn-lg btn-block btn-primary">
                                                            <input type="radio" name="amount" id="amount" value="30000"> Select Python
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                            </div>
                        <div style="clear:both;">&nbsp;</div>
                               
                        <p>
                            <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                            <script src="js/billscript.js"></script>
                            <center><button class="btn btn-bg btn-success" type="submit" id="submit" >Pay Now</button></center>
                        </p>
                        
                    </form>
            
            
        </div>
</section>



<?php include_once('lib/footer.php'); ?>