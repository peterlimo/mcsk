
<?php
session_start();
//If User is logged in the session['user_logged_in'] will be set to true

//if user is Not Logged in, redirect to login.php page.
//print_r($_SESSION);exit();
if (isset($_SESSION['user_logged_in'])) {
        header('Location:dashboard.php');
        exit;
}else  {
        header('Location:login.php');
        exit;
}
