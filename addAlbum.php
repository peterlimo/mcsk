<?php
include_once 'includes/auth_validate.php';
include_once 'includes/header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    print_r($_POST);
    exit();
}
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
                        <li>Uploads</li>
                    </ul>
                </nav>
            </div>

            <div class="row">
                <div>  <?php include './includes/flash_messages.php'; ?></div>
            </div>



            <div class="row">


                <div id="container" >
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 offset-xl-2 offset-lg-2">

                            <section id="contact" class="margin-bottom-60">
                                <h3 class="headline margin-top-15 margin-bottom-35">Select Audio/Video file</h3>

                                <form method="post" enctype="multipart/form-data"  action="postAlbum.php" name="inputform" id="form" autocomplete="on">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="section-headline margin-top-15 margin-bottom-12">
                                                <h5>File</h5>
                                            </div>
                                            <div class="input-with-icon-left">
                                                <input class="with-border" type="file" name="file[]" accept="audio/*,video/*,image/*"  id="upload" multiple="true"  required="required" />
                                                <i class="icon-material-outline-attach-file"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="section-headline margin-top-15 margin-bottom-12">
                                                <h5>Album</h5>
                                            </div>
                                            <div class="input-with-icon-left">
                                                <input class="with-border" type="text" name="album"  placeholder="Album"  id="album"  required="required" />
                                                <i class="icon-material-outline-person-pin"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="section-headline margin-top-15 margin-bottom-12">
                                                <h5>Member No. </h5>
                                            </div>
                                            <div class="input-with-icon-left">
                                                <input class="with-border" type="text" name="memberNo" placeholder="Membership No." id="member_no" multiple required="required" />
                                                <i class="icon-material-outline-person-pin"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="section-headline margin-top-15 margin-bottom-12">
                                                <h5>Stage name</h5>
                                            </div>
                                            <div class="input-with-icon-left">
                                                <input class="with-border" type="text"  name="stageName" placeholder="Stage Name" id="stage_name" multiple required="required" />
                                                <i class="icon-material-outline-person-pin"></i>
                                            </div>
                                        </div>


                                    </div>
                                    <input type="submit" class="submit button margin-top-15" id="btnSubmit" value="Upload" />

                                </form>
                            </section>

                        </div>
                    </div>
                </div>

            </div>




            <div class="row">
                <div class="dashboard-box"></div>
            </div>


            <?php
            include_once 'includes/footer.php';
            ?>
            <script>
                $("#insert-more").click(function () {
                    $("#mytable").each(function () {
                        var tds = '<tr>';
                        jQuery.each($('tr:last td', this), function () {
                            tds += '<td>' + $(this).html() + '</td>';
                        });
                        tds += '</tr>';
                        if ($('tbody', this).length > 0) {
                            $('tbody', this).append(tds);
                        } else {
                            $(this).append(tds);
                        }
                    });
                });
            </script>