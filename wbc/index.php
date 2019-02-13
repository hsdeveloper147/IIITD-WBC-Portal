<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IIITD Well-Being Center</title>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <meta name="google-signin-client_id" content="913117971459-4vblrntigi15v0nf8gpq7ljqpduf62hn.apps.googleusercontent.com">
    <meta name="google-signin-scope" content="profile email">
    <script src="https://apis.google.com/js/api:client.js"></script>

    <script>
      var googleUser = {};
      var startApp = function() {
        gapi.load('auth2', function(){
          // Retrieve the singleton for the GoogleAuth library and set up the client.
          auth2 = gapi.auth2.init({
            client_id: '913117971459-4vblrntigi15v0nf8gpq7ljqpduf62hn.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            hosted_domain : 'iiitd.ac.in'
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
          });
          attachSignin(document.getElementById('custom_signin_button'));
        });
      };

      function attachSignin(element) {
        console.log(element.id);
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                id_token = googleUser.getAuthResponse().id_token;
                email = googleUser.getBasicProfile().getEmail();
                var domain = email.replace(/.*@/, "");
                if(domain === "iiitd.ac.in"){
                  window.location = "google_auth.php?token=" + id_token;
                }else{
                  var auth2 = gapi.auth2.getAuthInstance();
                  auth2.signOut();
                  alert("Please login with IIIT Delhi email address.");
                }
            }, function(error) {
                alert("There was some problem while logging in. Please check back after sometime.");
            });
    }
    </script>

</head>
<body class="bg-dark" style="background: url('hands.jpg') no-repeat center center fixed; background-size: 100% 100%; height: 100%;">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form>
                        <div class="card bg-flat-color-1 text-light">
                            <div class="card-body">
                                <div class="h3 m-0">IIITD Well-Being Center</div>
                                <div class="h5 m-0">Appointment Portal</div>
                                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <small class="text-light">We welcome all with no bias or hierarchy. Feel confident to discuss &amp; get help.</small>
                            </div>
                        </div>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn google-plus" id="custom_signin_button" style="background-color:#d34836; color:#fff;"><i class="fa fa-google-plus"></i>Sign in with IIITD Account</button>
                            </div>
                        </div>
                        
                        <div class="register-link m-t-15 text-center">
                            <span class="badge Info">CONFIDENTIALITY IS HIGHLY ENSURED</span><br/>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script>startApp();</script>

    <?php
        if (isset($_REQUEST['ret'])){
            $ret = $_REQUEST['ret'];

            if ($ret == 1){
                echo "<script>alert('There was some problem while scheduling your appointment. Please try again after some time.')</script>";
            }else if ($ret == 2 && isset($_REQUEST['aid'])){
                echo "<script>alert('Thanks for reaching us. Your appointment has been scheduled. Your application ID is WBC-A" . $_REQUEST['aid'] . ".')</script>";
            }else if ($ret == 3){
                echo "<script>alert('Your profile was not found in our system. Please contact web-admin@iiitd.ac.in for more information.')</script>";
            }
        }
    ?>


</body>
</html>
