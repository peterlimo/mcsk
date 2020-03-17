	
<!-- Row / End -->
<div id="footer">

    <!-- Footer -->

    <div class="footer-bottom-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    © 2019 <strong>MCSK</strong>. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Footer / End -->

</div>
</div>
<!-- Dashboard Content / End -->

</div>
</div>
    <div id='loadingmessage' style='display:none'></div>
     <div id="classModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                               <span aria-hidden="true">&times;</span>
                            </button>
                          

                            <div class="col-md-6">

                                    <nav id="breadcrumbs" class="dark">
                            <ul>
                                <li><a class="btn btn-primary" id="pdf1" href="#"><span class="icon-line-awesome-file-pdf-o">

                                    </span>Export Pdf</a></li>

                                    <li><a  id="csv1" class="btn btn-danger" href="#"><span class="icon-line-awesome-file-excel-o">

                                    </span> Export Excel</a></li>

                            </ul>
                        </nav>

                            </div>
                        </div>
                        <div id="results" class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

<div id="loadingmessage"></div>


<!-- Scripts
================================================== -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.1.0.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/snackbar.js"></script>
<script src="js/clipboard.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/jspdf.min.js"></script>
<script src="js/jspdf.plugin.autotable.min.js"></script>
<script src="js/tableHtmlExport.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>

<script>
    $('#json1').on('click', function () {
        $("#example").tableHTMLExport({type: 'json', filename: 'sample.json'});
    })
    $('#csv1').on('click', function () {
        $("#example").tableHTMLExport({type: 'csv', filename: 'sample.csv'});
    })
    $('#pdf1').on('click', function () {
        $("#example").tableHTMLExport({type: 'pdf', filename: 'sample.pdf'});
    })
      $('#json').on('click', function () {
        $("#empTable").tableHTMLExport({type: 'json', filename: 'sample.json'});
    })
    $('#csv').on('click', function () {
        $("#empTable").tableHTMLExport({type: 'csv', filename: 'sample.csv'});
    })
    $('#pdf').on('click', function () {
        $("#empTable").tableHTMLExport({type: 'pdf', filename: 'sample.pdf'});
    })


    $('#json').on('click', function () {
        $("#example").tableHTMLExport({type: 'json', filename: 'sample.json'});
    })
    $('#csv').on('click', function () {
        $("#example").tableHTMLExport({type: 'csv', filename: 'sample.csv'});
    })
    $('#pdf').on('click', function () {
        $("#example").tableHTMLExport({type: 'pdf', filename: 'sample.pdf'});
    })
</script>
<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->


<script src="js/chart.min.js"></script>
<script>
    Chart.defaults.global.defaultFontFamily = "Nunito";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June"],
            // Information about the dataset
            datasets: [{
                    label: "Views",
                    backgroundColor: 'rgba(42,65,232,0.08)',
                    borderColor: '#2a41e8',
                    borderWidth: "3",
                    data: [196, 132, 215, 362, 210, 252],
                    pointRadius: 5,
                    pointHoverRadius: 5,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointBorderWidth: "2",
                }]
        },

        // Configuration options
        options: {

            layout: {
                padding: 10,
            },

            legend: {display: false},
            title: {display: false},

            scales: {
                yAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            borderDash: [6, 10],
                            color: "#d8d8d8",
                            lineWidth: 1,
                        },
                    }],
                xAxes: [{
                        scaleLabel: {display: false},
                        gridLines: {display: false},
                    }],
            },

            tooltips: {
                backgroundColor: '#333',
                titleFontSize: 13,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false
            }
        },

    });

</script>

<script>
// Snackbar for user status switcher
    $('#snackbar-user-status label').click(function () {
        Snackbar.show({
            text: 'Your status has been changed!',
            pos: 'bottom-center',
            showAction: false,
            actionText: "Dismiss",
            duration: 3000,
            textColor: '#fff',
            backgroundColor: '#383838'
        });
    });
        function getData(id) {
              
                 document.getElementById("loadingmessage").style.display = "block";
 
              
                // var host = "http://" + window.location.hostname;
                $.ajax({
                    url: "getData.php?id=" + id,
                    type: "GET",
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function ()
                    {
                        //$("#preview").fadeOut();
                        $("#err").fadeOut();
                    },
                    success: function (data)
                    {
                        document.getElementById("loadingmessage").style.display = "none";
                        var data = JSON.parse(data);
                        var col = [];
                        for (var i = 0; i < data.length; i++) {
                            for (var key in data[i]) {
                                if (col.indexOf(key) === -1) {
                                    col.push(key);
                                }
                            }
                        }

                        // CREATE DYNAMIC TABLE.
                        var table = document.createElement("table");
                        table.id = "classTable";

                        table.classList.add("basic-table");
                        table.classList.add("table-bordered");
// CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.

                        var tr = table.insertRow(-1);                   // TABLE ROW.

                        for (var i = 0; i < col.length; i++) {
                            var th = document.createElement("th"); // TABLE HEADER.
                            th.innerHTML = col[i];
                            tr.appendChild(th);
                        }

                        // ADD JSON DATA TO THE TABLE AS ROWS.
                        for (var i = 0; i < data.length; i++) {

                            tr = table.insertRow(-1);
                            for (var j = 0; j < col.length; j++) {
                                var tabCell = tr.insertCell(-1);
                                tabCell.innerHTML = data[i][col[j]];
                            }
                        }

                        // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
                        var divContainer = document.getElementById("results");
//                        divContainer.classList.add("table-responsive-xl");

                        divContainer.innerHTML = "";


                        divContainer.appendChild(table);




                    },
                    error: function (e)
                    {
                        $("#err").html(e).fadeIn();
                    }
                });



            }
     

</script>
<script>
    $(document).ready(function () {
        $('#example').DataTable( {
   "order": [[ 0, "desc" ]]
} );
    });
</script>
</body>
</html>