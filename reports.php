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
                <div class="dashboard-box"></div>
            </div>
            <?php
            include_once'./getUserUploads.php';
            // $r = rsort($uploads);
            ?>


            <div class="row">
                <div class="table-responsive">


                    <table>
                        <tr>

                            <td>
                                <select id='searchByGender'>
                                    <option value=''>-- Select User--</option>

                                    <?php foreach ($users as $user) {
                                        ?> 
                                        <option value='<?php echo $user['id'] ?>'><?php echo $user['name'] ?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><a class="btn btn-primary" id="pdf" href="#"><i class="icon-line-awesome-file-pdf-o">

                                    </i>Export Pdf</a></td>
                             <td><a  id="csv" class="btn btn-danger" href="#"><i class="icon-line-awesome-file-excel-o">

                                </i> Export Excel</a></td>
                        </tr>
                    </table>


                    <table id="empTable" class="table  basic-table" style="width:100%">


                        <thead>
                            <tr>

                                <th>File Name</th>
                                <th>Artist</th>
                                <th>Title</th>
                                <th>Uploaded Date</th>
                                <th>Uploaded By</th>



                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <?php
            include_once 'includes/footer.php';
            ?>

            <!-- Script -->
            <script>
                $(document).ready(function () {
                    var dataTable = $('#empTable').DataTable({
                        'processing': true,
                        'serverSide': true,
                        'serverMethod': 'post',
                        //'searching': false, // Remove default Search Control
                        'ajax': {
                            'url': 'filterData.php',
                            'data': function (data) {
                                // Read values
                                var gender = $('#searchByGender').val();
                                var name = $('#searchByName').val();

                                // Append to data
                                data.searchByGender = gender;
                                data.searchByName = name;
                            }
                        },

                        'columns': [

                            {data: 'file'},
                            {data: 'artist'},
                            {data: 'title'},
                            {data: 'created_at'},
                            {data: 'name'},
                        ]
                    });

                    $('#searchByName').keyup(function () {
                        dataTable.draw();
                    });

                    $('#searchByGender').change(function () {
                        dataTable.draw();
                    });
                });
            </script>

