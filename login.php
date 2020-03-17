
<?php
include_once 'includes/header_logout.php';

session_start();
require_once './includes/config.php';
//If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE) {
    header('Location:index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username');
    $passwd = filter_input(INPUT_POST, 'password');

    $passwd = md5($passwd);
    // exit();
//$users=array("super","auditor","admin");
    //Get DB instance. function is defined in config.php

    $db = getDbInstance();
    $db->join("user_roles r", "r.user_id=u.id");
    $db->join("roles l", "l.id=r.role_id");
    $db->orderBy("u.id", "desc");
    $select = ["l.name as user_type", "u.id", "u.name", "u.username"];
    $users = $db->get("api_users u", null, $select);
    $db->where("username", $username);
    $db->where("password", $passwd);

    $row = $db->get('api_users u', null, '*');
    if ($db->count >= 1) {
        // exit();
        $_SESSION['user_logged_in'] = $row[0]['id'];
        $_SESSION['user_type'] = $row[0]['user_type'];
        $_SESSION['username'] = $row[0]['username'];

        header('Location:dashboard.php');
        exit;
    } else {
        $_SESSION['login_failure'] = "Invalid credentials";
        //exit();
        header('Location:login.php');
        exit;
    }
}
?>


<!-- Page Content
================================================== -->
<div class="container">
    <div class="row">
        <div class="col-xl-5 offset-xl-3">


            <div class="login-register-page">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Welcome to MCSK!</h3>
                    <span>Don't have an account? <a href="pages-register.html">Sign Up!</a></span>
                </div>
<?php if (isset($_SESSION['login_failure'])) { ?>
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php
                    echo $_SESSION['login_failure'];
                    unset($_SESSION['login_failure']);
                    ?>
                    </div>
                    <?php } ?>

                <!-- Form -->
                <form method="post" action="" id="login-form">
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="text" value="admin" class="input-text with-border" name="username" id="emailaddress" placeholder="Username" required/>
                    </div>

                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" value="admin123" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </form>

                <!-- Button -->
                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>

                <!-- Social Login -->


            </div>

        </div>
    </div>
</div>


<!-- Spacer -->
<div class="margin-bottom-70"></div>

<?php
include_once 'includes/footer.php';
?>
