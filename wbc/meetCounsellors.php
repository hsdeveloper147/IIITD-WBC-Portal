<?php
    include('database_config.php');
    //session_start();

    if(isset($_SESSION["email"])){
        $user_email = $_SESSION["email"];
        unset($_SESSION["email"]);
    }else{
        header("Location: index.php");
    }

    $query = "SELECT * FROM `students` WHERE semail='$user_email'";
    $result = mysql_query($query, $db_connectionn);
    $result = mysql_fetch_assoc($result);

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Schedule Appointment | IIITD Well-Being Center</title>
    <meta name="description" content="Internship Portal - IIIT Delhi">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.simple-dtpicker.js"></script>
    <link type="text/css" href="assets/css/jquery.simple-dtpicker.css" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style>
      .avatar {
          vertical-align: middle;
          width: 100px;
          height: 100px;
          border-radius: 50%;
      }
    </style>

</head>
<body class="bg-dark" style="background: url('hands.jpg') no-repeat center center fixed; background-size: 100% 100%; height: 100%;">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content" style="max-width: 70%">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                        <div class="card bg-flat-color-1 text-light">
                            <div class="card-body">
                                <div class="h3 m-0">IIITD Well-Being Center</div>
                                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <small class="text-light">We welcome all with no bias or hierarchy. Feel confident to discuss &amp; get help.</small>
                            </div>
                        </div>
                        


                        <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Book a Session!<br/><br/>CONFIDENTIALITY IS HIGHLY ENSURED!!!<br/></h3>
                                  </div>
                                  <hr>

                                  <style>
.card2 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 200px;
  margin: auto;
  text-align: center;
  font-family: arial;
  padding: 5px;
}

.title {
  color: grey;
  font-size: 10px;
}

</style>

                                  <form action="meetCounsellor_post.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                      <div class="form-group text-center">
                                          <label for="CID" class="control-label mb-1">Select the available Counselling Psychologist of your choice?</label>
                                          <ul class="list-inline">
                                              <li class="list-inline-item">
                                                  <div class="card2">
                                                    <img src="images/khuspinder.jpg" alt="Khushpinder" style="width:100%">
                                                    <div class="h6 m-0">Khushpinder P. Sharma</div>
                                                    <div class="title">(Monday to Friday)</div>
                                                    <p><input type="radio" class="radio" name="CID" value="khushpinder@iiitd.ac.in" required></p>
                                                  </div>
                                               </li>
                                              <li class="list-inline-item"></li>
                                              <li class="list-inline-item">
                                                  <div class="card2">
                                                    <img src="images/drakshay.jpg" alt="Khushpinder" style="width:100%">
                                                    <div class="h6 m-0">Akshay Kumar</div>
                                                    <div class="title">(Monday, Wednesday, Friday from 1.00PM-4.00PM)</div>
                                                    <p><input type="radio" class="radio" name="CID" value="akshay@iiitd.ac.in"></p>
                                                  </div>
                                               </li>
                                              <li class="list-inline-item"></li>
                                              <li class="list-inline-item">
                                                  <div class="card2">
                                                    <img src="images/dramita.jpg" alt="Khushpinder" style="width:100%">
                                                    <div class="h6 m-0">Amita Puri</div>
                                                    <div class="title">(Wednesday and Saturday)</div>
                                                    <p><input type="radio" class="radio" name="CID" value="amitapuri@iiitd.ac.in"></p>
                                                  </div>
                                               </li>
                                          </ul>
                                      </div>

                                      <div class="form-group">
                                          <label for="ssid" class="control-label mb-1">Client ID</label>
                                          <input id="ssid" name="ssid" type="text" class="form-control" readonly="" value="WBC-S<?php echo $result['SID'] ?>" />
                                      </div>

                                      <div class="row">
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="semail" class="control-label mb-1">Email</label>
                                                  <input id="semail" name="semail" type="text" class="form-control" readonly="" value="<?php echo $user_email; ?>" />
                                              </div>
                                          </div>
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="sname" class="control-label mb-1">Name</label>
                                                  <input id="sname" name="sname" type="text" class="form-control" readonly="" value="<?php echo $result['sname'] ?>">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="sage" class="control-label mb-1">Age</label>
                                                  <input id="sage" name="sage" type="text" class="form-control" readonly="" value="<?php echo $result['sage'] ?>">
                                              </div>
                                          </div>
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="sgender" class="control-label mb-1">Gender</label>
                                                  <input id="sgender" name="sgender" type="text" class="form-control" readonly="" value="<?php echo $result['sgender'] ?>">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="sprogram" class="control-label mb-1">Program</label>
                                                  <input id="sprogram" name="sprogram" type="text" class="form-control" readonly="" value="<?php echo $result['sprogram'] ?>">
                                              </div>
                                          </div>
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="ssemester" class="control-label mb-1">Semester</label>
                                                <input id="ssemester" name="ssemester" type="text" class="form-control" readonly="" value="<?php echo $result['ssemester'] ?>">
                                              </div>
                                          </div>
                                      </div>


                                      <div class="form-group">
                                          <label for="stype" class="control-label mb-1">Day Scholar/Hostler</label>
                                          <input id="stype" name="stype" type="text" class="form-control" readonly="" value="<?php echo $result['stype'] ?>">
                                      </div>

                                      <div class="form-group">
                                          <label for="sperm_add" class="control-label mb-1">Permanent Address</label>
                                          <textarea id="sperm_add" name="sperm_add" type="text" class="form-control cc-name valid" placeholder="Optional Field"></textarea>
                                      </div>

                                      <div class="row">
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="scontact" class="control-label mb-1">Personal No.</label>
                                                  <input id="scontact" name="scontact" type="text" class="form-control cc-name valid"  placeholder="Optional Field">
                                              </div>
                                          </div>
                                          <div class="col-6">
                                              <div class="form-group">
                                                  <label for="semergency_contact" class="control-label mb-1">Emergency/Family No.</label>
                                                  <input id="semergency_contact" name="semergency_contact" type="text" class="form-control cc-name valid"  placeholder="Optional Field">
                                              </div>
                                          </div>
                                      </div>

                                      <hr/>

                                      <div class="form-group">
                                          <label for="concern" class="control-label mb-1">Major Concerns to be Discussed (100-150 Characters)</label>
                                          <textarea id="concern" name="concern" type="text" class="form-control cc-name valid" rows="8" required="" maxlength="150"></textarea>
                                      </div>


                                      <div class="form-group">
                                          <label for="preference" class="control-label mb-1">Meeting Preference</label>
                                          <input type="text" id="date_jit" name="preference" class="form-control cc-name valid" required="" />
                                      </div>

                                      <script type="text/javascript">
                                        $(function(){
                                          $('*[name=preference]').appendDtpicker({
                                                "allowWdays": [1, 2, 3, 4, 5]
                                              });
                                        });
                                      </script>
                                      

                                      <div class="form-group">
                                        <input type="text" name="SID" value="<?php echo $result['SID'] ?>" style="visibility: hidden; display: none;">
                                      </div>

                                      <div>
                                        <p style="text-align:justify"><i><b>*</b>In very rare circumstances we reserve the right to break confidentiality following the guidelines given in code of ethics. These are only where there appears to be a serious and imminent risk to your own or to other's safety, or if we are made aware of serious illegal activities.</i></p>
                                      </div>

                                      <div>
                                          <button id="Schedule" name="Schedule" type="submit" class="btn btn-lg btn-info btn-block">
                                              <span id="payment-button-amount">Schedule Session</span>&nbsp;
                                              <i class="fa fa-thumbs-up fa-2x"></i>
                                          </button>
                                      </div>
                                  </form>
                              </div>

                </div>


            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
