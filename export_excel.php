<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
session_start();
error_reporting(0); // close all error
// set html to excel format
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="MyXls.xls"');

function thainumDigit($num){
	return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
	array( "๐" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
	$num);
};

function arabicnumDigit($num){
	return str_replace(array( "๐" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
	array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
	$num);
};

function monthnumDigit($num){
	return str_replace(array( '01' , '02' , '03' , '04' , '05' , '06' ,'07' , '08' , '09' , '10' , '11' , '12' ),
	array( "ม.ค." , "ก.พ." , "มี.ค." , "เม.ย." , "พ.ค." , "มิ.ย." , "ก.ค." , "ส.ค." , "ก.ย." , "ต.ค." , "พ.ย." , "ธ.ค." ),
	$num);
};

function thainamedepartFull($name){
	return str_replace(array( 'ศฝฯ' , 'สพฯ'),
	array( "ศูนย์ฝึกและอบรมเด็กและเยาวชน" , "สถานพินิจและคุ้มครองเด็กและเยาวชนจังหวัด"),
	$name);
};

$flag = 0;
$id = $_GET['id'];
$divi = $_GET['division'];
$type_export = $_GET['t'];

if ($divi == 'jjs120') {
	$flag = 1;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,cr.r_cen1_5_2 as r5,cr.r_cen2_1_1 as r6,cr.r_cen2_2_1 as r7,cr.r_cen2_3_1 as r8,cr.r_cen2_4_1 as r9,cr.r_cen2_5_1 as r10,cr.r_cen2_6_1 as r11,cr.r_cen2_7_1 as r12";
	$sql .= " ,cr.r_cen3_1_1 as r13,cr.r_cen3_2_1 as r14,cr.r_cen3_3_1 as r15,cr.r_cen3_4_1 as r16,cr.r_cen3_5_1 as r17,cr.r_cen3_6_1 as r18,cr.r_cen3_8_1 as r20,cr.r_cen3_9_1 as r21";
	$sql .= " FROM data d, userlogin ul, center_reason cr";
	$sql .= " WHERE d.center_id=cr.id AND d.division=ul.username AND d.id='$id'";
} elseif ($divi == 'heh100') {
	$flag = 1;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,cr.r_cen1_5_3 as r5,cr.r_cen2_1_3 as r6,cr.r_cen2_2_3 as r7,cr.r_cen2_3_3 as r8,cr.r_cen2_6_3 as r11,cr.r_cen2_7_3 as r12,cr.r_cen3_1_3 as r13,cr.r_cen3_2_3 as r14,cr.r_cen3_3_3 as r15,cr.r_cen3_4_3 as r16,cr.r_cen3_5_3 as r17";
	$sql .= " FROM data d, userlogin ul, center_reason cr";
	$sql .= " WHERE d.center_id=cr.id AND d.division=ul.username AND d.id='$id'";
} elseif ($divi == 'hrm101') {
	$flag = 1;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,cr.r_cen1_1_1 as r1,cr.r_cen3_5_1 as r17,cr.r_cen3_7_1 as r19";
	$sql .= " FROM data d, userlogin ul, center_reason cr";
	$sql .= " WHERE d.center_id=cr.id AND d.division=ul.username AND d.id='$id'";
} elseif ($divi == 'jjs801') {
	$flag = 1;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,cr.r_cen1_2_1 as r2,cr.r_cen1_3_1 as r3,cr.r_cen1_4_1 as r4";
	$sql .= " FROM data d, userlogin ul, center_reason cr";
	$sql .= " WHERE d.center_id=cr.id AND d.division=ul.username AND d.id='$id'";
} elseif ($divi == 'psd001') {
	$flag = 1;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,cr.r_cen1_5_1 as r5,cr.r_cen3_7_3 as r19";
	$sql .= " FROM data d, userlogin ul, center_reason cr";
	$sql .= " WHERE d.center_id=cr.id AND d.division=ul.username AND d.id='$id'";
} elseif ($divi == 'fin201') {
	$flag = 1;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,cr.r_cen1_2_2 as r2,cr.r_cen1_3_2 as r3,cr.r_cen1_4_2 as r4,cr.r_cen3_7_1 as r19,cr.r_cen3_8_1 as r20,cr.r_cen3_9_1 as r21,cr.r_cen3_10_1 as r22";
	$sql .= " FROM data d, userlogin ul, center_reason cr";
	$sql .= " WHERE d.center_id=cr.id AND d.division=ul.username AND d.id='$id'";
} elseif ($divi == 'jdi100') {
	$flag = 1;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,cr.r_cen1_1_2 as r1,cr.r_cen2_1_2 as r6,cr.r_cen2_2_2 as r7,cr.r_cen2_3_2 as r8,cr.r_cen2_4_2 as r9,cr.r_cen2_5_2 as r10,cr.r_cen2_6_2 as r11,cr.r_cen2_7_2 as r12,cr.r_cen3_1_2 as r13,cr.r_cen3_2_2 as r14,cr.r_cen3_3_2 as r15,cr.r_cen3_4_2 as r16,cr.r_cen3_5_2 as r17,cr.r_cen3_6_2 as r18,cr.r_cen3_7_2 as r19,cr.r_cen3_8_2 as r20";
	$sql .= " FROM data d, userlogin ul, center_reason cr";
	$sql .= " WHERE d.center_id=cr.id AND d.division=ul.username AND d.id='$id'";
} else {
	$flag = 0;
	$sql = "SELECT d.type_locate,d.inspect_type,d.budget_year,ul.name,d.inspect_date";
	$sql .= " ,d.r1_1 as r1,d.r1_2 as r2,d.r1_3 as r3,d.r1_4 as r4,d.r1_5 as r5";
	$sql .= " ,d.r2_1 as r6,d.r2_2 as r7,d.r2_3 as r8,d.r2_4 as r9,d.r2_5 as r10,d.r2_6 as r11,d.r2_7 as r12";
	$sql .= " ,d.r3_1 as r13,d.r3_2 as r14,d.r3_3 as r15,d.r3_4 as r16,d.r3_5 as r17,d.r3_6 as r18,d.r3_7 as r19,d.r3_8 as r20,d.r3_9 as r21,d.r3_10 as r22";
	$sql .= " FROM data d, userlogin ul";
	$sql .= " WHERE d.division=ul.username AND d.id='$id'";
}

$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();

$sub_query = "SELECT track_round,r1_1,r1_2,r1_3,r1_4,r1_5,r2_1,r2_2,r2_3,r2_4,r2_5,r2_6,r2_7,r3_1,r3_2,r3_3,r3_4,r3_5,r3_6,r3_7,r3_8,r3_9,r3_10,userlogin.name FROM userlogin, report_follow WHERE report_follow.division=userlogin.username and data_id='$id' and division='$divi'";
$subresult = mysqli_query($conn, $sub_query);
while($row = mysqli_fetch_assoc($subresult))
	{
		$cname = $row['name'];
		if ($row['track_round'] == 1) {
			$t1_1 = $row['r1_1'];
			$t1_2 = $row['r1_2'];
			$t1_3 = $row['r1_3'];
			$t1_4 = $row['r1_4'];
			$t1_5 = $row['r1_5'];
			$t1_6 = $row['r2_1'];
			$t1_7 = $row['r2_2'];
			$t1_8 = $row['r2_3'];
			$t1_9 = $row['r2_4'];
			$t1_10 = $row['r2_5'];
			$t1_11 = $row['r2_6'];
			$t1_12 = $row['r2_7'];
			$t1_13 = $row['r3_1'];
			$t1_14 = $row['r3_2'];
			$t1_15 = $row['r3_3'];
			$t1_16 = $row['r3_4'];
			$t1_17 = $row['r3_5'];
			$t1_18 = $row['r3_6'];
			$t1_19 = $row['r3_7'];
			$t1_20 = $row['r3_8'];
			$t1_21 = $row['r3_9'];
			$t1_22 = $row['r3_10'];
		} elseif ($row['track_round'] == 2) {
			$t2_1 = $row['r1_1'];
			$t2_2 = $row['r1_2'];
			$t2_3 = $row['r1_3'];
			$t2_4 = $row['r1_4'];
			$t2_5 = $row['r1_5'];
			$t2_6 = $row['r2_1'];
			$t2_7 = $row['r2_2'];
			$t2_8 = $row['r2_3'];
			$t2_9 = $row['r2_4'];
			$t2_10 = $row['r2_5'];
			$t2_11 = $row['r2_6'];
			$t2_12 = $row['r2_7'];
			$t2_13 = $row['r3_1'];
			$t2_14 = $row['r3_2'];
			$t2_15 = $row['r3_3'];
			$t2_16 = $row['r3_4'];
			$t2_17 = $row['r3_5'];
			$t2_18 = $row['r3_6'];
			$t2_19 = $row['r3_7'];
			$t2_20 = $row['r3_8'];
			$t2_21 = $row['r3_9'];
			$t2_22 = $row['r3_10'];
		} elseif ($row['track_round'] == 3) {
			$t3_1 = $row['r1_1'];
			$t3_2 = $row['r1_2'];
			$t3_3 = $row['r1_3'];
			$t3_4 = $row['r1_4'];
			$t3_5 = $row['r1_5'];
			$t3_6 = $row['r2_1'];
			$t3_7 = $row['r2_2'];
			$t3_8 = $row['r2_3'];
			$t3_9 = $row['r2_4'];
			$t3_10 = $row['r2_5'];
			$t3_11 = $row['r2_6'];
			$t3_12 = $row['r2_7'];
			$t3_13 = $row['r3_1'];
			$t3_14 = $row['r3_2'];
			$t3_15 = $row['r3_3'];
			$t3_16 = $row['r3_4'];
			$t3_17 = $row['r3_5'];
			$t3_18 = $row['r3_6'];
			$t3_19 = $row['r3_7'];
			$t3_20 = $row['r3_8'];
			$t3_21 = $row['r3_9'];
			$t3_22 = $row['r3_10'];
		} elseif ($row['track_round'] == 4) {
			$t4_1 = $row['r1_1'];
			$t4_2 = $row['r1_2'];
			$t4_3 = $row['r1_3'];
			$t4_4 = $row['r1_4'];
			$t4_5 = $row['r1_5'];
			$t4_6 = $row['r2_1'];
			$t4_7 = $row['r2_2'];
			$t4_8 = $row['r2_3'];
			$t4_9 = $row['r2_4'];
			$t4_10 = $row['r2_5'];
			$t4_11 = $row['r2_6'];
			$t4_12 = $row['r2_7'];
			$t4_13 = $row['r3_1'];
			$t4_14 = $row['r3_2'];
			$t4_15 = $row['r3_3'];
			$t4_16 = $row['r3_4'];
			$t4_17 = $row['r3_5'];
			$t4_18 = $row['r3_6'];
			$t4_19 = $row['r3_7'];
			$t4_20 = $row['r3_8'];
			$t4_21 = $row['r3_9'];
			$t4_22 = $row['r3_10'];
		}
			// print_r($row);
			// echo "<br><br>";
	}


$data['inspect_type'] = ($data['inspect_type'] == 1)?'ปกติ':'พิเศษ';
$ins_d = thainumDigit(substr($data['inspect_date'], -2));
$ins_m = monthnumDigit(substr($data['inspect_date'], 5, -3));
$ins_y = thainumDigit(substr($data['inspect_date'], 0, -6)+543);
$ins_fulldate = $ins_d." ".$ins_m." ".$ins_y;

if ($data['type_locate'] == 1) {
	$stack = array("r1_1" => array("๑.๑ บุคลากร", $data['r1'], $t1_1, $t2_1, $t3_1, $t4_1),
	"r1_2" => array("๑.๒ งบประมาณ", $data['r2'], $t1_2, $t2_2, $t3_2, $t4_2),
	"r1_3" => array("๑.๓ อาคารสถานที่", $data['r3'], $t1_3, $t2_3, $t3_3, $t4_3),
	"r1_4" => array("๑.๔ ยานพาหนะ", $data['r4'], $t1_4, $t2_4, $t3_4, $t4_4),
	"r1_5" => array("๑.๕ ตัวชี้วัดตามคำรับรอง", $data['r5'], $t1_5, $t2_5, $t3_5, $t4_5),
	"r2_1" => array("๒.๑ การรับตัวเด็กแและเยาวชน", $data['r6'], $t1_6, $t2_6, $t3_6, $t4_6),
	"r2_2" => array("๒.๒ การประเมินความเสี่ยงและความจำเป็น", $data['r7'], $t1_7, $t2_7, $t3_7, $t4_7),
	"r2_3" => array("๒.๓ การส่งต่อนักวิชาชีพเพื่อประเมินเฉพาะด้าน", $data['r8'], $t1_8, $t2_8, $t3_8, $t4_8),
	"r2_4" => array("๒.๔ การรายงานข้อเท็จจริง", $data['r9'], $t1_9, $t2_9, $t3_9, $t4_9),
	"r2_5" => array("๒.๕ การดำเนินงานตามมาตรการพิเศษ", $data['r10'], $t1_10, $t2_10, $t3_10, $t4_10),
	"r2_6" => array("๒.๖ การลงข้อมูลในระบบ CM ของเด็กและเยาวชนถูกต้องครบถ้วน", $data['r11'], $t1_11, $t2_11, $t3_11, $t4_11),
	"r3_1" => array("๓.๑ งานด้านคดี", $data['r13'], $t1_13, $t2_13, $t3_13, $t4_13),
	"r3_2" => array("๓.๒ งานรักษาความมั่นคงปลอดภัย", $data['r14'], $t1_14, $t2_14, $t3_14, $t4_14),
	"r3_3" => array("๓.๓ การควบคุมดูแลเด็กและเยาวชนในสถานควบคุม", $data['r15'], $t1_15, $t2_15, $t3_15, $t4_15),
	"r3_4" => array("๓.๔ การแก้ไขบำบัดฟื้นฟูเด็กและเยาวชน", $data['r16'], $t1_16, $t2_16, $t3_16, $t4_16),
	"r3_5" => array("๓.๕ การป้องกันและปราบปรามการทุจริตประพฤติมิชอบ", $data['r17'], $t1_17, $t2_17, $t3_17, $t4_17),
	"r3_6" => array("๓.๖ การสนับสนุนของเครือข่าย", $data['r18'], $t1_18, $t2_18, $t3_18, $t4_18),
	"r3_7" => array("๓.๗ การประหยัดพลังงาน", $data['r19'], $t1_19, $t2_19, $t3_19, $t4_19),
	"r3_8" => array("๓.๘ การดำเนินงานด้านการเงินการคลัง", $data['r20'], $t1_20, $t2_20, $t3_20, $t4_20),
	"r3_9" => array("๓.๙ การอำนวยความยุติธรรมและการป้องกันปัญหาเด็กและเยาวชน", $data['r21'], $t1_21, $t2_21, $t3_21, $t4_21),
	"r3_10" => array("๓.๑๐ การสนับสนุนภารกิจของสถานพินิจ", $data['r22'], $t1_22, $t2_22, $t3_22, $t4_22));
} else {
	$stack = array("r1_1" => array("๑.๑ บุคลากร", $data['r1'], $t1_1, $t2_1, $t3_1, $t4_1),
	"r1_2" => array("๑.๒ งบประมาณ", $data['r2'], $t1_2, $t2_2, $t3_2, $t4_2),
	"r1_3" => array("๑.๓ อาคารสถานที่", $data['r3'], $t1_3, $t2_3, $t3_3, $t4_3),
	"r1_4" => array("๑.๔ ยานพาหนะ", $data['r4'], $t1_4, $t2_4, $t3_4, $t4_4),
	"r1_5" => array("๑.๕ ตัวชี้วัดตามคำรับรอง", $data['r5'], $t1_5, $t2_5, $t3_5, $t4_5),
	"r2_1" => array("๒.๑ การรับตัวเด็กแและเยาวชน", $data['r6'], $t1_6, $t2_6, $t3_6, $t4_6),
	"r2_2" => array("๒.๒ การจำแนกและจัดทำแผนฝึกอบรมรายบุคคล", $data['r7'], $t1_7, $t2_7, $t3_7, $t4_7),
	"r2_3" => array("๒.๓ การฝึกอบรม/การบำบัด", $data['r8'], $t1_8, $t2_8, $t3_8, $t4_8),
	"r2_4" => array("๒.๔ เกษตรอินทรีย์", $data['r9'], $t1_9, $t2_9, $t3_9, $t4_9),
	"r2_5" => array("๒.๕ ห้องเรียนกีฬา", $data['r10'], $t1_10, $t2_10, $t3_10, $t4_10),
	"r2_6" => array("๒.๖ การจัการจัดการศึกษาสามัญอาชีวศึกษาและอุดมศึกษา", $data['r11'], $t1_11, $t2_11, $t3_11, $t4_11),
	"r2_7" => array("๒.๗ การลงข้อมูลในระบบ TR ของเด็กและเยาวชนถูกต้องครบถ้วน", $data['r12'], $t1_12, $t2_12, $t3_12, $t4_12),
	"r3_1" => array("๓.๑ การรักษาความมั่นคงปลอดภัย", $data['r13'], $t1_13, $t2_13, $t3_13, $t4_13),
	"r3_2" => array("๓.๒ การบริการที่เป็นมิตแก่เด็กและเยาวชน", $data['r14'], $t1_14, $t2_14, $t3_14, $t4_14),
	"r3_3" => array("๓.๓ การรับตัวเด็กและเยาวชน", $data['r15'], $t1_15, $t2_15, $t3_15, $t4_15),
	"r3_4" => array("๓.๔ การบำบัดแก้ไขฟื้นฟูเด็กและเยาวชน", $data['r16'], $t1_16, $t2_16, $t3_16, $t4_16),
	"r3_5" => array("๓.๕ การประชุมคณะกรรมการสหวิชาชีพ", $data['r17'], $t1_17, $t2_17, $t3_17, $t4_17),
	"r3_6" => array("๓.๖ การติดตามภายหลังปล่อย", $data['r18'], $t1_18, $t2_18, $t3_18, $t4_18),
	"r3_7" => array("๓.๗ การดำเนินงานป้องกันและปราบปรามการทุจริตประพฤติมิชอบ", $data['r19'], $t1_19, $t2_19, $t3_19, $t4_19),
	"r3_8" => array("๓.๘ การสนับสนุนการดำเนินงานของเครือข่าย", $data['r20'], $t1_20, $t2_20, $t3_20, $t4_20),
	"r3_9" => array("๓.๙ การประหยัดพลังงาน", $data['r21'], $t1_21, $t2_21, $t3_21, $t4_21),
	"r3_10" => array("๓.๑๐ การเงินการคลัง", $data['r22'], $t1_22, $t2_22, $t3_22, $t4_22));
}
// echo "<br><br>";
// print_r($stack);
// echo "<br><br>";
// print_r($data);
?>
<HTML>
  <HEAD>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <style>
    td {
      vertical-align: middle;
    }
    </style>
  </HEAD>
  <BODY>
    <TABLE x:str BORDER="1" style="font-family: TH SarabunPSK; font-size: 20px; height: 40px;">
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th colspan="14" align="center">รายงานการตรวจราชการกรณี<?=$data['inspect_type']?> ประจำปีงบประมาณ พ.ศ. <?=thainumDigit($data['budget_year'])?></th>
      </TR>
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th colspan="14" align="center">กรมพินิจและคุ้มครองเด็กและเยาวชน</th>
      </TR>
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th colspan="14" align="center"><?=($flag == 0)?thainamedepartFull($data['name']):$cname?></th>
      </TR>
      <TR style="font-family: TH SarabunPSK; font-size: 25px;">
        <th colspan="14" align="center">วันที่ตรวจราชการ <?=$ins_fulldate?></th>
      </TR>

      <tr style="height: 50px;" align="center">
        <th>หัวข้อการตรวจราชการ</th>
        <th><?php if ($flag == 1) {echo "ข้อเสนอแนะของผู้ตรวจราชการกรม";} else {echo "ข้อค้นพบ/ผลการดำเนินงาน";} ?></th>
        <th colspan="3">ผลการดำเนินงานของหน่วยรับการตรวจครั้งที่ ๑</th>
        <th colspan="3">ผลการดำเนินงานของหน่วยรับการตรวจครั้งที่ ๒</th>
        <th colspan="3">ผลการดำเนินงานของหน่วยรับการตรวจครั้งที่ ๓</th>
        <th colspan="3">ผลการดำเนินงานของหน่วยรับการตรวจครั้งที่ ๔</th>
      </tr>
      <!-- <TR> -->
      <?php
      $item = 1;
			foreach ($stack as $key => $value) {
				echo "<tr>";
				foreach ($value as $fkey => $fvalue) {
					if ($fkey >= 2) {
						if (!empty($fvalue)) {
							echo "<td colspan='3'>";
							echo thainumDigit($fvalue);
							echo "</td>";
						} else {
							echo "<td colspan='3'>";
							echo "-";
							echo "</td>";
						}
					} else {
						if (!empty($fvalue)) {
							echo "<td>";
							echo thainumDigit($fvalue);
							echo "</td>";
						} else {
							echo "<td>";
							echo "-";
							echo "</td>";
						}
					}
				}
				echo "</tr>";
			}
      ?>
  </TABLE>
</BODY>
</HTML>
