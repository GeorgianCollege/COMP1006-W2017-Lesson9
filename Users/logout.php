<?php
    session_start();
    if(isset($_SESSION["is_logged_in"])) {
        $_SESSION = Array();
        session_destroy();
        // if everything good go to index page
        header('Location: ../Users/login.php');
    }
    else {
        header('Location: ../index.php');
    }
 ?>