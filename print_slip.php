<?
include("MPDF54/mpdf.php");
session_start();
$year=$_GET['year'];
$month=$_GET['month'];
$id_card=$_SESSION['id_card'];
$salary=$_SESSION['salary'];

// $html = file_get_contents("http://10.222.12.14/djopsupport/salary/slip_data.php?year=$year&month=$month&id_card=$id_card&salary=$salary");
$html = file_get_contents("localhost/inspectionNew/slip_data.php?year=$year&month=$month&id_card=$id_card&salary=$salary");

$mpdf=new mPDF();
$mpdf=new mPDF('UTF-8');

$mpdf->SetDisplayMode('fullpage');
$mpdf->SetAutoFont();

// LOAD a stylesheet
$stylesheet = file_get_contents('css/slip_style.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($html);

$mpdf->Output();

exit;
?>
