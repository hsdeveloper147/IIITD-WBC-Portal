<?php

session_start();

//  if(!array_key_exists("loggedin",$_SESSION) || $_SESSION["loggedin"]!=TRUE){

//                                 header("Location: unautherized.php"); 


                    // }

// $user=$_SESSION["client"];
ob_start(); 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf_import.php');

use setasign\Fpdi\Fpdi;



// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = 'images/logo.png';

        $this->Image($image_file, 10, 10, 100, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
       
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
// if ($user[25]=="Yes") {
//     $var = "Post applied for: ".$user[26];
// }
// else{
// 	$var = "";
// }
// if ($user[27]=="Yes") {
//     $var1 = " ".$user[26];
// }
// else{
// 	$var1 = "Type of Disability:".$user[27];
// }

// if ($user[135]!="") {
//     $ol = " ".$user[135];
// }
// else{
// 	$ol = "   NA";
// }

// if ($user[125]!="") {
//     $key = " ".$user[125];
// }
// else{
// 	$key = "   NA";
// }
// if ($user[127]!="") {
//     $st = " ".$user[127];
// }
// else{
// 	$st = "   NA";
// }
// if ($user[128]!="") {
//     $tu = " ".$user[128];
// }
// else{
// 	$tu = "   NA";
// }


// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);


// set font
$pdf->SetFont('times', 'BI', 12, 'true');

// add a page
$pdf->AddPage();

$pdf->SetFont('times', 'BI', 10, 'true');

// $pdf->Image('uploads/photo/'.$user[15],150, 70, 35, 45, 'JPG', 'http://www.tcpdf.org', '', true, 175, '', false, false, 1, false, false, false);

// $pdf->Image('uploads/sign/'.$user[16],145, 150, 45,25 , 'JPG', 'http://www.tcpdf.org', '', true, 175, '', false, false, 1, false, false, false);
	

$html = <<<EOD
<head>
   
        <style type="text/css">
        </style>

</head>

<body>


</body>

</html>

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

$pdf->Output('uploads/s_doc/ds@gmail_s_doc.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+
 
