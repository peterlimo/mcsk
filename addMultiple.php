<?php
include_once 'includes/auth_validate.php';
include_once 'includes/header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
print_r($_POST);exit();
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



                <a href="#" class="btn btn-info" id="insert-more"><i class="icon-line-awesome-plus-square-o"></i> Add New Row </a>
                <form action="postMultiple.php"  method="post" enctype="multipart/form-data">
                    <br>
                    <table id="mytable">
                        <thead>
                        <th>File</th>
                        <th>Album</th>
                        <th>Member No.</th>
                        <th>Song Title</th>
                        <th>Artist name</th>
                        <th>Stage name</th>
                     
                        </thead>
                        <tbody>
                            <tr>

                                <td>

                                    <input class="with-border" type="file" name="file[]" accept="audio/*,video/*,image/*"  id="upload"  required="required" />


                                </td>
                                <td>
                                    <input class="with-border" type="text" name="album[]"  placeholder="Album"  id="album"  required="required" />

                                </td>

                                <td>
                                    <input class="with-border" type="text" name="memberNo[]" placeholder="Membership No." id="member_no" multiple required="required" />
                                </td>
                                <td>
                                    <div class="input-with-icon-left">
                                        <input class="with-border" type="text"  name="title[]" placeholder="Titlee" id="artist_name" multiple required="required" />
                                    </div>
                                </td>
                                <td>
                                    <input class="with-border form-control" type="text"  name="artistName[]" placeholder="Artist Name" id="stage_name" multiple required="required" />
                                </td>
                                <td>
                                    <input class="with-border" type="text"  name="stageName[]" placeholder="Stage Name" id="stage_name" multiple required="required" />
                                </td>
                              
                            </tr>
                    </table>
                    <input type="submit" class="submit button margin-top-15" id="btnSubmit" value="Upload" />
                </form>



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