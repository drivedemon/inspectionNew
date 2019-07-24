<?php
session_start();
error_reporting(~E_NOTICE);
if($_SESSION["user"] == "")
{
	echo "กรุณาลงชื่อเข้าใช้";
	exit();
}

if($_SESSION["permission"] != "2" && $_SESSION["permission"] != "3")
{
	echo "ไม่อนุญาตให้เข้าใช้";
	exit();
}

if($_SESSION["userID"] != $_GET['user'])
{
	echo "ข้อมูลผู้ใช้ไม่ถูกต้อง";
	exit();
}
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');

// set variable and query
$id = $_GET['i'];
$userID = $_GET['user'];
$userS_locate = $_SESSION['user'];
if (substr($userS_locate,0,2) == "sp") {
	$check_locate = 1;
} elseif (substr($userS_locate,0,2) == "tr") {
	$check_locate = 2;
} else {
	$check_locate = "3";
}
$menu = $check_locate==3?"editcen":"edit";
if ($id != "") {
	$sql = "SELECT d.budget_year,d.type_locate,t.title_name,ins.firstname,ins.lastname,d.boss_name,usl.name as divi_name,d.inspect_type,d.inspect_date,d.inspect_no,d.inspect_doc,d.inspect_doc_date,d.personnel1,d.personnel2,d.personnel3,d.personnel4,d.personnel5,d.cm,d.fc,d.cc,d.case53,d.case_f,d.case132,d.case_sp,d.tr1,d.tr2,d.tr3,d.tr4,d.tr5,d.tr6,d.tr7,d.tr8,d.pr_follow_round,d.center_follow_round, ";
	$sql .= " d.r1_1,d.cb1_1,d.sub_pr1_1,d.cen1_1,d.r1_2,d.cb1_2,d.sub_pr1_2,d.cen1_2,d.r1_3,d.cb1_3,d.sub_pr1_3,d.cen1_3,d.r1_4,d.cb1_4,d.sub_pr1_4,d.cen1_4,d.r1_5,d.cb1_5,d.sub_pr1_5,d.cen1_5,";
	$sql .= " d.r2_1,d.cb2_1,d.sub_pr2_1,d.cen2_1,d.r2_2,d.cb2_2,d.sub_pr2_2,d.cen2_2,d.r2_3,d.cb2_3,d.sub_pr2_3,d.cen2_3,d.r2_4,d.cb2_4,d.sub_pr2_4,d.cen2_4,d.r2_5,d.cb2_5,d.sub_pr2_5,d.cen2_5,d.r2_6,d.cb2_6,d.sub_pr2_6,d.cen2_6,d.r2_7,d.cb2_7,d.sub_pr2_7,d.cen2_7,";
	$sql .= " d.r3_1,d.cb3_1,d.sub_pr3_1,d.cen3_1,d.r3_2,d.cb3_2,d.sub_pr3_2,d.cen3_2,d.r3_3,d.cb3_3,d.sub_pr3_3,d.cen3_3,d.r3_4,d.cb3_4,d.sub_pr3_4,d.cen3_4,d.r3_5,d.cb3_5,d.sub_pr3_5,d.cen3_5,d.r3_6,d.cb3_6,d.sub_pr3_6,d.cen3_6,d.r3_7,d.cb3_7,d.sub_pr3_7,d.cen3_7,d.r3_8,d.cb3_8,d.sub_pr3_8,d.cen3_8,d.r3_9,d.cb3_9,d.sub_pr3_9,d.cen3_9,d.r3_10,d.cb3_10,d.sub_pr3_10,d.cen3_10,";
	$sql .= " cr.r_cen1_1_1,cr.r_cen1_1_2,cr.r_cen1_2_1,cr.r_cen1_2_2,cr.r_cen1_3_1,cr.r_cen1_3_2,cr.r_cen1_4_1,cr.r_cen1_4_2,cr.r_cen1_5_1,cr.r_cen1_5_2,cr.r_cen1_5_3,cr.r_cen2_1_1,cr.r_cen2_1_2,cr.r_cen2_1_3,cr.r_cen2_2_1,";
	$sql .= " cr.r_cen2_2_2,cr.r_cen2_2_3,cr.r_cen2_3_1,cr.r_cen2_3_2,cr.r_cen2_3_3,cr.r_cen2_4_1,cr.r_cen2_4_2,cr.r_cen2_5_1,cr.r_cen2_5_2,cr.r_cen2_6_1,cr.r_cen2_6_2,cr.r_cen2_6_3,cr.r_cen2_7_1,cr.r_cen2_7_2,cr.r_cen2_7_3,";
	$sql .= " cr.r_cen3_1_1,cr.r_cen3_1_2,cr.r_cen3_1_3,cr.r_cen3_2_1,cr.r_cen3_2_2,cr.r_cen3_2_3,cr.r_cen3_3_1,cr.r_cen3_3_2,cr.r_cen3_3_3,cr.r_cen3_4_1,cr.r_cen3_4_2,cr.r_cen3_4_3,cr.r_cen3_5_1,cr.r_cen3_5_2,cr.r_cen3_5_3,";
	$sql .= " cr.r_cen3_6_1,cr.r_cen3_6_2,cr.r_cen3_7_1,cr.r_cen3_7_2,cr.r_cen3_7_3,cr.r_cen3_8_1,cr.r_cen3_8_2,cr.r_cen3_9_1,cr.r_cen3_10_1";
	$sql .= " FROM data d, inspector ins, userlogin usl, title t, center_reason cr WHERE d.division = usl.username and d.inspector = ins.id and t.id = ins.titlename and d.center_id = cr.id and d.id = '$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
	
	$fullname = $row['title_name'].$row['firstname']." ".$row['lastname'];
	$locate = (!empty($row['type_locate']))?$row['type_locate']:'';
	$keylocate = $locate=="1"? "sp":'tr';
	$round = $check_locate==3?$row['center_follow_round']:$row['pr_follow_round'];

	if ($row['inspect_type'] == 1) {
		$insType = "กรณีปกติ";
	} elseif ($row['inspect_type'] == 2) {
		$insType = "กรณีพิเศษ";
	} else {
		$insType = "กรณีบูรณาการ";
	}
}

?>
<!doctype html>
<html lang="en">

<!-- Head -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<!-- Style CSS -->
	<style>
	body{
		background-color: Ivory;
	}
	label {
		font-size: 14px !important;
	}
	</style>

	<title><?php if ($check_locate==3) {echo "เพิ่มข้อมูลของส่วนกลาง";} else {echo "เพิ่มข้อมูลของต่างจังหวัด";} ?></title>

</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3><img src="./images/hd-13.jpg" width="1000" height="150"></h3>
		<h3><?php if ($check_locate==3) {echo "เพิ่มข้อมูลของส่วนกลาง";} else {echo "เพิ่มข้อมูลของต่างจังหวัด";} ?></h3>
		<h4>รอบการติดตามครั้งที่ <?=$round?></h4>
	</div>
	<!-- Form -->
	<div class="container p-2" style="max-width:800px;">
		<!-- <div class="container p-2 text-right"> -->
		<!-- <a href="detail-report.php?p=1" target="_blank">ดูรายงานทั้งหมด</a> -->
		<!--
		|
		<a href="detail-reply.php" target="_blank">ดูการตอบกลับทั้งหมด</a>
	-->
	<!-- </div> -->
	<form name="report" action="form-add-user-sent.php" method="post" enctype="multipart/form-data" id="report-form">
		<hr>
		<!-- ==================================================== tab 1 ==================================================== -->
		<!-- Text input -->
		<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<input type="hidden" name="menu" value="<?=$menu?>">
			<input type="hidden" name="locate" value="<?=$locate?>">
			<input type="hidden" name="cen_locate" value="<?=$check_locate?>">
			<input type="hidden" name="f_round" value="<?=$round?>">
			<?php if(!empty($id)){echo "<input type='hidden' name='inid' value='$id'";} ?>

			<label class="col-sm-12 col-form-label"></label>
			<label class="col-sm-12 col-form-label"></label>

			<label class="col-3 col-form-label bold">ปีงบประมาณ:</label>
			<label class="col-9 col-form-label"><?=$row['budget_year']?></label>

			<label class="col-3 col-form-label bold">ชื่อผู้ตรวจ:</label>
			<label class="col-9 col-form-label"><?=$fullname?></label>

			<label class="col-sm-3 col-form-label bold">ชื่อหัวหน้าหน่วยงาน:</label>
			<label class="col-9 col-form-label"><?=$row['boss_name']?></label>

			<label class="col-sm-3 col-form-label bold">หน่วยรับการตรวจ:</label>
			<label class="col-9 col-form-label"><?=$row['divi_name']?></label>

			<label class="col-sm-3 col-form-label bold">ครั้งที่ติดตาม: </label>
			<label class="col-9 col-form-label"><?=$insType?></label>

			<label class="col-sm-3 col-form-label bold">วัน/เดือน/ปีที่ออกตรวจ:</label>
			<label class="col-4 col-form-label"><?=DateThai($row['inspect_date'])?></label>
			<label class="col-sm-2 col-form-label bold">รอบที่:</label>
			<label class="col-3 col-form-label"><?=$row['inspect_no']?></label>

			<label class="col-sm-3 col-form-label bold">อ้างถึง ยธ:</label>
			<label class="col-4 col-form-label"><?=$row['inspect_doc']?></label>

			<label class="col-sm-2 col-form-label bold">วันที่หนังสือ:</label>
			<label class="col-3 col-form-label"><?=DateThai($row['inspect_doc_date'])?></label>

			<!-- hr line  -->
			<label class="col-sm-12 col-form-label"><hr></label>

			<label class="col-sm-3 col-form-label bold"><li>อัตรากำลัง รวม:</li></label>
			<label class="col-1 col-form-label"><?=$row['personnel1']+$row['personnel2']+$row['personnel3']+$row['personnel4']+$row['personnel5']?></label>
			<label class="col-sm-8 col-form-label">คน &emsp;<b>จำแนกเป็น</b></label>

			<label class="col-sm-3 col-form-label bold">ข้าราชการ:</label>
			<label class="col-1 col-form-label"><?=$row['personnel1']?></label>
			<label class="col-sm-3 col-form-label">คน</label>
			<label class="col-sm-3 col-form-label bold">ลูกจ้างประจำ:</label>
			<label class="col-1 col-form-label"><?=$row['personnel2']?></label>
			<label class="col-sm-1 col-form-label">คน</label>

			<label class="col-sm-3 col-form-label bold">พนักงานราชการ:</label>
			<label class="col-1 col-form-label"><?=$row['personnel3']?></label>
			<label class="col-sm-3 col-form-label">คน</label>
			<label class="col-sm-3 col-form-label bold">ลูกจ้างชั่วคราว:</label>
			<label class="col-1 col-form-label"><?=$row['personnel4']?></label>
			<label class="col-sm-1 col-form-label">คน</label>


			<label class="col-sm-3 col-form-label bold">จ้างเหมาบริการ:</label>
			<label class="col-1 col-form-label"><?=$row['personnel5']?></label>
			<label class="col-sm-3 col-form-label">คน</label>

			<!-- hr line  -->
			<label class="col-sm-12 col-form-label"><hr></label>

			<?php
			if ($keylocate == "sp") { // check if keylocate == sp
				?>
				<label class="col-sm-12 col-form-label bold"><li>ปริมาณคดีในสถานพินิจฯ (ข้อมูล ณ วันเข้ารับการตรวจ)</li></label>

				<label class="col-sm-3 col-form-label bold">คดีอาญา:</label>
				<label class="col-1 col-form-label"><?=$row['cm']?></label>
				<label class="col-sm-3 col-form-label">คดี</label>
				<label class="col-sm-3 col-form-label bold">คดีครอบครัว:</label>
				<label class="col-1 col-form-label"><?=$row['fc']?></label>
				<label class="col-sm-1 col-form-label">คดี</label>

				<label class="col-sm-3 col-form-label bold">คดีกำกับการปกครอง:</label>
				<label class="col-1 col-form-label"><?=$row['cc']?></label>
				<label class="col-sm-8 col-form-label">คดี</label>

				<!-- hr line  -->
				<label class="col-sm-12 col-form-label"><hr></label>

				<label class="col-sm-12 col-form-label bold"><li>ปริมาณเด็กและเยาวชนในสถานพินิจฯ</li></label>

				<label class="col-sm-5 col-form-label bold">คดีตาม พ.ร.บ.ศาลเยาวชน พ.ศ. 2553:</label>
				<label class="col-1 col-form-label"><?=$row['case53']?></label>
				<label class="col-sm-6 col-form-label">คดี</label>

				<label class="col-sm-5 col-form-label bold">คดีตาม พ.ร.บ.ฟื้นฟูฯ:</label>
				<label class="col-1 col-form-label"><?=$row['case_f']?></label>
				<label class="col-sm-6 col-form-label">คดี</label>

				<label class="col-sm-5 col-form-label bold">คดีศาลมีคำสั่งมาตรา132 วรรค 2:</label>
				<label class="col-1 col-form-label"><?=$row['case132']?></label>
				<label class="col-sm-6 col-form-label">คดี</label>

				<label class="col-sm-5 col-form-label bold">คดีศาลมีคำสั่งฝึกอบรมในสถานพินิจฯ:</label>
				<label class="col-1 col-form-label"><?=$row['case_sp']?></label>
				<label class="col-sm-6 col-form-label">คดี</label>

				<?php
			} elseif ($keylocate == "tr") { // check if keylocate == tr
				?>

				<label class="col-sm-12 col-form-label bold"><li>ปริมาณเด็กและเยาวชนในศูนย์ฝึกและอบรมฯ (ข้อมูล ณ วันเข้ารับการตรวจ)</li></label>

				<label class="col-sm-3 col-form-label bold">ฝึกอบรมในศูนย์ฝึก:</label>
				<label class="col-1 col-form-label"><?=$row['tr1']?></label>
				<label class="col-sm-3 col-form-label">คน</label>
				<label class="col-sm-3 col-form-label bold">ลาเยี่ยมบ้าน:</label>
				<label class="col-1 col-form-label"><?=$row['tr2']?></label>
				<label class="col-sm-1 col-form-label">คน</label>

				<label class="col-sm-3 col-form-label bold" style="padding-top: 0px;">รักษาตัวที่สถาน<br>พยาบาล/บ้าน:</label>
				<label class="col-1 col-form-label"><?=$row['tr3']?></label>
				<label class="col-sm-3 col-form-label">คน</label>
				<label class="col-sm-3 col-form-label bold">พักฝึกอบรม:</label>
				<label class="col-1 col-form-label"><?=$row['tr4']?></label>
				<label class="col-sm-1 col-form-label">คน</label>

				<label class="col-sm-5 col-form-label bold" style="padding-top: 0px;">ออกไปศึกษา/ฝึกอาชีพภายนอก<br>แบบเช้าไปเย็นกลับ:</label>
				<label class="col-1 col-form-label"><?=$row['tr5']?></label>
				<label class="col-sm-6 col-form-label">คดี</label>

				<label class="col-sm-5 col-form-label bold" style="padding-top: 0px;">ออกไปศึกษา/ฝึกอาชีพภายนอก<br>แบบพักค้างคืนข้างนอก:</label>
				<label class="col-1 col-form-label"><?=$row['tr6']?></label>
				<label class="col-sm-6 col-form-label">คดี</label>

				<!-- hr line  -->
				<label class="col-sm-12 col-form-label"><hr></label>

				<label class="col-sm-12 col-form-label bold"><li>ปริมาณเด็กและเยาวชนที่ถูกจำหน่ายออกจากศูนย์ฝึกและอบรมฯ</li></label>

				<label class="col-sm-3 col-form-label bold">เสียชีวิต:</label>
				<label class="col-1 col-form-label"><?=$row['tr7']?></label>
				<label class="col-sm-3 col-form-label">คน</label>
				<label class="col-sm-3 col-form-label bold">หลบหนี:</label>
				<label class="col-1 col-form-label"><?=$row['tr8']?></label>
				<label class="col-sm-1 col-form-label">คน</label>

				<?php
			} // end if keylocate == tr
			?>
			<!-- hr line  -->
			<label class="col-sm-12 col-form-label"></label>
		</div>

		<!-- activity 1 -->
		<div class="form-group row" id="r1" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<label class="col-sm-12 col-form-label bold"><li>สรุปข้อสังเกต/ความเสี่ยง</li></label>
			<label class="col-sm-12 col-form-label bold">&emsp;1. ข้อมูลทั่วไป</label>
			<!-- activity 1.1 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">1.1 บุคลากร</label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_1_1']) && $userID == 101) {echo $row['r_cen1_1_1'];} elseif (!empty($row['r_cen1_1_2']) && $userID == 105) {echo $row['r_cen1_1_2'];} elseif ($check_locate != 3 && !empty($row['r1_1'])) {echo $row['r1_1'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 101 && !empty($row['r_cen1_1_1'])) || ($userID == 105 && !empty($row['r_cen1_1_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb1_1'],"1") !== false && $userID == 101) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_1" name="cen1_1" rows="2" required><?=convertName($row['cen1_1'], "1")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 101) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_1'], "1") == ""){echo "-";}else{echo convertName($row['cen1_1'], "1");}?></label>
						<?php
					}
				}
				if (strpos($row['cb1_1'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_1" name="cen1_1" rows="2" required><?=convertName($row['cen1_1'], "2")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_1'], "2") == ""){echo "-";}else{echo convertName($row['cen1_1'], "2");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r1_1'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr1_1']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr1_1" name="sub_pr1_1" rows="2" required><?=$row['sub_pr1_1']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file1_1">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 1.1 -->

			<!-- activity 1.2 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">1.2 งบประมาณ</label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_2_1']) && $userID == 102) {echo $row['r_cen1_2_1'];} elseif (!empty($row['r_cen1_2_2']) && $userID == 104) {echo $row['r_cen1_2_2'];} elseif ($check_locate != 3 && !empty($row['r1_2'])) {echo $row['r1_2'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 102 && !empty($row['r_cen1_2_1'])) || ($userID == 104 && !empty($row['r_cen1_2_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb1_2'],"3") !== false && $userID == 102) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_2" name="cen1_2" rows="2" required><?=convertName($row['cen1_2'], "3")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 102) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_2'], "3") == ""){echo "-";}else{echo convertName($row['cen1_2'], "3");}?></label>
						<?php
					}
				}
				if (strpos($row['cb1_2'],"4") !== false && $userID == 104) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_2" name="cen1_2" rows="2" required><?=convertName($row['cen1_2'], "4")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 104) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_2'], "4") == ""){echo "-";}else{echo convertName($row['cen1_2'], "4");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r1_2'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr1_2']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr1_2" name="sub_pr1_2" rows="2" required><?=$row['sub_pr1_2']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file1_2">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 1.2 -->

			<!-- activity 1.3 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">1.3 อาคารสถานที่</label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_3_1']) && $userID == 102) {echo $row['r_cen1_3_1'];} elseif (!empty($row['r_cen1_3_2']) && $userID == 104) {echo $row['r_cen1_3_2'];} elseif ($check_locate != 3 && !empty($row['r1_3'])) {echo $row['r1_3'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 102 && !empty($row['r_cen1_3_1'])) || ($userID == 104 && !empty($row['r_cen1_3_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb1_3'],"3") !== false && $userID == 102) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_3" name="cen1_3" rows="2" required><?=convertName($row['cen1_3'], "3")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 102) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_3'], "3") == ""){echo "-";}else{echo convertName($row['cen1_3'], "3");}?></label>
						<?php
					}
				}
				if (strpos($row['cb1_3'],"4") !== false && $userID == 104) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_3" name="cen1_3" rows="2" required><?=convertName($row['cen1_3'], "4")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 104) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
						<label class="col-sm-9 col-form-label cut-word"><? if(convertName($row['cen1_3'], "4") == ""){echo "-";}else{echo convertName($row['cen1_3'], "4");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r1_3'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr1_3']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr1_3" name="sub_pr1_3" rows="2" required><?=$row['sub_pr1_3']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file1_3">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 1.3 -->

			<!-- activity 1.4 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">1.4 ยานพาหนะ</label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_4_1']) && $userID == 102) {echo $row['r_cen1_4_1'];} elseif (!empty($row['r_cen1_4_2']) && $userID == 104) {echo $row['r_cen1_4_2'];} elseif ($check_locate != 3 && !empty($row['r1_4'])) {echo $row['r1_4'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 102 && !empty($row['r_cen1_4_1'])) || ($userID == 104 && !empty($row['r_cen1_4_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb1_4'],"4") !== false && $userID == 102) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_4" name="cen1_4" rows="2" required><?=convertName($row['cen1_4'], "3")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 102) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_4'], "3") == ""){echo "-";}else{echo convertName($row['cen1_2'], "3");}?></label>
						<?php
					}
				}
				if (strpos($row['cb1_4'],"4") !== false && $userID == 104) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_4" name="cen1_4" rows="2" required><?=convertName($row['cen1_4'], "4")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 104) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_4'], "4") == ""){echo "-";}else{echo convertName($row['cen1_4'], "4");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r1_4'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr1_4']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr1_4" name="sub_pr1_4" rows="2" required><?=$row['sub_pr1_4']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file1_4">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 1.4 -->

			<!-- activity 1.5 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">1.5 ตัวชี้วัดตามคำรับรอง</label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_5_1']) && $userID == 103) {echo $row['r_cen1_5_1'];} elseif (!empty($row['r_cen1_5_2']) && $userID == 99) {echo $row['r_cen1_5_2'];} elseif (!empty($row['r_cen1_5_3']) && $userID == 100) {echo $row['r_cen1_5_3'];} elseif ($check_locate != 3 && !empty($row['r1_5'])) {echo $row['r1_5'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 103 && !empty($row['r_cen1_5_1'])) || ($userID == 99 && !empty($row['r_cen1_5_2'])) || ($userID == 100 && !empty($row['r_cen1_5_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb1_5'],"5") !== false && $userID == 103) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพร : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_5" name="cen1_5" rows="2" required><?=convertName($row['cen1_5'], "5")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 103) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพร : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_5'], "5") == ""){echo "-";}else{echo convertName($row['cen1_5'], "5");}?></label>
						<?php
					}
				}
				if (strpos($row['cb1_5'],"6") !== false && $userID == 99) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_5" name="cen1_5" rows="2" required><?=convertName($row['cen1_5'], "6")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_5'], "6") == ""){echo "-";}else{echo convertName($row['cen1_5'], "6");}?></label>
						<?php
					}
				}
				if (strpos($row['cb1_5'],"7") !== false && $userID == 100) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen1_5" name="cen1_5" rows="2" required><?=convertName($row['cen1_5'], "7")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen1_5'], "7") == ""){echo "-";}else{echo convertName($row['cen1_5'], "7");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r1_5'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr1_5']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr1_5" name="sub_pr1_5" rows="2" required><?=$row['sub_pr1_5']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file1_5">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 1.5 -->
			<!-- close activity 1 form -->
		</div>

		<!-- activity 2 -->
		<div class="form-group row" id="r2" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<label class="col-sm-12 col-form-label bold">&emsp;2. แผนงาน/โครงการที่ส่งผลกระทบสูงต่อภารกิจหลักของกรม</label>

			<!-- activity 2.1 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">2.1 การรับตัวเด็กและเยาวชน</label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_1_1']) && $userID == 99) {echo $row['r_cen2_1_1'];} elseif (!empty($row['r_cen2_1_2']) && $userID == 105) {echo $row['r_cen2_1_2'];} elseif (!empty($row['r_cen2_1_3']) && $userID == 100) {echo $row['r_cen2_1_3'];} elseif ($check_locate != 3 && !empty($row['r2_1'])) {echo $row['r2_1'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 99 && !empty($row['r_cen2_1_1'])) || ($userID == 105 && !empty($row['r_cen2_1_2'])) || ($userID == 100 && !empty($row['r_cen2_1_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb2_1'],"6") !== false && $userID == 99) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_1" name="cen2_1" rows="2" required><?=convertName($row['cen2_1'], "6")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_1'], "6") == ""){echo "-";}else{echo convertName($row['cen2_1'], "6");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_1'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_1" name="cen2_1" rows="2" required><?=convertName($row['cen2_1'], "2")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_1'], "2") == ""){echo "-";}else{echo convertName($row['cen2_1'], "2");}?></label>
						<?php
					}
				}
				if (strpos($row['cb1_5'],"7") !== false && $userID == 100) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_1" name="cen2_1" rows="2" required><?=convertName($row['cen2_1'], "7")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_1'], "7") == ""){echo "-";}else{echo convertName($row['cen2_1'], "7");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r2_1'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr2_1']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr2_1" name="sub_pr2_1" rows="2" required><?=$row['sub_pr2_1']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file2_1">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 2.1 -->

			<!-- activity 2.2 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">2.2 <? if($locate==1){echo "การประเมินความเสี่ยงและความจำเป็น";}else{echo "การจำแนกและจัดทำแผนฝุกอบรมรายบุคคล";}?></label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_2_1']) && $userID == 99) {echo $row['r_cen2_2_1'];} elseif (!empty($row['r_cen2_2_2']) && $userID == 105) {echo $row['r_cen2_2_2'];} elseif (!empty($row['r_cen2_2_3']) && $userID == 100) {echo $row['r_cen2_2_3'];} elseif ($check_locate != 3 && !empty($row['r2_2'])) {echo $row['r2_2'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 99 && !empty($row['r_cen2_2_1'])) || ($userID == 105 && !empty($row['r_cen2_2_2'])) || ($userID == 100 && !empty($row['r_cen2_2_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb2_2'],"6") !== false && $userID == 99) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_2" name="cen2_2" rows="2" required><?=convertName($row['cen2_2'], "6")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_2'], "6") == ""){echo "-";}else{echo convertName($row['cen2_2'], "6");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_2'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_2" name="cen2_2" rows="2" required><?=convertName($row['cen2_2'], "2")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_2'], "2") == ""){echo "-";}else{echo convertName($row['cen2_2'], "2");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_2'],"7") !== false && $userID == 100) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_2" name="cen2_2" rows="2" required><?=convertName($row['cen2_2'], "7")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_2'], "7") == ""){echo "-";}else{echo convertName($row['cen2_2'], "7");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r2_2'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr2_2']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr2_2" name="sub_pr2_2" rows="2" required><?=$row['sub_pr2_2']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file2_2">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 2.2 -->

			<!-- activity 2.3 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">2.3 <? if($locate==1){echo "การส่งต่อนักวิชาชีพเพื่อประเมินเฉพาะด้าน";}else{echo "การฝึกอบรม/การบำบัด";}?></label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_3_1']) && $userID == 99) {echo $row['r_cen2_3_1'];} elseif (!empty($row['r_cen2_3_2']) && $userID == 105) {echo $row['r_cen2_3_2'];} elseif (!empty($row['r_cen2_3_3']) && $userID == 100) {echo $row['r_cen2_3_3'];} elseif ($check_locate != 3 && !empty($row['r2_3'])) {echo $row['r2_3'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 99 && !empty($row['r_cen2_3_1'])) || ($userID == 105 && !empty($row['r_cen2_3_2'])) || ($userID == 100 && !empty($row['r_cen2_3_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb2_3'],"6") !== false && $userID == 99) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_3" name="cen2_3" rows="2" required><?=convertName($row['cen2_3'], "6")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_3'], "6") == ""){echo "-";}else{echo convertName($row['cen2_3'], "6");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_3'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_3" name="cen2_3" rows="2" required><?=convertName($row['cen2_3'], "2")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_3'], "2") == ""){echo "-";}else{echo convertName($row['cen2_3'], "2");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_3'],"7") !== false && $userID == 100) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_3" name="cen2_3" rows="2" required><?=convertName($row['cen2_3'], "7")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_3'], "7") == ""){echo "-";}else{echo convertName($row['cen2_3'], "7");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r2_3'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr2_3']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr2_3" name="sub_pr2_3" rows="2" required><?=$row['sub_pr2_3']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file2_3">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 2.3 -->

			<!-- activity 2.4 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">2.4 <? if($locate==1){echo "การรายงานข้อเท็จจริง";}else{echo "เกษตรอินทรีย์";}?></label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_4_1']) && $userID == 99) {echo $row['r_cen2_4_1'];} elseif (!empty($row['r_cen2_4_2']) && $userID == 105) {echo $row['r_cen2_4_2'];} elseif ($check_locate != 3 && !empty($row['r2_4'])) {echo $row['r2_4'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 99 && !empty($row['r_cen2_4_1'])) || ($userID == 105 && !empty($row['r_cen2_4_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb2_4'],"6") !== false && $userID == 99) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_4" name="cen2_4" rows="2" required><?=convertName($row['cen2_4'], "6")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_4'], "6") == ""){echo "-";}else{echo convertName($row['cen2_4'], "6");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_4'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_4" name="cen2_4" rows="2" required><?=convertName($row['cen2_4'], "2")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_4'], "2") == ""){echo "-";}else{echo convertName($row['cen2_4'], "2");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r2_4'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr2_4']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr2_4" name="sub_pr2_4" rows="2" required><?=$row['sub_pr2_4']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file2_4">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 2.4 -->

			<!-- activity 2.5 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">2.5 <? if($locate==1){echo "การรายงานข้อเท็จจริง";}else{echo "ห้องเรียนกีฬา";}?></label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_5_1']) && $userID == 99) {echo $row['r_cen2_5_1'];} elseif (!empty($row['r_cen2_5_2']) && $userID == 105) {echo $row['r_cen2_5_2'];} elseif ($check_locate != 3 && !empty($row['r2_5'])) {echo $row['r2_5'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 99 && !empty($row['r_cen2_5_1'])) || ($userID == 105 && !empty($row['r_cen2_5_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb2_5'],"6") !== false && $userID == 99) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_5" name="cen2_5" rows="2" required><?=convertName($row['cen2_5'], "6")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_5'], "6") == ""){echo "-";}else{echo convertName($row['cen2_5'], "6");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_5'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_5" name="cen2_5" rows="2" required><?=convertName($row['cen2_5'], "2")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_5'], "2") == ""){echo "-";}else{echo convertName($row['cen2_5'], "2");}?></label>
						<?php
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r2_5'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr2_5']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr2_5" name="sub_pr2_5" rows="2" required><?=$row['sub_pr2_5']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file2_5">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 2.5 -->


			<!-- activity 2.6 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">2.6 <? if($locate==1){echo "การลงข้อมูลในระบบ CM ของเด็กและเยาวชนถูกต้องครบถ้วน";}else{echo "การจัดการศึกษาสามัญ อาชีวศึกษาและอุดมศึกษา";}?></label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_6_1']) && $userID == 99) {echo $row['r_cen2_6_1'];} elseif (!empty($row['r_cen2_6_2']) && $userID == 105) {echo $row['r_cen2_6_2'];} elseif (!empty($row['r_cen2_6_3']) && $userID == 100) {echo $row['r_cen2_6_3'];} elseif ($check_locate != 3 && !empty($row['r2_6'])) {echo $row['r2_6'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($userID == 99 && !empty($row['r_cen2_6_1'])) || ($userID == 105 && !empty($row['r_cen2_6_2'])) || ($userID == 100 && !empty($row['r_cen2_6_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if (strpos($row['cb2_6'],"6") !== false && $userID == 99) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_6" name="cen2_6" rows="2" required><?=convertName($row['cen2_6'], "6")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_6'], "6") == ""){echo "-";}else{echo convertName($row['cen2_6'], "6");}?></label>
						<?php
					}
				}
				if (strpos($row['cb2_6'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cen2_6" name="cen2_6" rows="2" required><?=convertName($row['cen2_6'], "2")?></textarea>
					</div>
					<?php
				} else {
					if ($userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_6'], "2") == ""){echo "-";}else{echo convertName($row['cen2_6'], "2");}?></label>
						<?php
					}
				}
				if ($locate == 1) {
					if (strpos($row['cb2_6'],"7") !== false && $userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen2_6" name="cen2_6" rows="2" required><?=convertName($row['cen2_6'], "7")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 100) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_6'], "7") == ""){echo "-";}else{echo convertName($row['cen2_6'], "7");}?></label>
							<?php
						}
					}
				}
			}
			?>
			<!-- province input -->
			<?php
			if ($check_locate != 3) {
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-5">
					<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
				</div>
				<?php
				if (!empty($row['r2_6'])) {
					?>
					<div class="col-sm-6"></div>
					<div class="col-sm-1"></div>
					<?php
					if ($check_locate == "3") {
						?>
						<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr2_6']?></label>
						<?php
					} else {
						?>
						<div class="col-sm-11">
							<textarea class="form-control" id="sub_pr2_6" name="sub_pr2_6" rows="2" required><?=$row['sub_pr2_6']?></textarea>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-12">
							<small class="form-text text-muted"></small>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<input type="file" class="form-control-file" name="file2_6">
							<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
						</div>
						<?php
					}
				} else {
					?>
					<label class="col-sm-6 col-form-label">-</label>
					<?php
				}
			}
			?>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><hr></div>
			<div class="col-sm-1"></div>
			<!-- close activity 2.6 -->

			<?php
			if ($locate == 2) {
				?>
				<!-- activity 2.7 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">2.7 การลงข้อมูลในระบบ TR ของเด็กและเยาวชนถูกต้อง</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_7_1']) && $userID == 99) {echo $row['r_cen2_7_1'];} elseif (!empty($row['r_cen2_7_2']) && $userID == 105) {echo $row['r_cen2_7_2'];} elseif (!empty($row['r_cen2_7_3']) && $userID == 100) {echo $row['r_cen2_7_3'];} elseif ($check_locate != 3 && !empty($row['r2_7'])) {echo $row['r2_7'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen2_7_1'])) || ($userID == 105 && !empty($row['r_cen2_7_2'])) || ($userID == 100 && !empty($row['r_cen2_7_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb2_7'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen2_7" name="cen2_7" rows="2" required><?=convertName($row['cen2_7'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_7'], "6") == ""){echo "-";}else{echo convertName($row['cen2_7'], "6");}?></label>
							<?php
						}
					}
					if (strpos($row['cb2_7'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen2_7" name="cen2_7" rows="2" required><?=convertName($row['cen2_7'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_7'], "2") == ""){echo "-";}else{echo convertName($row['cen2_7'], "2");}?></label>
							<?php
						}
					}
					if (strpos($row['cb2_7'],"7") !== false && $userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen2_7" name="cen2_7" rows="2" required><?=convertName($row['cen2_7'], "7")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 100) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen2_7'], "7") == ""){echo "-";}else{echo convertName($row['cen2_7'], "7");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r2_7'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr2_7']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr2_7" name="sub_pr2_7" rows="2" required><?=$row['sub_pr2_7']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file2_7">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 2.7 -->
				<?php
			}
			?>
			<!-- close activity 2 form -->
		</div>

		<?php
		if ($locate == 1) { // -------------------------------- check if from SP ------------------------------- //
			?>
			<!-- activity 3 from SP -->
			<div class="form-group row" id="r3" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label bold">&emsp;3. การรักษาและเพิ่มมาตรฐานการปฏิบัติงาน</label>
				<!-- activity 3.1 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.1 งานด้านคดี</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_1_1']) && $userID == 99) {echo $row['r_cen3_1_1'];} elseif (!empty($row['r_cen3_1_2']) && $userID == 105) {echo $row['r_cen3_1_2'];} elseif (!empty($row['r_cen3_1_3']) && $userID == 100) {echo $row['r_cen3_1_3'];} elseif ($check_locate != 3 && !empty($row['r3_1'])) {echo $row['r3_1'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_1_1'])) || ($userID == 105 && !empty($row['r_cen3_1_2'])) || ($userID == 100 && !empty($row['r_cen3_1_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_1'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_1" name="cen3_1" rows="2" required><?=convertName($row['cen3_1'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_1'], "6") == ""){echo "-";}else{echo convertName($row['cen3_1'], "6");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_1'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_1" name="cen3_1" rows="2" required><?=convertName($row['cen3_1'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_1'], "2") == ""){echo "-";}else{echo convertName($row['cen3_1'], "2");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_1'],"7") !== false && $userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_1" name="cen3_1" rows="2" required><?=convertName($row['cen3_1'], "7")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 100) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_1'], "7") == ""){echo "-";}else{echo convertName($row['cen3_1'], "7");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_1'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_1']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_1" name="sub_pr3_1" rows="2" required><?=$row['sub_pr3_1']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_1">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.1 -->

				<!-- activity 3.2 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.2 งานรักษาความมั่นคงปลอดภัย</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_2_1']) && $userID == 99) {echo $row['r_cen3_2_1'];} elseif (!empty($row['r_cen3_2_2']) && $userID == 105) {echo $row['r_cen3_2_2'];} elseif ($check_locate != 3 && !empty($row['r3_2'])) {echo $row['r3_2'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_2_1'])) || ($userID == 105 && !empty($row['r_cen3_2_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_2'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_2" name="cen3_2" rows="2" required><?=convertName($row['cen3_2'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_2'], "6") == ""){echo "-";}else{echo convertName($row['cen3_2'], "6");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_2'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_2" name="cen3_2" rows="2" required><?=convertName($row['cen3_2'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_2'], "2") == ""){echo "-";}else{echo convertName($row['cen3_2'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_2'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_2']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_2" name="sub_pr3_2" rows="2" required><?=$row['sub_pr3_2']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_2">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.2 -->

				<!-- activity 3.3 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.3 การควบคุมดูแลเด็กและเยาวชนในสถานควบคุม</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_3_1']) && $userID == 99) {echo $row['r_cen3_3_1'];} elseif (!empty($row['r_cen3_3_2']) && $userID == 105) {echo $row['r_cen3_3_2'];}  elseif (!empty($row['r_cen3_3_3']) && $userID == 100) {echo $row['r_cen3_3_3'];} elseif ($check_locate != 3 && !empty($row['r3_3'])) {echo $row['r3_3'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_3_1'])) || ($userID == 105 && !empty($row['r_cen3_3_2'])) || ($userID == 100 && !empty($row['r_cen3_3_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_3'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_3" name="cen3_3" rows="2" required><?=convertName($row['cen3_3'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_3'], "6") == ""){echo "-";}else{echo convertName($row['cen3_3'], "6");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_3'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_3" name="cen3_3" rows="2" required><?=convertName($row['cen3_3'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_3'], "2") == ""){echo "-";}else{echo convertName($row['cen3_3'], "2");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_3'],"7") !== false && $userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_3" name="cen3_3" rows="2" required><?=convertName($row['cen3_3'], "7")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 100) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_3'], "7") == ""){echo "-";}else{echo convertName($row['cen3_3'], "7");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_3'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_3']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_3" name="sub_pr3_3" rows="2" required><?=$row['sub_pr3_3']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_3">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.3 -->

				<!-- activity 3.4 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.4 การแก้ไขบำบัดฟื้นฟูเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_4_1']) && $userID == 99) {echo $row['r_cen3_4_1'];} elseif (!empty($row['r_cen3_4_2']) && $userID == 105) {echo $row['r_cen3_4_2'];}  elseif (!empty($row['r_cen3_4_3']) && $userID == 100) {echo $row['r_cen3_4_3'];} elseif ($check_locate != 3 && !empty($row['r3_4'])) {echo $row['r3_4'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_4_1'])) || ($userID == 105 && !empty($row['r_cen3_4_2'])) || ($userID == 100 && !empty($row['r_cen3_4_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_4'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_4" name="cen3_4" rows="2" required><?=convertName($row['cen3_4'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_4'], "6") == ""){echo "-";}else{echo convertName($row['cen3_4'], "6");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_4'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_4" name="cen3_4" rows="2" required><?=convertName($row['cen3_4'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_4'], "2") == ""){echo "-";}else{echo convertName($row['cen3_4'], "2");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_4'],"7") !== false && $userID == 100) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_4" name="cen3_4" rows="2" required><?=convertName($row['cen3_4'], "7")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 100) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_4'], "7") == ""){echo "-";}else{echo convertName($row['cen3_4'], "7");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_4'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_4']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_4" name="sub_pr3_4" rows="2" required><?=$row['sub_pr3_4']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_4">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.4 -->

				<!-- activity 3.5 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.5 การป้องกันและปราบปรามการทุจริตประพฤติมิชอบ</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_5_1']) && $userID == 101) {echo $row['r_cen3_5_1'];} elseif (!empty($row['r_cen3_5_2']) && $userID == 105) {echo $row['r_cen3_5_2'];} elseif ($check_locate != 3 && !empty($row['r3_5'])) {echo $row['r3_5'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 101 && !empty($row['r_cen3_5_1'])) || ($userID == 105 && !empty($row['r_cen3_5_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_5'],"1") !== false && $userID == 101) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_5" name="cen3_5" rows="2" required><?=convertName($row['cen3_5'], "1")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 101) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_5'], "1") == ""){echo "-";}else{echo convertName($row['cen3_5'], "1");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_5'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_5" name="cen3_5" rows="2" required><?=convertName($row['cen3_5'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_5'], "2") == ""){echo "-";}else{echo convertName($row['cen3_5'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_5'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_5']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_5" name="sub_pr3_5" rows="2" required><?=$row['sub_pr3_5']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_5">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.5 -->

				<!-- activity 3.6 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.6 การสนับสนุนของเครือข่าย</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_6_1']) && $userID == 99) {echo $row['r_cen3_6_1'];} elseif (!empty($row['r_cen3_6_2']) && $userID == 105) {echo $row['r_cen3_6_2'];} elseif ($check_locate != 3 && !empty($row['r3_6'])) {echo $row['r3_6'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_6_1'])) || ($userID == 105 && !empty($row['r_cen3_6_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_6'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_6" name="cen3_6" rows="2" required><?=convertName($row['cen3_6'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_6'], "6") == ""){echo "-";}else{echo convertName($row['cen3_6'], "6");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_6'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_6" name="cen3_6" rows="2" required><?=convertName($row['cen3_6'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_6'], "2") == ""){echo "-";}else{echo convertName($row['cen3_6'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_6'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_6']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_6" name="sub_pr3_6" rows="2" required><?=$row['sub_pr3_6']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_6">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.6 -->

				<!-- activity 3.7 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.7 การประหยัดพลังงานและทรัพยากร</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_7_1']) && $userID == 104) {echo $row['r_cen3_7_1'];} elseif (!empty($row['r_cen3_7_2']) && $userID == 103) {echo $row['r_cen3_7_2'];} elseif (!empty($row['r_cen3_7_3']) && $userID == 105) {echo $row['r_cen3_7_3'];} elseif ($check_locate != 3 && !empty($row['r3_7'])) {echo $row['r3_7'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 104 && !empty($row['r_cen3_7_1'])) || ($userID == 103 && !empty($row['r_cen3_7_2'])) || ($userID == 105 && !empty($row['r_cen3_7_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_7'],"4") !== false && $userID == 104) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_7" name="cen3_7" rows="2" required><?=convertName($row['cen3_7'], "4")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 104) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_7'], "4") == ""){echo "-";}else{echo convertName($row['cen3_7'], "4");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_7'],"5") !== false && $userID == 103) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพร : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_7" name="cen3_7" rows="2" required><?=convertName($row['cen3_7'], "5")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 103) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_7'], "5") == ""){echo "-";}else{echo convertName($row['cen3_7'], "5");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_7'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_7" name="cen3_7" rows="2" required><?=convertName($row['cen3_7'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_7'], "2") == ""){echo "-";}else{echo convertName($row['cen3_7'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_7'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_7']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_7" name="sub_pr3_7" rows="2" required><?=$row['sub_pr3_7']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_7">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.7 -->

				<!-- activity 3.8 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.8 การดำเนินงานด้านการเงินการคลัง</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_8_1']) && $userID == 104) {echo $row['r_cen3_8_1'];} elseif (!empty($row['r_cen3_8_2']) && $userID == 105) {echo $row['r_cen3_8_2'];} elseif ($check_locate != 3 && !empty($row['r3_8'])) {echo $row['r3_8'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 104 && !empty($row['r_cen3_8_1'])) || ($userID == 105 && !empty($row['r_cen3_8_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_8'],"4") !== false && $userID == 104) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_8" name="cen3_8" rows="2" required><?=convertName($row['cen3_8'], "4")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 104) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_8'], "4") == ""){echo "-";}else{echo convertName($row['cen3_8'], "4");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_8'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_8" name="cen3_8" rows="2" required><?=convertName($row['cen3_8'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_8'], "2") == ""){echo "-";}else{echo convertName($row['cen3_8'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_8'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_8']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_8" name="sub_pr3_8" rows="2" required><?=$row['sub_pr3_8']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_8">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.8 -->

				<!-- activity 3.9 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.9 การอำนวยความยุติธรรมและการป้องกันปัญหาเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_9_1']) && $userID == 99) {echo $row['r_cen3_9_1'];} elseif ($check_locate != 3 && !empty($row['r3_9'])) {echo $row['r3_9'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_9_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_9'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_9" name="cen3_9" rows="2" required><?=convertName($row['cen3_9'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_9'], "6") == ""){echo "-";}else{echo convertName($row['cen3_9'], "6");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_9'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_9']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_9" name="sub_pr3_9" rows="2" required><?=$row['sub_pr3_9']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_9">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.9 -->

				<!-- activity 3.10 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.10 การสนับสนุนภารกิจของสถานพินิจ</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_10_1']) && $userID == 99) {echo $row['r_cen3_10_1'];} elseif ($check_locate != 3 && !empty($row['r3_10'])) {echo $row['r3_10'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- no activity_center -->

				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_10'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_10']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_10" name="sub_pr3_10" rows="2" required><?=$row['sub_pr3_10']?></textarea>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.10 -->
				<label class="col-sm-1 col-form-label"></label>
				<!-- close activity 3 form SP -->
			</div>
			<?php
		} else { // ------------------------------- check if from TR ------------------------------- //
			?>
			<!-- activity 3 from TR -->
			<div class="form-group row" id="r3" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label bold">&emsp;3. การรักษาและเพิ่มมาตรฐานการปฏิบัติงาน</label>
				<!-- activity 3.1 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.1 การรังานรักษาความมั่นคงปลอดภัย</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_1_1']) && $userID == 99) {echo $row['r_cen3_1_1'];} elseif (!empty($row['r_cen3_1_2']) && $userID == 105) {echo $row['r_cen3_1_2'];} elseif ($check_locate != 3 && !empty($row['r3_1'])) {echo $row['r3_1'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_1_1'])) || ($userID == 105 && !empty($row['r_cen3_1_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
					if (strpos($row['cb3_1'],"6") !== false && $userID == 99) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_1" name="cen3_1" rows="2" required><?=convertName($row['cen3_1'], "6")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_1'], "6") == ""){echo "-";}else{echo convertName($row['cen3_1'], "6");}?></label>
							<?php
						}
					}
					if (strpos($row['cb3_1'],"2") !== false && $userID == 105) {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<div class="col-sm-9">
							<textarea class="form-control" id="cen3_1" name="cen3_1" rows="2" required><?=convertName($row['cen3_1'], "2")?></textarea>
						</div>
						<?php
					} else {
						if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_1'], "2") == ""){echo "-";}else{echo convertName($row['cen3_1'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_1'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_1']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_1" name="sub_pr3_1" rows="2" required><?=$row['sub_pr3_1']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_1">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.1 -->

				<!-- activity 3.2 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.2 การบริการที่เป็นมิตรแก่เด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_2_1']) && $userID == 99) {echo $row['r_cen3_2_1'];} elseif (!empty($row['r_cen3_2_2']) && $userID == 105) {echo $row['r_cen3_2_2'];} elseif (!empty($row['r_cen3_2_3']) && $userID == 100) {echo $row['r_cen3_2_3'];} elseif ($check_locate != 3 && !empty($row['r3_2'])) {echo $row['r3_2'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_2_1'])) || ($userID == 105 && !empty($row['r_cen3_2_2'])) || ($userID == 100 && !empty($row['r_cen3_2_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_2'],"6") !== false && $userID == 99) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_2" name="cen3_2" rows="2" required><?=convertName($row['cen3_2'], "6")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_2'], "6") == ""){echo "-";}else{echo convertName($row['cen3_2'], "6");}?></label>
							<?php
						}
					}
							if (strpos($row['cb3_2'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_2" name="cen3_2" rows="2" required><?=convertName($row['cen3_2'], "2")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_2'], "2") == ""){echo "-";}else{echo convertName($row['cen3_2'], "2");}?></label>
							<?php
						}
					}
							if (strpos($row['cb3_2'],"7") !== false && $userID == 100) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_2" name="cen3_2" rows="2" required><?=convertName($row['cen3_2'], "7")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 100) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_2'], "7") == ""){echo "-";}else{echo convertName($row['cen3_2'], "7");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_2'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_2']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_2" name="sub_pr3_2" rows="2" required><?=$row['sub_pr3_2']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_2">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.2 -->

				<!-- activity 3.3 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.3 การรับตัวเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_3_1']) && $userID == 99) {echo $row['r_cen3_3_1'];} elseif (!empty($row['r_cen3_3_2']) && $userID == 105) {echo $row['r_cen3_3_2'];} elseif ($check_locate != 3 && !empty($row['r3_3'])) {echo $row['r3_3'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_3_1'])) || ($userID == 105 && !empty($row['r_cen3_3_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_3'],"6") !== false && $userID == 99) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_3" name="cen3_3" rows="2" required><?=convertName($row['cen3_3'], "6")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_3'], "6") == ""){echo "-";}else{echo convertName($row['cen3_3'], "6");}?></label>
							<?php
						}
					}
							if (strpos($row['cb3_3'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_3" name="cen3_3" rows="2" required><?=convertName($row['cen3_3'], "2")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_3'], "2") == ""){echo "-";}else{echo convertName($row['cen3_3'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_3'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_3']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_3" name="sub_pr3_3" rows="2" required><?=$row['sub_pr3_3']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_3">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.3 -->

				<!-- activity 3.4 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.4 การบำบัดแก้ไขฟื้นฟูเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_4_1']) && $userID == 99) {echo $row['r_cen3_4_1'];} elseif (!empty($row['r_cen3_4_2']) && $userID == 105) {echo $row['r_cen3_4_2'];} elseif (!empty($row['r_cen3_4_3']) && $userID == 100) {echo $row['r_cen3_4_3'];} elseif ($check_locate != 3 && !empty($row['r3_4'])) {echo $row['r3_4'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_4_1'])) || ($userID == 105 && !empty($row['r_cen3_4_2'])) || ($userID == 100 && !empty($row['r_cen3_4_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_4'],"6") !== false && $userID == 99) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_4" name="cen3_4" rows="2" required><?=convertName($row['cen3_4'], "6")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_4'], "6") == ""){echo "-";}else{echo convertName($row['cen3_4'], "6");}?></label>
							<?php
						}
					}
							if (strpos($row['cb3_4'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_4" name="cen3_4" rows="2" required><?=convertName($row['cen3_4'], "2")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_4'], "2") == ""){echo "-";}else{echo convertName($row['cen3_4'], "2");}?></label>
							<?php
						}
					}
							if (strpos($row['cb3_4'],"7") !== false && $userID == 100) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_4" name="cen3_4" rows="2" required><?=convertName($row['cen3_4'], "7")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 100) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_4'], "7") == ""){echo "-";}else{echo convertName($row['cen3_4'], "7");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_4'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_4']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_4" name="sub_pr3_4" rows="2" required><?=$row['sub_pr3_4']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_4">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.4 -->

				<!-- activity 3.5 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.5 การประชุมคณะกรรมการสหวิชาชีพ</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_5_1']) && $userID == 99) {echo $row['r_cen3_5_1'];} elseif (!empty($row['r_cen3_5_2']) && $userID == 105) {echo $row['r_cen3_5_2'];} elseif (!empty($row['r_cen3_5_3']) && $userID == 100) {echo $row['r_cen3_5_3'];} elseif ($check_locate != 3 && !empty($row['r3_5'])) {echo $row['r3_5'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_5_1'])) || ($userID == 105 && !empty($row['r_cen3_5_2'])) || ($userID == 100 && !empty($row['r_cen3_5_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_5'],"6") !== false && $userID == 99) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_5" name="cen3_5" rows="2" required><?=convertName($row['cen3_5'], "6")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_5'], "6") == ""){echo "-";}else{echo convertName($row['cen3_5'], "6");}?></label>
							<?php
						}
					}
							if (strpos($row['cb3_5'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_5" name="cen3_5" rows="2" required><?=convertName($row['cen3_5'], "2")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_5'], "2") == ""){echo "-";}else{echo convertName($row['cen3_5'], "2");}?></label>
							<?php
						}
						}
							if (strpos($row['cb3_5'],"7") !== false && $userID == 100) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_5" name="cen3_5" rows="2" required><?=convertName($row['cen3_5'], "7")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 100) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_5'], "7") == ""){echo "-";}else{echo convertName($row['cen3_5'], "7");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_5'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_5']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_5" name="sub_pr3_5" rows="2" required><?=$row['sub_pr3_5']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_5">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.5 -->


				<!-- activity 3.6 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.6 การติดตามภายหลังปล่อย</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_6_1']) && $userID == 99) {echo $row['r_cen3_6_1'];} elseif (!empty($row['r_cen3_6_2']) && $userID == 105) {echo $row['r_cen3_6_2'];} elseif ($check_locate != 3 && !empty($row['r3_6'])) {echo $row['r3_6'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_6_1'])) || ($userID == 105 && !empty($row['r_cen3_6_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_6'],"6") !== false && $userID == 99) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_6" name="cen3_6" rows="2" required><?=convertName($row['cen3_6'], "6")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_6'], "6") == ""){echo "-";}else{echo convertName($row['cen3_6'], "6");}?></label>
							<?php
						}
					}
							if (strpos($row['cb3_6'],"2") !== false && $userID == 105) {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_6" name="cen3_6" rows="2" required><?=convertName($row['cen3_6'], "2")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 105) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_6'], "2") == ""){echo "-";}else{echo convertName($row['cen3_6'], "2");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_6'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_6']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_6" name="sub_pr3_6" rows="2" required><?=$row['sub_pr3_6']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_6">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.6 -->

				<!-- activity 3.7 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.7 การดำเนินแงานป้องกันและปราบปรามการทุจริตประพฤติมิชอบ</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_7_1']) && $userID == 101) {echo $row['r_cen3_7_1'];} elseif ($check_locate != 3 && !empty($row['r3_7'])) {echo $row['r3_7'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 101 && !empty($row['r_cen3_7_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_7'],"1") !== false && $userID == 101) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_7" name="cen3_7" rows="2" required><?=convertName($row['cen3_7'], "1")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 101) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_7'], "1") == ""){echo "-";}else{echo convertName($row['cen3_7'], "1");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_7'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_7']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_7" name="sub_pr3_7" rows="2" required><?=$row['sub_pr3_7']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_7">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.7 -->

				<!-- activity 3.8 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.8 การสนับสนุนดำเนินงานของเครือข่าย</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_8_1']) && $userID == 99) {echo $row['r_cen3_8_1'];} elseif ($check_locate != 3 && !empty($row['r3_8'])) {echo $row['r3_8'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 99 && !empty($row['r_cen3_8_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_8'],"6") !== false && $userID == 99) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_8" name="cen3_8" rows="2" required><?=convertName($row['cen3_8'], "6")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 99) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_8'], "6") == ""){echo "-";}else{echo convertName($row['cen3_8'], "6");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_8'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_8']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_8" name="sub_pr3_8" rows="2" required><?=$row['sub_pr3_8']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_8">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.8 -->

				<!-- activity 3.9 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.9 การประหยัดพลังงาน</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_9_1']) && $userID == 104) {echo $row['r_cen3_9_1'];} elseif ($check_locate != 3 && !empty($row['r3_9'])) {echo $row['r3_9'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 104 && !empty($row['r_cen3_9_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_9'],"4") !== false && $userID == 104) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_9" name="cen3_9" rows="2" required><?=convertName($row['cen3_9'], "4")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 104) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_9'], "4") == ""){echo "-";}else{echo convertName($row['cen3_9'], "4");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_9'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_9']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_9" name="sub_pr3_9" rows="2" required><?=$row['sub_pr3_9']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_9">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.9 -->

				<!-- activity 3.10 -->
				<div class="col-sm-1"></div>
				<label class="col-sm-11 col-form-label bold">3.10 การเงินการคลัง</label>
				<div class="col-sm-1"></div>
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_10_1']) && $userID == 104) {echo $row['r_cen3_10_1'];} elseif ($check_locate != 3 && !empty($row['r3_10'])) {echo $row['r3_10'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($userID == 104 && !empty($row['r_cen3_10_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if (strpos($row['cb3_10'],"4") !== false && $userID == 104) {
							?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
							<div class="col-sm-9">
								<textarea class="form-control" id="cen3_10" name="cen3_10" rows="2" required><?=convertName($row['cen3_10'], "4")?></textarea>
							</div>
							<?php
						} else {
							if ($userID == 104) {
							?>
							<label class="col-sm-9 col-form-label cut-word"><?if(convertName($row['cen3_10'], "4") == ""){echo "-";}else{echo convertName($row['cen3_10'], "10");}?></label>
							<?php
						}
					}
				}
				?>
				<!-- province input -->
				<?php
				if ($check_locate != 3) {
					?>
					<div class="col-sm-1"></div>
					<div class="col-sm-5">
						<label class="col-form-label bold">ผลการดำเนินงานของหน่วยรับการตรวจ :</label>
					</div>
					<?php
					if (!empty($row['r3_10'])) {
						?>
						<div class="col-sm-6"></div>
						<div class="col-sm-1"></div>
						<?php
						if ($check_locate == "3") {
							?>
							<label class="col-sm-11 col-form-label cut-word"><?=$row['sub_pr3_10']?></label>
							<?php
						} else {
							?>
							<div class="col-sm-11">
								<textarea class="form-control" id="sub_pr3_10" name="sub_pr3_10" rows="2" required><?=$row['sub_pr3_10']?></textarea>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-12">
								<small class="form-text text-muted"></small>
							</div>
							<div class="col-sm-1"></div>
							<div class="col-sm-11">
								<input type="file" class="form-control-file" name="file3_10">
								<small class="form-text text-muted">รองรับ ไฟล์ .pdf / .jpg เท่านั้น ขนาดไม่เกิน 10 MB / ไฟล์.</small>
							</div>
							<?php
						}
					} else {
						?>
						<label class="col-sm-6 col-form-label">-</label>
						<?php
					}
				}
				?>
				<div class="col-sm-1"></div>
				<div class="col-sm-10"><hr></div>
				<div class="col-sm-1"></div>
				<!-- close activity 3.10 -->
				<label class="col-sm-1 col-form-label"></label>
				<!-- close activity 3 form TR -->
			</div>
			<?php
		} // end if check from TR
		?>
		<hr>
		<!-- /Upload input -->
		<div class="form-group text-right">
			<div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
	<div class="text-center">
		<a href="javascript:window.close()">ปิดหน้าต่าง</a> |
		<a href="logout.php">Logout</a>
	</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script src="js/scripts.js" ></script>
<!-- JScript -->
<script>
function sumpersonnel(){
	var p1=	document.getElementById('personnel1').value;
	var p2=	document.getElementById('personnel2').value;
	var p3=	document.getElementById('personnel3').value;
	var p4=	document.getElementById('personnel4').value;
	var p5=	document.getElementById('personnel5').value;

	if(p1=="")		p1=0;
	if(p2=="")		p2=0;
	if(p3=="")		p3=0;
	if(p4=="")		p4=0;
	if(p5=="")		p5=0;

	document.getElementById('sum_personnel').value=parseInt(p1)+parseInt(p2)+parseInt(p3)+parseInt(p4)+parseInt(p5);
}

function menutrip(x) {
	x.classList.toggle("change");
}
</script>
</body>
</html>
