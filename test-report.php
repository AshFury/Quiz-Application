<?php
ob_start();
session_start();
include("include/config.php");
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$score=$_SESSION['currscore'];
$infor .='<br/>';
$infor .='<br/>';
$infor .='<br/>';
//$yourops=$_SESSION['chosen'];
//$corrops=$_SESSION['isright'];

$infor ='';

$infor .='<h2>Test Report</h2>';

$infor .='<strong>Score: </strong>' . $score . '<br/>';
$infor .='<br/>';
$infor .='<br/>';
$infor .='<strong>Questions: </strong><br/>';
foreach($_SESSION['questionslist'] as $val){
    $infor .=''. $val .'<br/>';
}
$infor .='<br/>';
$infor .='<br/>';
$infor .='<strong>Your selected answers: </strong><br/>';
foreach ($_SESSION['youroption'] as $val){
    $infor .=''. $val .'<br/>';
}
$infor .='<br/>';
$infor .='<br/>';
$infor .='<br/>';
//$infor .='<strong>Your selected options: </strong>' . $yourops .'<br/>';
$infor .='<strong>Correct options: </strong><br/>';
//$infor .='<strong>Testimonial: </strong>' . $userstory .'<br/>';
foreach ($_SESSION['correctoptions'] as $val){
    $infor .=''. $val .'<br/>';
}
$mpdf->WriteHTML($infor);
file_put_contents('C:\xampp\htdocs' . $_SESSION['Test_Name'] . '.pdf', $mpdf->Output());
?>