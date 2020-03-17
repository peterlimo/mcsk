<?php
include_once 'includes/auth_validate.php';
include_once 'includes/header.php';
if ($_SESSION['user_type'] !== 'ROLE_ADMIN') {
    // show permission denied message
    echo 'Permission Denied';
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
                        <li><a class="btn btn-primary" id="pdf" href="#"><i class="icon-line-awesome-file-pdf-o">

                                </i>Export Pdf</a></li>

                        <li><a  id="csv" class="btn btn-danger" href="#"><i class="icon-line-awesome-file-excel-o">

                                </i> Export Excel</a></li>

                    </ul>
                </nav>
            </div>
            <?php
            include_once'getUsers.php';
            
            // $res = json_decode($uploads, true);

            // $r = rsort($uploads);
            ?>

            <div id="container" >
                <div class="row">
                    <div >  <?php include './includes/flash_messages.php'; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="table-responsive">

                    <table id="example" class="table  basic-table" style="width:100%">


                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Type</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Actions</th>   
                            </tr>
                        </thead>



                        <?php foreach ($users as $row) {
                            ?> 
                            <tr>

                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['role'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                 <td><?php echo $row['username'] ?></td>

                                <td> <button onclick="getData(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#classModal"><i class="icon-feather-edit"></i> Edit</button>



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
