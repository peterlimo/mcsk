<?php
include_once 'includes/auth_validate.php';
include_once 'includes/header.php';
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
                        <li><a href="#">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </nav>
            </div>
            
                 <?php
                include './getResults.php';
                 include './getUploads.php';
                 $recentResults=getRecentResults();
                 $recentUploads= getRecentUploads();
               //  print_r($recentResults);exit();
                 
                
                ?>
      <div id="container" >
            <div class="row">
            <div >  <?php include './includes/flash_messages.php'; ?></div>
        </div>
          </div>
            <!-- Fun Facts Container -->
            <div class="fun-facts-container">
                <div class="fun-fact" data-fun-fact-color="#36bd78">
                    <div class="fun-fact-text">
                        <span>Music Uploaded</span>
                        <h4><?php echo $uno ?></h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-feather-upload-cloud"></i></div>
                </div>
                <div class="fun-fact" data-fun-fact-color="red">
                   
                </div>
                <div class="fun-fact" data-fun-fact-color="red">
                    <div class="fun-fact-text">
                        <span>Conflicts Detected</span>
                        <h4><?php echo $rno ?></h4>
                    </div>
                    <div class="fun-fact-icon"><i class="icon-feather-x"></i></div>
                </div>

                <!-- Last one has to be hidden below 1600px, sorry :( -->
                <div class="fun-fact" data-fun-fact-color="#2a41e6">
                   
            </div>
            </div>

            <!-- Row -->
            <div class="row">

                <div class="col-xl-12">
                    <!-- Dashboard Box -->
                    <div class="dashboard-box main-box-in-row">
                        <div class="headline">
                            <h3><i class="icon-feather-bar-chart-2"></i>Upload history</h3>
                            <div class="sort-by">
                                <select class="selectpicker hide-tick">
                                    <option>Last 6 Months</option>
                                    <option>This Year</option>
                                    <option>This Month</option>
                                </select>
                            </div>
                        </div>
                        <div class="content">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart" width="200" height="45"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Box / End -->
                </div>
                <div class="col-xl-4">

                 
                </div>
            </div>
            <!-- Row / End -->

            <!-- Row -->
            <div class="row">

                <!-- Dashboard Box -->
                <div class="col-xl-6">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3><i class="icon-material-baseline-notifications-none"></i> Recent uploads</h3>
                            <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" title="Mark all as read">
                                <i class="icon-feather-check-square"></i>
                            </button>
                        </div>
                           <?php foreach ($recentUploads as $uploads){?>
                        <div class="content">
                            <ul class="dashboard-box-list">
                                <li>
                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                    <span class="notification-text">
                                        <strong><?php echo $uploads['file'] ?></strong> was uploaded successfully <a href="#">for artist <?php echo $uploads['artist'] ?></a>
                                    </span>
                                    <!-- Buttons -->
                                    <div class="buttons-to-right">
                                        <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                          <?php } ?>
                    </div>
                </div>

           
                <!-- Dashboard Box -->
             <div class="col-xl-6">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3><i class="icon-material-baseline-notifications-none"></i> Recent Conflicts</h3>
                            <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" title="Mark all as read">
                                <i class="icon-feather-check-square"></i>
                            </button>
                        </div>
                        <?php foreach ($recentResults as $conflicts){?>
                        <div class="content">
                            <ul class="dashboard-box-list">
                                <li>
                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                    <span class="notification-text">
                                        <strong><?php echo $conflicts['file'] ?></strong> conflicted with  <a href="#"><?php echo $conflicts['r_title'] ?></a>
                                    </span>
                                    <!-- Buttons -->
                                    <div class="buttons-to-right">
                                        <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="dashboard-box"></div>
            </div>
            
         
            <?php
            include_once 'includes/footer.php';
            ?>
