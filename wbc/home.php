i<?php 
    include('database_config.php');
    if(isset($_SESSION["email"]) && isset($_SESSION["type"])){
        $user_email = $_SESSION["email"];
        $query = "SELECT * FROM `counsellors` WHERE CID='$user_email'";
        $result = mysql_query($query, $db_connectionn);
        $result = mysql_fetch_assoc($result);
    }else{
        unset($_SESSION["email"]);
        unset($_SESSION["type"]);
        session_destroy();
        header("Location: index.php");
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | IIITD Well-Being Cel</title>
    <meta name="description" content="Summer Internship at IIIT Delhi are now open. We are looking for some students/researchers to work with, who can help us with the projects and problems we are currently working on. If you think you are passionate about the kind of work we do and keen on contributing, please have a look at the requirements/positions in the table below.">
    <meta name="keywords" content="Summer Internships,BTech Internships,MTech Internships,Research Internships,Research Projects">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home.php"> <i class="menu-icon fa fa-dashboard ti-home"></i>Home </a>
                    </li>
                    <li>
                        <a href="all_appointments.php"> <i class="menu-icon ti-pulse"></i>All Sessions </a>
                    </li>
                    <!--
                    <li>
                        <a href="user_profile.php"> <i class="menu-icon ti-user"></i>User Profile </a>
                    </li>
                    -->
                    <li>
                        <a href="logout.php"> <i class="menu-icon ti-share-alt"></i>Logout </a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Welcome <?php echo $result["cname"] ?>!</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="logout.php">Logout</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Important</span> There are some pending applications for your review.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>

            <div class="col-sm-12">
                
            </div>

            <?php

                $query = "SELECT COUNT(*) FROM `application` WHERE astatus!=2 AND CID='$user_email'";
                $result = mysql_query($query, $db_connectionn);
                $row = mysql_fetch_row($result);

                $no_active_appointments = $row[0];
            ?>

           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count"><?php echo $no_active_appointments; ?></span>
                        </h4>
                        <p class="text-light">No. of Active Sessions</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70"/>
                            <!-- <canvas id="widgetChart1"></canvas>-->
                        </div>
                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <a href="https://www.facebook.com/IIITDelhi" target="_blank"><i class="fa fa-facebook"></i></a>
                    <ul>
                        <li>
                            <sctrong>IIIT Delhi </strong>
                        </li>
                        <li>
                            <span>Facebook Page</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


    	<div class="content mt-3">
            <div class="animated">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Scheduled Sessions</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      	<th>Session ID</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Concern</th>
                        <th>Contact Details</th>
                        <th>Student Profile</th>
                        <th>Scheduling Details</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php
                            $sids = array();
					        $query = "SELECT * FROM `application` NATURAL JOIN `students` WHERE astatus!=2 AND CID='$user_email'";
					        $result = mysql_query($query, $db_connectionn);
					        while ($row = mysql_fetch_assoc($result)){
                                array_push($sids, $row['SID']);
					        	echo "<tr>";
                                echo "<td>WBC-A$row[AID]</td>";
                                echo "<td>WBC-S$row[SID]</td>";
                                echo "<td>$row[sname]</td>";
                                echo "<td>" . stripcslashes($row["concern"]) . "</td>";
                                echo "<td>$row[scontact]<br/>$row[semail]</td>";
                                echo "<td><div class='icon-container' style='width:auto;' ><a data-toggle='modal' data-target='#WBCS$row[SID]' href=''><span class='ti-google'></span><span class='icon-name'> Profile</span></a></div></td>";
                                echo "<td>$row[preference]</td>";
                                echo "<td><div class='icon-container' style='width:auto;'><a href='resolve.php?aid=$row[AID]&sid=$row[SID]'><span class='ti-check'></span><span class='icon-name'> Resolve</span></a></div></td>";
                                // &nbsp;<br/> &nbsp;<div class='icon-container' style='width:auto;'><a href='reschedule.php?aid=$row[AID]&sid=$row[SID]'><span class='ti-close'></span><span class='icon-name'> Reschedule</span></a></div> 
                                echo "</tr>";

					    	}

					    ?>
                    <!--
                      <tr>
                      	<td>1001</td>
                        <td>Doppler radar for tracking humans</td>
                        <td>hardware, software, signal processing</td>
                        <td>Shobha Sundar Ram</td>
                        <td>2 - 3 months</td>
                        <td>Open</td>
                        <td>
                        	<div class="icon-container">
                        		<span class="ti-check"></span><span class="icon-name"> Apply</span>
                        	</div>
                        </td>
                      </tr>
                  -->
                    </tbody>
                  </table>

                  <?php

                        $content = "";
                        foreach ($sids as $sid){
                            if (strlen($content) != 0)
                                $content .= " OR ";
                            $content .= "`SID` = '$sid' ";
                        }

                        $query = "SELECT * FROM students WHERE $content";
                        $result = mysql_query($query, $db_connectionn);

                        while ($row = mysql_fetch_assoc($result)){
                            $output=<<<EOT
                <div class="modal fade" id="WBCS$row[SID]" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabelWBCS$row[SID]" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollmodalLabelWBCS$row[SID]">$row[sname]'s Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <b>Name:</b> $row[sname]<br/>
                                    <b>Email ID:</b> $row[semail]<br/>
                                    <b>Age:</b> $row[sage]<br/>
                                    <b>Gender:</b> $row[sgender]<br/>
                                    <b>Program:</b> $row[sprogram]<br/>
                                    <b>Student Type:</b> $row[stype]<br/>
                                    <b>Hostel Details:</b> $row[sroom_no]<br/>
                                    <b>Permanent Address:</b> $row[sperm_add]<br/>
                                    <b>Contact Number:</b> $row[scontact]<br/>
                                    <b>Emergency Contact Details:</b> $row[semergency_contact]<br/> 
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
EOT;
                            echo $output;
                        }
                  ?>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
            	

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <!-- <script src="assets/js/lib/chart-js/Chart.bundle.js"></script> -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    <?php
        if (isset($_REQUEST['ret'])){
            $ret = $_REQUEST['ret'];

            if ($ret == 1 && $ret == 6){
                echo "<script>alert('Your action could not be completed.')</script>";
            }else if ($ret == 2){
                echo "<script>alert('Session Resolution has been successfully saved.')</script>";
            }else if ($ret == 3){
                echo "<script>alert('There was some problem while saving Session Resolution. Please try again later.')</script>";
            }
        }
    ?>
</body>
</html>
