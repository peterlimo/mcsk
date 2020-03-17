
<!doctype html>
<html lang="en">

    <!-- Mirrored from www.vasterad.com/themes/hireo_082019/dashboard-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Feb 2020 08:57:53 GMT -->
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <title> Music Recognizer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/customcss.css">
        <link rel="stylesheet" href="css/colors/blue.css">
        <link rel="stylesheet" href="css/jquery.dataTables.css">
        <link rel="stylesheet" href="css/rowGroup.dataTables.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    <body  class="red">

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header Container
            ================================================== -->
            <header id="header-container" class="fullwidth dashboard-header not-sticky">

                <!-- Header -->
                <div id="header">
                    <div class="container">

                        <!-- Left Side Content -->
                        <div class="left-side">

                            <!-- Logo -->
                            <div id="logo">
                                <a href="dashboard.php"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <!-- Left Side Content / End -->


                        <!-- Right Side Content / End -->
                        <div class="right-side">

                            <!--  User Notifications -->
                            <div class="header-widget hide-on-mobile">

                                <!-- Notifications -->
                                <div class="header-notifications">

                                    <!-- Trigger -->
                                    <div class="header-notifications-trigger">
                                        <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <div class="header-notifications-headline">
                                            <h4>Notifications</h4>
                                            <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                                <i class="icon-feather-check-square"></i>
                                            </button>
                                        </div>

                                        <div class="header-notifications-content">
                                            <div class="header-notifications-scroll" data-simplebar>
                                                <ul>
                                                    <!-- Notification -->
                                                    <li class="notifications-not-read">
                                                        <a href="dashboard.php">
                                                            <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                                            <span class="notification-text">
                                                                <strong>Hello</strong> welcome <span class="color">Upload content</span>
                                                            </span>
                                                        </a>
                                                    </li>



                                                    <!-- Notification -->



                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- Messages -->
                                <div class="header-notifications">
                                    <div class="header-notifications-trigger">
                                        <a href="#"><i class="icon-feather-mail"></i><span>3</span></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <div class="header-notifications-headline">
                                            <h4>Messages</h4>
                                            <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                                <i class="icon-feather-check-square"></i>
                                            </button>
                                        </div>

                                        <div class="header-notifications-content">
                                            <div class="header-notifications-scroll" data-simplebar>
                                                <ul>
                                                    <!-- Notification -->


                                                    <!-- Notification -->


                                                    <!-- Notification -->
                                                    <li class="notifications-not-read">
                                                        <a href="dashboard.php">
                                                            <span class="notification-avatar status-online"><img src="images/user-avatar-placeholder.png" alt=""></span>
                                                            <div class="notification-text">
                                                                <strong>Hello there</strong>
                                                                <p class="notification-msg-text">Welcome!</p>

                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <a href="dashboard.php" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
                                    </div>
                                </div>

                            </div>
                            <!--  User Notifications / End -->

                            <!-- User Menu -->
                            <div class="header-widget">

                                <!-- Messages -->
                                <div class="header-notifications user-menu">
                                    <div class="header-notifications-trigger">
                                        <a href="#"><div class="user-avatar status-online"><img src="images/user-avatar-placeholder.png" alt=""></div></a>
                                    </div>

                                    <!-- Dropdown -->
                                    <div class="header-notifications-dropdown">

                                        <!-- User Status -->
                                        <div class="user-status">

                                            <!-- User Name / Avatar -->
                                            <div class="user-details">
                                                <div class="user-avatar status-online"><img src="images/user-avatar-small-01.jpg" alt=""></div>
                                                <div class="user-name">
                                                    <?php echo $_SESSION['username'] ?> <span><?php echo $_SESSION['user_type'] ?></span>
                                                </div>
                                            </div>

                                            <!-- User Status Switcher -->
                                            <div class="status-switch" id="snackbar-user-status">
                                                <label class="user-online current-status">Online</label>
                                                <label class="user-invisible">Invisible</label>
                                                <!-- Status Indicator -->
                                                <span class="status-indicator" aria-hidden="true"></span>
                                            </div>	
                                        </div>

                                        <ul class="user-menu-small-nav">
                                            <li><a href="includes/logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                                        </ul>

                                    </div>
                                </div>

                            </div>
                            <!-- User Menu / End -->

                            <!-- Mobile Navigation Button -->
                            <span class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </span>

                        </div>
                        <!-- Right Side Content / End -->


                    </div>
                </div>
                <!-- Header / End -->

            </header>
            <div class="clearfix"></div>
          