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



                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a class="btn btn-primary" id="pdf" href="#"><i class="icon-line-awesome-file-pdf-o">

                                </i>Export Pdf</a></li>

                        <li><a  id="csv" class="btn btn-danger" href="#"><i class="icon-line-awesome-file-excel-o">

                                </i> Export Excel</a></li>

                    </ul>
                </nav>

          
        </div>
            
             
          <div id="container" >
            <div class="row">
            <div >  <?php include './includes/flash_messages.php'; ?></div>
        </div>
          </div>
        <?php
        include_once'getResults.php';
        // $res = json_decode($uploads, true);

        rsort($results);
        // print_r($results);exit();
        ?>


        <div class="row">           
            <div class="table-responsive table-responsive-sm">

                <table id="example" class="table basic-table" >

                    <!--id	artist	title	duration	score	artifactId	bucketId	timestamp	album	label	iscr	playOffset	youtube	deezer	spotify	location-->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ACR Id</th>
                            <th>Uploaded File</th>
                            <th>Uploaded Artist</th>
                            <th>Conflict Artist</th>

                            <th>Uploaded name</th>
                            <th>Conflict Name</th>
                            <th>Uploaded member No.</th>
                            <th>Conflict Member No.</th>
                            <th>Uploaded Album</th>
                            <th>Conflict Album</th>
                            <th>Uploaded Stage Name</th>
                            <th>Conflict Stage Name</th>   

                        </tr>
                    </thead>



                    <?php foreach ($results as $row) {
                        ?> 
                        <tr>
                             <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['artifact_id'] ?></td>
                            <td><?php echo $row['file'] ?></td>
                            <td><?php echo $row['u_artist'] ?></td>
                            <td><?php echo $row['u_artist'] ?></td>
                            <td><?php echo $row['r_title'] ?></td>
                            <td><?php echo $row['r_title'] ?></td>
                            <td><?php echo $row['u_membership_no'] ?></td>
                            <td><?php echo $row['r_membership_no'] ?></td>
                            <td><?php echo $row['u_album'] ?></td>
                            <td><?php echo $row['r_album'] ?></td>
                            <td><?php echo $row['u_stage_name'] ?></td>
                            <td><?php echo $row['r_stage_name'] ?></td>

                            </td>



                        </tr>  



                        <?php
                    }
                    ?>



                </table>
            </div>



        </div>

        <div class="row">
            <div class="dashboard-box"></div>
        </div>


        <?php
        include_once 'includes/footer.php';
        ?>
