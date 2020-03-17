<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
print_r($_POST);exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>jQuery Add / Remove Table Rows Dynamically</title>

    </head>
    <body>
        <a href="#" id="insert-more"> Add New Row </a>
        <form action="" method="post">
            <br>
            <table id="mytable">
                <thead>
                <th>File</th>
                <th>Album</th>
                <th>Member No.</th>
                <th>Song Title</th>
                <th>Artist name</th>
                <th>Stage name</th>
                <th>Edit4</th>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <div class="col-md-2">

                                <div class="input-with-icon-left">
                                    <input class="with-border" type="file" name="file" accept="audio/*,video/*,image/*"  id="upload"  required="required" />
                                    <i class="icon-material-outline-attach-file"></i>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-2">

                                <div class="input-with-icon-left">
                                    <input class="with-border" type="text" name="album"  placeholder="Album"  id="album"  required="required" />
                                    <i class="icon-material-outline-person-pin"></i>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="col-md-2">

                                <div class="input-with-icon-left">
                                    <input class="with-border" type="text" name="memberNo" placeholder="Membership No." id="member_no" multiple required="required" />
                                    <i class="icon-material-outline-person-pin"></i>
                                </div>
                            </div>
                        </td>
                        <td><div class="col-md-2">

                                <div class="input-with-icon-left">
                                    <input class="with-border" type="text"  name="title" placeholder="Titlee" id="artist_name" multiple required="required" />
                                    <i class="icon-material-outline-person-pin"></i>
                                </div>
                            </div></td>
                        <td><div class="col-md-2">

                                <div class="input-with-icon-left">
                                    <input class="with-border" type="text"  name="artistName" placeholder="Artist Name" id="stage_name" multiple required="required" />
                                    <i class="icon-material-outline-person-pin"></i>
                                </div>
                            </div></td>
                        <td><div class="col-md-2">

                                <div class="input-with-icon-left">
                                    <input class="with-border" type="text"  name="stageName" placeholder="Stage Name" id="stage_name" multiple required="required" />
                                    <i class="icon-material-outline-person-pin"></i>
                                </div>
                            </div></td>
                        <td><a href="#">edit</a>
                        </td>
                    </tr>
            </table>
            <input type="submit" class="submit button margin-top-15" id="btnSubmit" value="Upload" />
        </form>


        <script src="js/jquery-3.4.1.min.js"></script>
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
    </body> 

</html>                            