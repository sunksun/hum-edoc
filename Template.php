<?php
require_once 'PHPWord.php';
require_once("connect.php");
session_start();
$id = $_SESSION["id"];

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template.docx');

function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}
$strDate = date("Y-m-d");
echo "Create Date now : ".DateThai($strDate);
echo "  ";

$memo_id=$_REQUEST["memo_id"];
$name=$_SESSION['name'];

$sql="SELECT * FROM memo WHERE memo_id = '$memo_id' ";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

$dep = $result["dep"];
$field = $result["field"];
$memo_num_dep = $result["memo_num_dep"];
$memo_date = $result["memo_date"];
$title = $result["title"];
$paragraph1 = $result["paragraph1"];
$paragraph2 = $result["paragraph2"];
$paragraph3 = $result["paragraph3"];
$sign = $result["sign"];
$sign_officer = $result["sign_officer"];
$name = $result["name"];
$position = $result["position"];
$sign_depart = $result["sign_depart"];
$depart_opinion = $result["depart_opinion"];
$memo_num_officer1 = $result["memo_num_officer1"];
$sign_officer1 = $result["sign_officer1"];
$time_officer1 = $result["time_officer1"];
$officer1_opinion = $result["officer1_opinion"];
$sign_head_officer = $result["sign_head_officer"];
$head_officer_opinion = $result["head_officer_opinion"];
$sign_admin = $result["sign_admin"];
$admin_opinion = $result["admin_opinion"];

$document->setValue('Value1', $field);
$document->setValue('Value2', $memo_num_dep);
$document->setValue('Value3', $memo_date);
$document->setValue('Value4', $title);
$document->setValue('Value5', $paragraph1);
$document->setValue('Value6', $paragraph2);
$document->setValue('Value7', $paragraph3);
$document->setValue('Value8', $sign);
$document->setValue('Value9', $name);
$document->setValue('Value10', $position);
$document->setValue('Value11', $depart_opinion);
$document->setValue('Value12', $memo_num_officer1);
$document->setValue('Value13', $sign_officer1);
$document->setValue('Value14', $time_officer1);
$document->setValue('Value15', $officer1_opinion);
$document->setValue('Value16', $head_officer_opinion);
$document->setValue('Value17', $sign_head_officer);
$document->setValue('Value18', $admin_opinion);
$document->setValue('Value19', $sign_admin);
$document->setValue('Value20', $sign_depart);
$document->setValue('Value21', $dep);

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$document->save('report.docx');
//echo "<script language='javascript'>alert('Click here to Download');</script>";
echo "<a href='report.docx'>Click here</a> to Download File.";
//echo "<meta http-equiv='refresh' content='0;URL=index.php'>";	

?>