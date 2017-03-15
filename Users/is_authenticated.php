<?php
    session_start();
    if(!isset($_SESSION["is_logged_in"])) {
        // if everything good go to index page
        header('Location: ../Users/login.php');
    }
?>