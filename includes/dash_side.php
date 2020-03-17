   
<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<div class="dashboard-sidebar">
    <div class="dashboard-sidebar-inner" data-simplebar>
        <div class="dashboard-nav-container">

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger">
                <span class="hamburger hamburger--collapse" >
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </span>
                <span class="trigger-title">Dashboard Navigation</span>
            </a>

            <!-- Navigation -->
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Start">
                        <li <?php if ($currentPage == 'dashboard.php') {
    ?> class="active" <?php } ?>><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>

                        <li <?php if ($currentPage == 'addfile.php') {
    ?> class="active" <?php } ?>><a href="addfile.php"><i class="icon-material-outline-add-circle-outline"></i> Upload File</a></li>
                        <li <?php if ($currentPage == 'addMultiple.php') {
    ?> class="active" <?php } ?>><a href="addMultiple.php"><i class="icon-material-outline-library-add"></i> Upload Multiple Files</a></li>
                        <li <?php if ($currentPage == 'addAlbum.php') {
    ?> class="active" <?php } ?>><a href="addAlbum.php"><i class="icon-material-outline-library-add"></i> Upload Album</a></li>
                        <li <?php if ($currentPage == 'addArtist.php') {
    ?> class="active" <?php } ?>><a href="addArtist.php"><i class="icon-material-outline-library-add"></i> Upload Artist</a></li>
                        <li <?php if ($currentPage == 'uploads.php') {
    ?> class="active" <?php } ?>><a href="uploads.php"><i class="icon-feather-upload-cloud"></i> Uploads</a></li>
                        <li <?php if ($currentPage == 'conflicts.php') {
    ?> class="active" <?php } ?>><a href="conflicts.php"><i class="icon-feather-x"></i> Conflicts</a></li>
                         <ul data-submenu-title="Reports">  
                        
                        <li <?php if ($currentPage == 'reports.php') {
    ?> class="active" <?php } ?>><a href="reports.php"><i class="icon-line-awesome-file-audio-o"></i> Uploads per user</a></li>
                         </ul>
                    </ul>



                    <ul data-submenu-title="Account">
                        <li <?php if ($currentPage == 'settings.php') {
    ?> class="active" <?php } ?>><a href="#"><i class="icon-material-outline-settings"></i> Settings</a></li>
                           <li <?php if ($currentPage == 'users.php') {
    ?> class="active" <?php } ?>><a href="users.php"><i class="icon-feather-users"></i> Users</a></li>
                                <li <?php if ($currentPage == 'addUser.php') {
    ?> class="active" <?php } ?>><a href="addUser.php"><i class="icon-feather-user-plus"></i>Add User</a></li>
                        <li <?php if ($currentPage == 'logout.php') {
    ?> class="active" <?php } ?>><a href="includes/logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->

        </div>
    </div>
</div>