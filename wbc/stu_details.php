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

	
	<header style="max-width:100%!important;height: 80px;background-color: #b2dfdb"  class="header col s12 header_row">
      <div class="row">
	  
            <div>
              <a href=""title="Home"><img src="images/logo2.png" height="100px" width="100px" style="margin-left:100px" alt="Home"></a>
              <!-- <img src="images/logo.png" alt="Home"  height="100px" width="100px" class="center_img"> -->
              <h4 style="float: right;margin-right: 100px;margin-top: 20px;color: #004d40">Well-being Cell</h4>
            </div>

   </div>

	</header>
         <button class="notprint" style="float:right; margin-right:10px" onclick="myFunction()"><img src="images/print.ico" height="20px" width="20px"></button>


      <main  style="margin-left: 32px;">
        <div class="container">
             <div class="row" style="margin: 0px">
                    
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Roll Number : </b><?php echo $client[1] ?></p>

                </div>
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Name : </b><?php echo $client[2] ?></p>

                </div>
            
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Client ID : </b><?php echo $client[0] ?></p>

                </div>
            
             </div> 
                <div class="row" style="margin: 0px">                    
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Age : </b><?php echo $client[3] ?></p>

                </div>
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Gender : </b><?php echo $client[4] ?></p>

                </div>
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Program : </b><?php echo $client[5]."(".$client[6].")"?></p>

                </div>
            
             </div> 
                <div class="row" style="margin: 0px">

                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Semester : </b><?php echo $client[7] ?></p>

                </div>
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Contact : </b><?php echo $client[10] ?></p>

                </div>                
                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Email: </b><?php echo $client[8] ?></p>

                </div>

            
             </div>  
             <div class="row notprint" style="margin: 0px">
            <div class="col s4">
                <p style="width: 100%;margin: 0px"><b>Alternate Email : </b>
                <br><input type="text" style="width: 70%" id="ae" name="" value="<?php echo  $_SESSION["current_stu"][9]  ?>" disabled>
                <a class="hoverable tooltipped edit" data-position="left" data-tooltip="Edit" id="eo1"><img src="images/edit_icon.PNG" width="15px" height="15px"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a class="hoverable tooltipped save" data-position="right" data-tooltip="Save" id="so1"><img src="images/save-icon.PNG" width="15px" height="15px"></a>

                </p>     
            </div>
            <div class="col s4">
                <p style="width: 100%;margin: 0px"><b>Alternate Contact : </b>
                <br><input type="text" style="width: 70%" id="ac" name="" value="<?php echo  $_SESSION["current_stu"][11]  ?>" disabled>
                <a class="hoverable tooltipped edit" data-position="left" data-tooltip="Edit" id="eo2"><img src="images/edit_icon.PNG" width="15px" height="15px"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a class="hoverable tooltipped save" data-position="right" data-tooltip="Save" id="so2"><img src="images/save-icon.PNG" width="15px" height="15px"></a>

                </p>
                
            </div>
            <div class="col s4">
                <p style="width: 100%;margin: 0px"><b>Hosteller/Day-Scholar : </b>
                <br><input type="text" style="width: 70%" id="ah" name="" value="<?php echo  $_SESSION["current_stu"][12]  ?>" disabled>
                <a class="hoverable tooltipped edit" data-position="left" data-tooltip="Edit" id="eo3"><img src="images/edit_icon.PNG" width="15px" height="15px"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a class="hoverable tooltipped save" data-position="right" data-tooltip="Save" id="so3"><img src="images/save-icon.PNG" width="15px" height="15px"></a>

                </p>
                
            </div>
            
            </div>
                <div class="row" id="printOnly" style="margin: 0px">

                <div class="col s4">
                    <p style="width: 100%;margin: 0px"><b>Alternate Email : </b><span id="ae_id"><?php echo $client[9] ?></span></p>

                </div>
                <div class="col s4">
                    <p style="width: 100%;margin: 0px" id="ac_id"><b>Alternate Contact : </b><span><?php echo $client[11] ?></span></p>

                </div>                
                <div class="col s4">
                    <p style="width: 100%;margin: 0px" id="at_id"><b>Accomodation : </b><span><?php echo $client[12] ?></span></p>

                </div>

            
             </div>  
            <br>
            <hr>
            <div class="row">

                <div class="col s6">
                    <p style="width: 100%;margin: 0px"><b>Psychologist : </b><?php echo $client[17] ?></p>

                </div>
                <div class="col s3">
                    <p style="width: 100%;margin: 0px"><b>Date : </b><?php echo $client[18] ?></p>

                </div>                
                <div class="col s3">
                    <p style="width: 100%;margin: 0px"><b>Time: </b><?php echo $client[19] ?></p>

                </div>

            
             </div>  
           
        <hr>
        <div style="height: auto;">
                    <p style="font-size: 15px;"><h7><b>Had student ever been to a Psychiatrist/Psychologist : </b>
                        <?php 
                        if($client[13]!="" or $client[14]!="" or $client[15]!=""){
                            echo "Yes</h7>";
                            echo "<br><b>When : </b>" .$client[13];
                            echo "<br><b>Why : </b>" .$client[14];
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                            <b>Number of Sessions : </b>" .$client[15];
                        }
                        else{
                            echo "No</h7>";

                        } 

                        ?>
                    
                    </p>
        </div>
        <hr>
        <h7><b>Concerns To Be Discussed : </b></h7>
        <div style="height:auto;padding: 4px">
            <span class="title"><b style="font-size: 15px;">Personal : </b></span>
            <br>
            
            <i style="padding: 4px;font-size: 15px;">
            <?php if($client[16] == "") echo "None"; else echo $client[16]; ?></i>

            
        </div> 
        <div style="height:auto;padding: 4px;">
            <span class="title" style="font-size: 15px;"><b>Academic : </b></span>
            <br>
            
            <i style="padding: 4px;font-size: 15px;">
            <?php if($client[21] == "") echo "None"; else echo $client[21];  ?></i>

        </div> 

      <div class="col l6 m6">
            <hr>

                <div class="title">Current Coping Strategies</div>

                <textarea class="box" style="visibility: hidden;" id="text-box-3"  cols="50">
                </textarea>
                <br>
                <br>


               
        </div>
        
       <hr> 
       <div class="title">Session Notes</div>

            <textarea class="box" style="visibility: hidden;" id="text-box-4"  cols="50">
            </textarea>

    </div>

      </main>
      

    
  
    <script>
function myFunction() {
  window.print();
}
</script>

<script type="text/javascript" src="assets/js/materialize.js"></script>

<script>


// document.getElementById('text-box-1').style.height="auto";

// document.getElementById('text-box-2').style.height="auto";

document.getElementById('text-box-3').style.height="auto";

document.getElementById('text-box-4').style.height="auto";


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
                if(msg[0] == "1"){
                    alert("Alternate Email updated successfully");
                    $('#ae_id').text(alt_email);
                   
                }
                else if(msg[0] == "2"){
                    alert("Alternate contact updated successfully");
                }
                else if(msg[0] == "3"){
                    alert("Accomodation Type updated successfully");
                }


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