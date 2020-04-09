<?php include_once('lib/header.php'); ?>
    <p>
        <?php
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
//unsets session message on page refresh
                session_destroy();
            }
        ?>
    </p> 
    Welcome to SNH: A place for interns seeking help about their tasks. <br /><hr />
    <p>This is a specialist hub to help lazy interns complete their task and meet deadlines!</p>
    <p>For first timer's, you are adviced to come with your one off fees!</P>

<?php include_once('lib/footer.php'); ?>