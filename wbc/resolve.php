<?php 
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
    <title>Home | IIITD Well-Being Center</title>
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
                    <li>
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

    <?php
        $query = "SELECT * FROM `application` NATURAL JOIN `students` WHERE astatus!=2 AND CID='$user_email' AND AID=$_REQUEST[aid]";
        $result = mysql_query($query, $db_connectionn);
        $result = mysql_fetch_assoc($result);
    ?>

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Welcome <?php echo $user_email ?>!</h1>
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
            <div class="animated">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Session WBC-<?php echo "A".$_REQUEST["aid"] ?> Resolution</strong>
                        </div>
                        <div class="card-body">
                            <div class="card-body card-block">
                        <form action="save_resolution.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Session ID</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="aid" name="aid" class="form-control" value="<?php echo 'WBC-A'.$result['AID'] ?>" readonly="True">
                                <!-- <small class="form-text text-muted">This is a help text</small> --></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Student ID</label></div>
                            <div class="col-12 col-md-9">
                              <p class="form-control-static"><input type="text" id="sid" name="sid" value="<?php echo 'WBC-S'.$result['SID'] ?>" class="form-control" readonly="" /></p>
                            </div>
                          </div>
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Concern</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="concern" readonly="" class="form-control"><?php echo $result['concern'] ?></textarea>
                            </div>
                          </div>

                          <hr/>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Problematic Area</label></div>
                            <div class="col-12 col-md-9">
                                <select name="aprob_area" class="form-control" required="">
                                    <option value="Academic">Academic</option>
                                    <option value="Academic">Family</option>
                                    <option value="Psychological/Psychiatric">Psychological/Psychiatric</option>
                                    <option value="Social/Relationships">Social/Relationships</option>
                                    <option value="Personal">Personal</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Remarks</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="aprob_area_remark" class="form-control" required=""></textarea>
                            </div>
                          </div>
                          <hr/>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mental State Examination</label></div>
                            <div class="col-12 col-md-9">
                                <label for="text-input" class=" form-control-label">(Appearance, attitude, behaviour, speech, mood, thoughtprocess, perception, etc)</label>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Remarks</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="amedical_state_remark" class="form-control" required=""></textarea>
                            </div>
                          </div>
                          <hr/>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">History of Problematic Area</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="ahistory" class="form-control" required=""></textarea>
                            </div>
                          </div>
                          <hr/>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Interventions</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="ainterventions" class="form-control" required=""></textarea>
                            </div>
                          </div>
                          <hr/> 
                      </div>
                      <div class="card-footer" style="margin:auto; width:100%; text-align:center;">
                        <button type="submit" class="btn btn-primary btn-bg" name="saveResolution">
                          <i class="fa fa-dot-circle-o ti-save"></i> &nbsp; Save Resolution
                        </button>
                        </form> 
                      </div>
                    </div><!-- .Card -->
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
                echo "<script>alert('A maximum of 3 applications are allowed.')</script>";
            }else if ($ret == 3){
                echo "<script>alert('There was some problem while processing your application. Please try after some time.')</script>";
            }else if ($ret == 4){
                echo "<script>alert('Your application has been successfully submitted.')</script>";
            }else if ($ret == 5){
                echo "<script>alert('Your application is already pending for this project.')</script>";
            }else if ($ret == 8){
                echo "<script>alert('There was some problem while processing your application. Please try after some time.')</script>";
            }else if ($ret == 9){
                echo "<script>alert('Your application has been successfully withdrawn.')</script>";
            }
        }
    ?>
</body>
</html>
