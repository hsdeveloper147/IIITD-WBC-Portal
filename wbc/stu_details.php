<!DOCTYPE html>

<html>
<head>
	<title>Welcome</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="print,screen,projection"/>
		<!--Let browser know website is optimized for mobile-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 


		<link rel="shortcut icon" href="favicon.ico">

		<link rel="stylesheet" href="assets/css/normalize.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/themify-icons.css">
		<link rel="stylesheet" href="assets/css/flag-icon.min.css">
		<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <style type="text/css" media="print">
        @import "assets/css/materialize.css";
        </style>


	<style>
		.header_row {
			background-color : white;
			opacity: 0.9;
			padding-bottom: 1vh;
			margin-bottom: 4vh;
 		}
		.form_row {
			padding: 1vh;
			background-color : white;
			opacity: 0.95;
		}
		.dropdown-content li > span {
           font-size: 10px;
        }
        .title{
            color: black;
            font-size: 16px;
            text-align:center;
            margin: 0px;
            padding: 0px;

        }
        .title1{
            color: black;
            font-size: 20px;

        }

        .center_img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 0 px;
        margin-top: 0 px;

        width: 100px;
        }
        hr.style-eight {
    overflow: visible; /* For IE */
    padding: 0;
    border: none;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr.style-eight:after {
    content: "**********";
    display: inline-block;
    position: relative;
    top: -0.7em;
    font-size: 1.5em;
    padding: 0 0.25em;
    background: white;
}
.box{
    padding:10px
}

#printOnly {
   display : none;
}

@media print {
    #printOnly {
       display : block;
    }
}

@media print{
  @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }

  @import "assets/css/materialize.css"
}
	</style>

</head>

<?php
    session_start();


    

    
    if(isset($_POST["id"])){
        $id=$_POST["id"];

        $from=$_POST["from"];

        if($from=="admin_welcome"){
        $client=$_SESSION["clients_new"][$id];
        }
        else{
            $client=$_SESSION["meetings_new"][$id];

        }

        $_SESSION["current_stu"]=$client;


    }
     else if(isset($_SESSION["current_stu"])){
         $client=$_SESSION["current_stu"];
     }
     else{
                  header("Location: index.php");

     }

    
?> 

	
	<header style="max-width:100%!important;height: 80px"  class="header col s12 header_row black">
      <div class="row">
	  

     
            <div>
              <a href=""title="Home"><img src="images/logo2.png" height="100px" width="100px" style="margin-left:100px" alt="Home"></a>
              <!-- <img src="images/logo.png" alt="Home"  height="100px" width="100px" class="center_img"> -->
            
                            <div class="card" style="float: right;margin-right: 24px;margin-top: 0px; padding: 4px;height: 80px">
                                <div class="h3 m-0">Well-Being Center</div>
                                <div class="h5 m-0">Appointment Portal</div>
                                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <small class="text-light">We welcome all with no bias or hierarchy. Feel confident to discuss &amp; get help.</small>
                            </div>
            </div>

   </div>

	 </header>
         <button class="notprint" style="float:right; margin-right:10px" onclick="myFunction()"><img src="images/print.ico" height="20px" width="20px"></button>


      <main style="margin-left: 20px; ">
            <div class="row" style="margin-left: 24px;margin-right: 24px;;">
                <div class="col s4 m4 l4" style="height: 100%;border-right: 4px groove black">
                    <div class="title1"><b>Meeting Details</b></div>

            

                    <span><b>Client ID</b> - <?php echo $client[0]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
                    <br>

                    <span><b>Counsellor</b> - <?php echo $client[17]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp

                    <br>
                    <span><b>Date</b> - <?php echo $client[18]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

                    <span><b>Time</b> - <?php echo $client[19]."      "  ?></span>&nbsp &nbsp &nbsp &nbsp &nbsp
                    <br>
                    <hr>
                    <div class="title1"><b>Student Details</b></div>

                    <p style="width: 100%;margin: 0px"><b>Roll Number : </b><?php echo $client[1] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Name : </b><?php echo $client[2] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Age : </b><?php echo $client[3] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Gender : </b><?php echo $client[4] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Program : </b><?php echo $client[5] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Branch : </b><?php echo $client[6] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Semester : </b><?php echo $client[7] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Email: </b><?php echo $client[8] ?></p>
                    <p style="width: 100%;margin: 0px"><b>Contact : </b><?php echo $client[10] ?></p>

            <div class="notprint">
                <p style="width: 100%;margin: 0px"><b>Alternate Email : </b>
                <br><input type="text" style="width: 70%" id="ae" name="" value="<?php echo  $_SESSION["current_stu"][9]  ?>" disabled>
                <a class="hoverable tooltipped edit" data-position="left" data-tooltip="Edit" id="eo1"><img src="images/edit_icon.PNG" width="15px" height="15px"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a class="hoverable tooltipped save" data-position="right" data-tooltip="Save" id="so1"><img src="images/save-icon.PNG" width="15px" height="15px"></a>

                </p>

                <p style="width: 100%;margin: 0px"><b>Alternate Contact : </b>
                <br><input type="text" style="width: 70%" id="ac" name="" value="<?php echo  $_SESSION["current_stu"][11]  ?>" disabled>
                <a class="hoverable tooltipped edit" data-position="left" data-tooltip="Edit" id="eo2"><img src="images/edit_icon.PNG" width="15px" height="15px"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a class="hoverable tooltipped save" data-position="right" data-tooltip="Save" id="so2"><img src="images/save-icon.PNG" width="15px" height="15px"></a>

                </p>

                <p style="width: 100%;margin: 0px"><b>Hosteller/Day-Scholar : </b>
                <br><input type="text" style="width: 70%" id="ah" name="" value="<?php echo  $_SESSION["current_stu"][12]  ?>" disabled>
                <a class="hoverable tooltipped edit" data-position="left" data-tooltip="Edit" id="eo3"><img src="images/edit_icon.PNG" width="15px" height="15px"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a class="hoverable tooltipped save" data-position="right" data-tooltip="Save" id="so3"><img src="images/save-icon.PNG" width="15px" height="15px"></a>

                </p>
            </div>

            <div id="printOnly">
                <p style="width: 100%;margin: 0px"><b>Alternate Email : </b><?php echo $_SESSION["current_stu"][9] ?></p>
                <p style="width: 100%;margin: 0px"><b>Alternate Contact: </b><?php echo $_SESSION["current_stu"][11] ?></p>
                <p style="width: 100%;margin: 0px"><b>Hosteller/ Day-Scholar : </b><?php echo $_SESSION["current_stu"][12] ?></p>
                
            </div>
    
                </div>
                <div class="col s8 m8 l8" style="height: 100%">
                
                <div style="border:2px solid black;border-radius: 1%;padding: 8px; height: 150px;">
                    <p style="font-size: 13px;"><b>Had student ever been to a Psychiatrist/Psychologist : </b>
                        <?php 
                        if($client[13]!="none" or $client[14]!="none" or $client[15]!="none"){
                            echo "Yes";
                            echo "<br><b>When : </b>" .$client[13];
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</t><b>Number of Sessions : </b>" .$client[15];
                            echo "<br><b>Why : </b>" .$client[14];
                        }
                        else{
                            echo "No";

                        } 

                        ?>
                    
                    </p>
                </div>
                <div style="height: 120px;padding: 16px">
                    <span class="title"><b style="font-size: 14px;">Personal Concerns To Be Discussed : </b></span>
                    <br>
                    
                    <i style="padding: 16px;font-size: 13px;">
                    <?php echo $client[16] ?></i>

                    
                </div> 
                <br>
                <div style="height: 120px;padding: 16px;">
                    <span class="title" style="font-size: 14px;"><b>Academic Concerns To Be Discussed : </b></span>
                    <br>
                    
                    <i style="padding: 16px;font-size: 13px;">
                    <?php echo $client[21]  ?></i>

                </div> 
                <br><br>

                
                

 
                </div>

            </div>
                <hr class="style-eight">

                 <div class="row" style="margin: 0px;">
                    <div  class="col s6 l6 m6"  style="border-right: 2px solid black">
                        <div class="title">Main Problems</div>

                        <textarea  class="box" style="visibility: hidden;" id="text-box-1" rows="100" cols="50">
                        </textarea>
                        
                    </div>
                    <div  class="col s6 l6 m6">
                           <div class="title">Triggers</div>
                    <textarea class="box" style="visibility: hidden;" id="text-box-2" rows="100" cols="50">
                    </textarea>
                    <br>
                     <br>
                    <br>


                        
                    </div>
                      
                </div>
                 <div class="col l6 m6">
                    <hr>

                        <div class="title">Current Coping Strategies</div>

                        <textarea class="box" style="visibility: hidden;" id="text-box-3" rows="100" cols="50">
                        </textarea>
                        <br>
                        <br>
   

                       
                </div>
                
               <hr> 
               <div class="title">Session Notes</div>

                        <textarea class="box" style="visibility: hidden;" id="text-box-4" rows="100" cols="50">
                        </textarea>
      </main>


    
  
    <script>
function myFunction() {
  window.print();
}
</script>

<script type="text/javascript" src="assets/js/materialize.js"></script>

<script>


document.getElementById('text-box-1').style.height="50px";

document.getElementById('text-box-2').style.height="5px";

document.getElementById('text-box-3').style.height="50px";

document.getElementById('text-box-4').style.height="100px";


  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });


</script>

    <script type="text/javascript">
         $('a.save').click(function() {
            var c =  $(this).attr('id');
            var stu_id = "<?php echo $client[0]?>";
            var alt_email = $("#ae").val();
            var alt_contact = $("#ac").val();
            var resi = $("#ah").val();
            var change;
            // alert(c);
            if(c == "so1"){
                change = 1;
            }
            else if(c == "so2"){
                change = 2;
            }
            else{
                change = 3;
            }
            // alert(alt_email + alt_contact + resi + change);

             $.ajax({
              type: "POST",
              url: "save_alt_details.php",
              data: { id: stu_id, alt_email : alt_email, alt_contact : alt_contact, resi : resi, change : change}
            }).done(function( msg ) {


                alert(msg);


            });    

            
    });
    </script>

 <script type="text/javascript">
         $('a.edit').click(function() {

            var c =  $(this).attr('id');
            var x;
            if(c == "eo1"){
            x = document.getElementById("ae");
            }
            else if(c == "eo2"){
            x = document.getElementById("ac");
            }
            else{
            x = document.getElementById("ah");
            }
           

          if (x.disabled == true) {
            x.disabled = false;
          } else {
            x.disabled = true;
          }

            
    });
    </script>



</body>
</html>