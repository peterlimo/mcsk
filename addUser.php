<?php
require_once 'includes/auth_validate.php';
include_once 'includes/header.php';
require_once './includes/config.php';

$error = false;
//Only super admin is allowed to access this page
if ($_SESSION['user_type'] !== 'ROLE_ADMIN') {
    // show permission denied message
    echo 'Permission Denied';
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data_to_store = filter_input_array(INPUT_POST);
    $data_to_store['name'] = $data_to_store['first_name'] . ' ' . $data_to_store['last_name'];


    if ($data_to_store['user_type'] == 'user') {
        $user = json_decode(get_details_to_endpoint('http://localhost:8080/recognizer/api/auth/signup/user', $data_to_store), true);
    }
    if ($data_to_store['user_type'] == 'admin') {
        $user = json_decode(get_details_to_endpoint('http://localhost:8080/recognizer/api/auth/signup/admin', $data_to_store), true);
    }

    if (isset($user['success'])) {
        if ($user['success'] == 0) {
            $error = true;
            
           $_SESSION['failure'] = $user['message'] . "</br>";
        }
          if ($user['success'] == 1) {
            $error = true;
            
             $_SESSION['success'] = "User added successfully!";
        }
    } else {

        $_SESSION['failure'] .= "An error occured!";
        header('location: addUser.php');
        exit();
    }

}

$edit = false;
?>


<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">

    <!-- Dashboard Sidebar
    ================================================== -->
    <?php
    include_once 'includes/dash_side.php';
    ?>
    <!-- Dashboard Sidebar / End -->


    <!-- Dashboard Content
    ================================================== -->
    <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >

            <!-- Dashboard Headline -->
            <div class="dashboard-headline">
                <h3>Howdy, <?php echo $_SESSION['username']; ?></h3>
                <span>We are glad to see you again!</span>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="#">Dashboard</a></li>
                        <li>Reports</li>
                    </ul>
                </nav>
            </div>
            <div id="container" >
                <div class="row">
                    <div >  <?php include './includes/flash_messages.php'; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3"></div>
                <form class="col-xl-6" method="post" action="" id="login-form">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Add new user</legend>
                        <!-- Text input-->
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>

                            <input  type="text" class="input-text with-border"  name="first_name" placeholder="first name" class="form-control" value="<?php echo ($edit) ? $admin_account['user_name'] : ''; ?>" autocomplete="off">
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input  type="text" class="input-text with-border"  name="last_name" placeholder="last name" class="form-control" value="<?php echo ($edit) ? $admin_account['user_name'] : ''; ?>" autocomplete="off">
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input  type="text" class="input-text with-border"  name="username" placeholder="user name" class="form-control" value="<?php echo ($edit) ? $admin_account['user_name'] : ''; ?>" autocomplete="off">
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input   type="text" class="input-text with-border"  name="email" placeholder="email" class="form-control" value="<?php echo ($edit) ? $admin_account['email'] : ''; ?>" autocomplete="off">
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input  class="input-text with-border"  type="password" name="password" placeholder="Password " class="form-control" required="" autocomplete="off">
                        </div>

                        <!-- radio checks -->
                        <div class="col-xl-4 col-md-4">
                            <div class="section-headline margin-top-25 margin-bottom-12"><h5>User Type</h5></div>
                            <div class="checkbox">
                                <input type="checkbox" id="chekcbox1" name="user_type" value="admin" >
                                <label for="chekcbox1"><span class="checkbox-icon"></span> Admin</label>
                            </div>
                            <br>
                            <div class="checkbox">
                                <input type="checkbox" name="user_type" value="user" id="chekcbox3" checked>
                                <label for="chekcbox2"><span class="checkbox-icon"></span> User</label>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
                            </div>
                        </div>
                    </fieldset>


                    <!-- Button -->

                    <!-- Social Login -->




            </div>

            <div class="row">
                <div class="dashboard-box"></div>
            </div>





            <!-- Spacer -->
            <div class="margin-bottom-70"></div>

            <?php
            include_once 'includes/footer.php';
            ?>
