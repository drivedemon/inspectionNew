<?php
session_start();
error_reporting(~E_NOTICE);
if($_SESSION["user"] == "")
{
echo "Please Login";
exit();
}

if($_SESSION["permission"] != "1" && $_SESSION["permission"] != "3")
{
echo "Please Login as Admin";
exit();
}

require 'dbconnect.php';

date_default_timezone_set('Asia/Bangkok');

// set variable and query
$division = $_GET['div'];
$type = $_GET['t'];
$userID = $_GET['user'];
$userS_locate = $_SESSION['user'];

if (substr($division,0,2) == "sp") {
$check_locate = 1;
} elseif (substr($division,0,2) == "tr") {
$check_locate = 2;
} else {
$check_locate = "3";
}

if (!empty($division) && !empty($type)) {
if ($check_locate != 3) {
// code...
} else {
$sql = "SELECT d.type_locate,usl.name as divi_name,d.inspect_type,d.inspect_date,d.inspect_no,rf.track_round, ";
if ($division == 'jjs120') {
$sql .= " cr.r_cen1_5_2,cr.r_cen2_1_1,cr.r_cen2_2_1,cr.r_cen2_3_1,cr.r_cen2_4_1,cr.r_cen2_5_1,cr.r_cen2_6_1,cr.r_cen2_7_1,";
$sql .= " cr.r_cen3_1_1,cr.r_cen3_2_1,cr.r_cen3_3_1,cr.r_cen3_4_1,cr.r_cen3_5_1,cr.r_cen3_6_1,cr.r_cen3_8_1,cr.r_cen3_9_1,";
$sql .= " rf.r1_5, rf.r2_1, rf.r2_2, rf.r2_3, rf.r2_4, rf.r2_5, rf.r2_6, rf.r2_7, rf.r3_1, rf.r3_2, rf.r3_3, rf.r3_4, rf.r3_5, rf.r3_6, rf.r3_8, rf.r3_9";
} elseif ($division == 'heh100') {
$sql .= " cr.r_cen1_5_3,cr.r_cen2_1_3,cr.r_cen2_2_3,cr.r_cen2_3_3,cr.r_cen2_6_3,cr.r_cen2_7_3,cr.r_cen3_1_3,cr.r_cen3_2_3,cr.r_cen3_3_3,cr.r_cen3_4_3,cr.r_cen3_5_3,";
$sql .= " rf.r1_5, rf.r2_1, rf.r2_2, rf.r2_3, rf.r2_6, rf.r2_7, rf.r3_1, rf.r3_2, rf.r3_3, rf.r3_4, rf.r3_5";
} elseif ($division == 'hrm101') {
$sql .= " cr.r_cen1_1_1,cr.r_cen3_5_1,cr.r_cen3_7_1,";
$sql .= " rf.r1_1, rf.r3_5, rf.r3_7";
} elseif ($division == 'jjs801') {
$sql .= " cr.r_cen1_2_1,cr.r_cen1_3_1,cr.r_cen1_4_1,";
$sql .= " rf.r1_2, rf.r1_3, rf.r1_4";
} elseif ($division == 'psd001') {
$sql .= " cr.r_cen1_5_1,cr.r_cen3_7_3,";
$sql .= " rf.r1_5,rf.r3_7";
} elseif ($division == 'fin201') {
$sql .= " cr.r_cen1_2_1,cr.r_cen1_3_1,cr.r_cen1_4_1,cr.r_cen3_7_1,cr.r_cen3_8_1,cr.r_cen3_9_1,cr.r_cen3_10_1,";
$sql .= " rf.r1_2, rf.r1_3, rf.r1_4, rf.r3_7, rf.r3_8, rf.r3_9, rf.r3_10";
} elseif ($division == 'jdi100') {
$sql .= " cr.r_cen1_1_2,cr.r_cen2_1_2,cr.r_cen2_2_2,cr.r_cen2_3_2,cr.r_cen2_4_2,cr.r_cen2_5_2,cr.r_cen2_6_2,cr.r_cen2_7_2,cr.r_cen3_1_2,cr.r_cen3_2_2,cr.r_cen3_3_2,cr.r_cen3_4_2,cr.r_cen3_5_2,cr.r_cen3_6_2,cr.r_cen3_7_2,cr.r_cen3_8_2,";
$sql .= " rf.r1_1, rf.r2_1, rf.r2_2, rf.r2_3, rf.r2_4, rf.r2_5, rf.r2_6, rf.r2_7, rf.r3_1, rf.r3_2, rf.r3_3, rf.r3_4, rf.r3_5, rf.r3_6, rf.r3_7, rf.r3_8";
}
$sql .= " FROM data d, inspector ins, userlogin usl, title t, center_reason cr, report_follow rf WHERE rf.division = usl.username and d.inspector = ins.id and t.id = ins.titlename and d.center_id = cr.id and d.id = rf.data_id and rf.division='$division' and rf.track_round='$type'";
}
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
echo "$sql";

$locate = (!empty($row['type_locate']))?$row['type_locate']:'';
$keylocate = $locate=="1"? "sp":'tr';
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

	<title>ข้อมูลผลการดำเนินงานของหน่วยรับการตรวจ</title>

</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3><img src="./images/hd-13.jpg" width="1000" height="150"></h3>
		<h3>ข้อมูลผลการดำเนินงานของหน่วยรับการตรวจ <?=$row['divi_name']?></h3>
		<h4>รอบการติดตามครั้งที่ <?=$row['track_round']?></h4>
	</div>
	<!-- Form -->
	<div class="container p-2" style="max-width:800px;">
		<!-- <form name="report" action="" method="post" enctype="multipart/form-data" id="report-form"> -->
		<hr>
		<!-- ==================================================== tab 1 ==================================================== -->
		<!-- activity 1 -->
		<div class="form-group row" id="r1" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<label class="col-sm-12 col-form-label bold"><li>สรุปข้อสังเกต/ความเสี่ยง</li></label>
			<label class="col-sm-12 col-form-label bold">&emsp;1. ข้อมูลทั่วไป</label>
			<!-- activity 1.1 -->
			<div class="col-sm-1"></div>
			<label class="col-sm-11 col-form-label bold">1.1 บุคลากร</label>
			<div class="col-sm-1"></div>
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_1_1']) && $division == 'hrm101') {echo $row['r_cen1_1_1'];} elseif (!empty($row['r_cen1_1_2']) && $division == 'jdi100') {echo $row['r_cen1_1_2'];} elseif ($check_locate != 3 && !empty($row['r1_1'])) {echo $row['r1_1'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'hrm101' && !empty($row['r_cen1_1_1'])) || ($division == 'jdi100' && !empty($row['r_cen1_1_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if ($division == 'hrm101') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_1'])){echo "-";}else{echo $row['r1_1'];}?></label>
					<?php
				} elseif ($division == 'jdi100') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_1'])){echo "-";}else{echo $row['r1_1'];}?></label>
					<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_2_1']) && $division == 'jjs801') {echo $row['r_cen1_2_1'];} elseif (!empty($row['r_cen1_2_2']) && $division == 'fin201') {echo $row['r_cen1_2_2'];} elseif ($check_locate != 3 && !empty($row['r1_2'])) {echo $row['r1_2'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs801' && !empty($row['r_cen1_2_1'])) || ($division == 'fin201' && !empty($row['r_cen1_2_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if ($division == 'jjs801') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_2'])){echo "-";}else{echo $row['r1_2'];}?></label>
					<?php
				}	elseif ($division == 'fin201') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_2'])){echo "-";}else{echo $row['r1_2'];}?></label>
					<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_3_1']) && $division == 'jjs801') {echo $row['r_cen1_3_1'];} elseif (!empty($row['r_cen1_3_2']) && $division == 'fin201') {echo $row['r_cen1_3_2'];} elseif ($check_locate != 3 && !empty($row['r1_3'])) {echo $row['r1_3'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs801' && !empty($row['r_cen1_3_1'])) || ($division == 'fin201' && !empty($row['r_cen1_3_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if ($division == 'jjs801') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_3'])){echo "-";}else{echo $row['r1_3'];}?></label>
					<?php
				}	 elseif ($division == 'fin201') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_3'])){echo "-";}else{echo $row['r1_3'];}?></label>
					<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_4_1']) && $division == 'jjs801') {echo $row['r_cen1_4_1'];} elseif (!empty($row['r_cen1_4_2']) && $division == 'fin201') {echo $row['r_cen1_4_2'];} elseif ($check_locate != 3 && !empty($row['r1_4'])) {echo $row['r1_4'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs801' && !empty($row['r_cen1_4_1'])) || ($division == 'fin201' && !empty($row['r_cen1_4_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if ($division == 'jjs801') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- แผน : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_4'])){echo "-";}else{echo $row['r1_4'];}?></label>
					<?php
				}elseif ($division == 'fin201') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_4'])){echo "-";}else{echo $row['r1_4'];}?></label>
					<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen1_5_1']) && $division == 'psd001') {echo $row['r_cen1_5_1'];} elseif (!empty($row['r_cen1_5_2']) && $division == 'jjs120') {echo $row['r_cen1_5_2'];} elseif (!empty($row['r_cen1_5_3']) && $division == 'heh100') {echo $row['r_cen1_5_3'];} elseif ($check_locate != 3 && !empty($row['r1_5'])) {echo $row['r1_5'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'psd001' && !empty($row['r_cen1_5_1'])) || ($division == 'jjs120' && !empty($row['r_cen1_5_2'])) || ($division == 'heh100' && !empty($row['r_cen1_5_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
				if ($division == 'psd001') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพร : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_5'])){echo "-";}else{echo $row['r1_5'];}?></label>
					<?php
				} elseif ($division == 'jjs120') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_5'])){echo "-";}else{echo $row['r1_5'];}?></label>
					<?php
				} elseif ($division == 'heh100') {
					?>
					<div class="col-sm-1"></div>
					<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
					<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r1_5'])){echo "-";}else{echo $row['r1_5'];}?></label>
					<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_1_1']) && $division == 'jjs120') {echo $row['r_cen2_1_1'];} elseif (!empty($row['r_cen2_1_2']) && $division == 'jdi100') {echo $row['r_cen2_1_2'];} elseif (!empty($row['r_cen2_1_3']) && $division == 'heh100') {echo $row['r_cen2_1_3'];} elseif ($check_locate != 3 && !empty($row['r2_1'])) {echo $row['r2_1'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs120' && !empty($row['r_cen2_1_1'])) || ($division == 'jdi100' && !empty($row['r_cen2_1_2'])) || ($division == 'heh100' && !empty($row['r_cen2_1_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
					if ($division == 'jjs120') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_1'])){echo "-";}else{echo $row['r2_1'];}?></label>
						<?php
					} elseif ($division == 'jdi100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_1'])){echo "-";}else{echo $row['r2_1'];}?></label>
						<?php
					} elseif ($division == 'heh100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_1'])){echo "-";}else{echo $row['r2_1'];}?></label>
						<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_2_1']) && $division == 'jjs120') {echo $row['r_cen2_2_1'];} elseif (!empty($row['r_cen2_2_2']) && $division == 'jdi100') {echo $row['r_cen2_2_2'];} elseif (!empty($row['r_cen2_2_3']) && $division == 'heh100') {echo $row['r_cen2_2_3'];} elseif ($check_locate != 3 && !empty($row['r2_2'])) {echo $row['r2_2'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs120' && !empty($row['r_cen2_2_1'])) || ($division == 'jdi100' && !empty($row['r_cen2_2_2'])) || ($division == 'heh100' && !empty($row['r_cen2_2_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
					if ($division == 'jjs120') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_2'])){echo "-";}else{echo $row['r2_2'];}?></label>
						<?php
					} elseif ($division == 'jdi100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_2'])){echo "-";}else{echo $row['r2_2'];}?></label>
						<?php
					} elseif ($division == 'heh100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_2'])){echo "-";}else{echo $row['r2_2'];}?></label>
						<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_3_1']) && $division == 'jjs120') {echo $row['r_cen2_3_1'];} elseif (!empty($row['r_cen2_3_2']) && $division == 'jdi100') {echo $row['r_cen2_3_2'];} elseif (!empty($row['r_cen2_3_3']) && $division == 'heh100') {echo $row['r_cen2_3_3'];} elseif ($check_locate != 3 && !empty($row['r2_3'])) {echo $row['r2_3'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs120' && !empty($row['r_cen2_3_1'])) || ($division == 'jdi100' && !empty($row['r_cen2_3_2'])) || ($division == 'heh100' && !empty($row['r_cen2_3_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
					if ($division == 'jjs120') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_3'])){echo "-";}else{echo $row['r2_3'];}?></label>
						<?php
					} elseif ($division == 'jdi100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_3'])){echo "-";}else{echo $row['r2_3'];}?></label>
						<?php
					} elseif ($division == 'heh100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_3'])){echo "-";}else{echo $row['r2_3'];}?></label>
						<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_4_1']) && $division == 'jjs120') {echo $row['r_cen2_4_1'];} elseif (!empty($row['r_cen2_4_2']) && $division == 'jdi100') {echo $row['r_cen2_4_2'];} elseif ($check_locate != 3 && !empty($row['r2_4'])) {echo $row['r2_4'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs120' && !empty($row['r_cen2_4_1'])) || ($division == 'jdi100' && !empty($row['r_cen2_4_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
					if ($division == 'jdi100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_4'])){echo "-";}else{echo $row['r2_4'];}?></label>
						<?php
					} elseif ($division == 'jdi100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_4'])){echo "-";}else{echo $row['r2_4'];}?></label>
						<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_5_1']) && $division == 'jjs120') {echo $row['r_cen2_5_1'];} elseif (!empty($row['r_cen2_5_2']) && $division == 'jdi100') {echo $row['r_cen2_5_2'];} elseif ($check_locate != 3 && !empty($row['r2_5'])) {echo $row['r2_5'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs120' && !empty($row['r_cen2_5_1'])) || ($division == 'jdi100' && !empty($row['r_cen2_5_2']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
					if ($division == 'jjs120') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_5'])){echo "-";}else{echo $row['r2_5'];}?></label>
						<?php
					} elseif ($division == 'jdi100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_5'])){echo "-";}else{echo $row['r2_5'];}?></label>
						<?php
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
			<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_6_1']) && $division == 'jjs120') {echo $row['r_cen2_6_1'];} elseif (!empty($row['r_cen2_6_2']) && $division == 'jdi100') {echo $row['r_cen2_6_2'];} elseif (!empty($row['r_cen2_6_3']) && $division == 'heh100') {echo $row['r_cen2_6_3'];} elseif ($check_locate != 3 && !empty($row['r2_6'])) {echo $row['r2_6'];} else {echo "-";}?></label>
			<div class="col-sm-1"></div>
			<!-- activity_center -->
			<?php
			if ($check_locate == 3) {
				?>
				<div class="col-sm-1"></div>
				<?php
				if (($division == 'jjs120' && !empty($row['r_cen2_6_1'])) || ($division == 'jdi100' && !empty($row['r_cen2_6_2'])) || ($division == 'heh100' && !empty($row['r_cen2_6_3']))) {
					echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
				} else {
					echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
				}
					if ($division == 'jjs120') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_6'])){echo "-";}else{echo $row['r2_6'];}?></label>
						<?php
					} elseif ($division == 'jdi100') {
						?>
						<div class="col-sm-1"></div>
						<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
						<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_6'])){echo "-";}else{echo $row['r2_6'];}?></label>
						<?php
					} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_6'])){echo "-";}else{echo $row['r2_6'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen2_7_1']) && $division == 'jjs120') {echo $row['r_cen2_7_1'];} elseif (!empty($row['r_cen2_7_2']) && $division == 'jdi100') {echo $row['r_cen2_7_2'];} elseif (!empty($row['r_cen2_7_3']) && $division == 'heh100') {echo $row['r_cen2_7_3'];} elseif ($check_locate != 3 && !empty($row['r2_7'])) {echo $row['r2_7'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen2_7_1'])) || ($division == 'jdi100' && !empty($row['r_cen2_7_2'])) || ($division == 'heh100' && !empty($row['r_cen2_7_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_7'])){echo "-";}else{echo $row['r2_7'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_7'])){echo "-";}else{echo $row['r2_7'];}?></label>
							<?php
						} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r2_7'])){echo "-";}else{echo $row['r2_7'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_1_1']) && $division == 'jjs120') {echo $row['r_cen3_1_1'];} elseif (!empty($row['r_cen3_1_2']) && $division == 'jdi100') {echo $row['r_cen3_1_2'];} elseif (!empty($row['r_cen3_1_3']) && $division == 'heh100') {echo $row['r_cen3_1_3'];} elseif ($check_locate != 3 && !empty($row['r3_1'])) {echo $row['r3_1'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_1_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_1_2'])) || ($division == 'heh100' && !empty($row['r_cen3_1_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_1'])){echo "-";}else{echo $row['r3_1'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_1'])){echo "-";}else{echo $row['r3_1'];}?></label>
							<?php
						} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_1'])){echo "-";}else{echo $row['r3_1'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_2_1']) && $division == 'jjs120') {echo $row['r_cen3_2_1'];} elseif (!empty($row['r_cen3_2_2']) && $division == 'jdi100') {echo $row['r_cen3_2_2'];} elseif ($check_locate != 3 && !empty($row['r3_2'])) {echo $row['r3_2'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_2_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_2_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_2'])){echo "-";}else{echo $row['r3_2'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_2'])){echo "-";}else{echo $row['r3_2'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_3_1']) && $division == 'jjs120') {echo $row['r_cen3_3_1'];} elseif (!empty($row['r_cen3_3_2']) && $division == 'jdi100') {echo $row['r_cen3_3_2'];}  elseif (!empty($row['r_cen3_3_3']) && $division == 'heh100') {echo $row['r_cen3_3_3'];} elseif ($check_locate != 3 && !empty($row['r3_3'])) {echo $row['r3_3'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_3_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_3_2'])) || ($division == 'heh100' && !empty($row['r_cen3_3_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_3'])){echo "-";}else{echo $row['r3_3'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_3'])){echo "-";}else{echo $row['r3_3'];}?></label>
							<?php
						} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_3'])){echo "-";}else{echo $row['r3_3'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_4_1']) && $division == 'jjs120') {echo $row['r_cen3_4_1'];} elseif (!empty($row['r_cen3_4_2']) && $division == 'jdi100') {echo $row['r_cen3_4_2'];}  elseif (!empty($row['r_cen3_4_3']) && $division == 'heh100') {echo $row['r_cen3_4_3'];} elseif ($check_locate != 3 && !empty($row['r3_4'])) {echo $row['r3_4'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_4_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_4_2'])) || ($division == 'heh100' && !empty($row['r_cen3_4_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_4'])){echo "-";}else{echo $row['r3_4'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_4'])){echo "-";}else{echo $row['r3_4'];}?></label>
							<?php
						} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_4'])){echo "-";}else{echo $row['r3_4'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_5_1']) && $division == 'hrm101') {echo $row['r_cen3_5_1'];} elseif (!empty($row['r_cen3_5_2']) && $division == 'jdi100') {echo $row['r_cen3_5_2'];} elseif ($check_locate != 3 && !empty($row['r3_5'])) {echo $row['r3_5'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'hrm101' && !empty($row['r_cen3_5_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_5_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'hrm101') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_5'])){echo "-";}else{echo $row['r3_5'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_5'])){echo "-";}else{echo $row['r3_5'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_6_1']) && $division == 'jjs120') {echo $row['r_cen3_6_1'];} elseif (!empty($row['r_cen3_6_2']) && $division == 'jdi100') {echo $row['r_cen3_6_2'];} elseif ($check_locate != 3 && !empty($row['r3_6'])) {echo $row['r3_6'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_6_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_6_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_6'])){echo "-";}else{echo $row['r3_6'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_6'])){echo "-";}else{echo $row['r3_6'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_7_1']) && $division == 'fin201') {echo $row['r_cen3_7_1'];} elseif (!empty($row['r_cen3_7_2']) && $division == 'psd001') {echo $row['r_cen3_7_2'];} elseif (!empty($row['r_cen3_7_3']) && $division == 'jdi100') {echo $row['r_cen3_7_3'];} elseif ($check_locate != 3 && !empty($row['r3_7'])) {echo $row['r3_7'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'fin201' && !empty($row['r_cen3_7_1'])) || ($division == 'psd001' && !empty($row['r_cen3_7_2'])) || ($division == 'jdi100' && !empty($row['r_cen3_7_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'fin201') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_7'])){echo "-";}else{echo $row['r3_7'];}?></label>
							<?php
						}
						if ($division == 'psd001') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพร : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_7'])){echo "-";}else{echo $row['r3_7'];}?></label>
							<?php
						}
						if ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_7'])){echo "-";}else{echo $row['r3_7'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_8_1']) && $division == 'fin201') {echo $row['r_cen3_8_1'];} elseif (!empty($row['r_cen3_8_2']) && $division == 'jdi100') {echo $row['r_cen3_8_2'];} elseif ($check_locate != 3 && !empty($row['r3_8'])) {echo $row['r3_8'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'fin201' && !empty($row['r_cen3_8_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_8_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'fin201') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_8'])){echo "-";}else{echo $row['r3_8'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_8'])){echo "-";}else{echo $row['r3_8'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_9_1']) && $division == 'jjs120') {echo $row['r_cen3_9_1'];} elseif ($check_locate != 3 && !empty($row['r3_9'])) {echo $row['r3_9'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_9_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_9'])){echo "-";}else{echo $row['r3_9'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_10_1']) && $division == 'jjs120') {echo $row['r_cen3_10_1'];} elseif ($check_locate != 3 && !empty($row['r3_10'])) {echo $row['r3_10'];} else {echo "-";}?></label>
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_1_1']) && $division == 'jjs120') {echo $row['r_cen3_1_1'];} elseif (!empty($row['r_cen3_1_2']) && $division == 'jdi100') {echo $row['r_cen3_1_2'];} elseif ($check_locate != 3 && !empty($row['r3_1'])) {echo $row['r3_1'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_1_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_1_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_1'])){echo "-";}else{echo $row['r3_1'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_1'])){echo "-";}else{echo $row['r3_1'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_2_1']) && $division == 'jjs120') {echo $row['r_cen3_2_1'];} elseif (!empty($row['r_cen3_2_2']) && $division == 'jdi100') {echo $row['r_cen3_2_2'];} elseif (!empty($row['r_cen3_2_3']) && $division == 'heh100') {echo $row['r_cen3_2_3'];} elseif ($check_locate != 3 && !empty($row['r3_2'])) {echo $row['r3_2'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_2_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_2_2'])) || ($division == 'heh100' && !empty($row['r_cen3_2_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_2'])){echo "-";}else{echo $row['r3_2'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_2'])){echo "-";}else{echo $row['r3_2'];}?></label>
							<?php
						} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_2'])){echo "-";}else{echo $row['r3_2'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_3_1']) && $division == 'jjs120') {echo $row['r_cen3_3_1'];} elseif (!empty($row['r_cen3_3_2']) && $division == 'jdi100') {echo $row['r_cen3_3_2'];} elseif ($check_locate != 3 && !empty($row['r3_3'])) {echo $row['r3_3'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_3_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_3_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_3'])){echo "-";}else{echo $row['r3_3'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_3'])){echo "-";}else{echo $row['r3_3'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_4_1']) && $division == 'jjs120') {echo $row['r_cen3_4_1'];} elseif (!empty($row['r_cen3_4_2']) && $division == 'jdi100') {echo $row['r_cen3_4_2'];} elseif (!empty($row['r_cen3_4_3']) && $division == 'heh100') {echo $row['r_cen3_4_3'];} elseif ($check_locate != 3 && !empty($row['r3_4'])) {echo $row['r3_4'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_4_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_4_2'])) || ($division == 'heh100' && !empty($row['r_cen3_4_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_4'])){echo "-";}else{echo $row['r3_4'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_4'])){echo "-";}else{echo $row['r3_4'];}?></label>
							<?php
						} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_4'])){echo "-";}else{echo $row['r3_4'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_5_1']) && $division == 'jjs120') {echo $row['r_cen3_5_1'];} elseif (!empty($row['r_cen3_5_2']) && $division == 'jdi100') {echo $row['r_cen3_5_2'];} elseif (!empty($row['r_cen3_5_3']) && $division == 'heh100') {echo $row['r_cen3_5_3'];} elseif ($check_locate != 3 && !empty($row['r3_5'])) {echo $row['r3_5'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_5_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_5_2'])) || ($division == 'heh100' && !empty($row['r_cen3_5_3']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_5'])){echo "-";}else{echo $row['r3_5'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_5'])){echo "-";}else{echo $row['r3_5'];}?></label>
							<?php
						} elseif ($division == 'heh100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กองสุขภาพ : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_5'])){echo "-";}else{echo $row['r3_5'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_6_1']) && $division == 'jjs120') {echo $row['r_cen3_6_1'];} elseif (!empty($row['r_cen3_6_2']) && $division == 'jdi100') {echo $row['r_cen3_6_2'];} elseif ($check_locate != 3 && !empty($row['r3_6'])) {echo $row['r3_6'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_6_1'])) || ($division == 'jdi100' && !empty($row['r_cen3_6_2']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_6'])){echo "-";}else{echo $row['r3_6'];}?></label>
							<?php
						} elseif ($division == 'jdi100') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- JDI : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_6'])){echo "-";}else{echo $row['r3_6'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_7_1']) && $division == 'hrm101') {echo $row['r_cen3_7_1'];} elseif ($check_locate != 3 && !empty($row['r3_7'])) {echo $row['r3_7'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'hrm101' && !empty($row['r_cen3_7_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'hrm101') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กบค : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_7'])){echo "-";}else{echo $row['r3_7'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_8_1']) && $division == 'jjs120') {echo $row['r_cen3_8_1'];} elseif ($check_locate != 3 && !empty($row['r3_8'])) {echo $row['r3_8'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'jjs120' && !empty($row['r_cen3_8_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'jjs120') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- กพย : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_8'])){echo "-";}else{echo $row['r3_8'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_9_1']) && $division == 'fin201') {echo $row['r_cen3_9_1'];} elseif ($check_locate != 3 && !empty($row['r3_9'])) {echo $row['r3_9'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'fin201' && !empty($row['r_cen3_9_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'fin201') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_9'])){echo "-";}else{echo $row['r3_9'];}?></label>
							<?php
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
				<label class="col-sm-10 col-form-label cut-word">&emsp;<?php if (!empty($row['r_cen3_10_1']) && $division == 'fin201') {echo $row['r_cen3_10_1'];} elseif ($check_locate != 3 && !empty($row['r3_10'])) {echo $row['r3_10'];} else {echo "-";}?></label>
				<div class="col-sm-1"></div>
				<!-- activity_center -->
				<?php
				if ($check_locate == 3) {
					?>
					<div class="col-sm-1"></div>
					<?php
					if (($division == 'fin201' && !empty($row['r_cen3_10_1']))) {
						echo '<label class="col-sm-11 col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label>';
					} else {
						echo '<div class="col-sm-7"><label class="col-form-label bold">ผลการดำเนินงานของส่วนกลางตามข้อเสนอแนะ/ข้อสั่งการของอธิบดี : </label></div><label class="col-sm-4 col-form-label">-</label>';
					}
						if ($division == 'fin201') {
							?>
							<div class="col-sm-1"></div>
							<label class="col-sm-2 col-form-label bold">&emsp;- คลัง : </label>
							<label class="col-sm-9 col-form-label cut-word"><?if(empty($row['r3_10'])){echo "-";}else{echo $row['r3_10'];}?></label>
							<?php
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
		<div class="form-group text-left">
			<div>
				<input type="button" value="Back" onClick="javascript:history.go(-2)" class="btn btn-secondary" style="padding: 5px 60px;">
			</div>
		</div>
		<div class="text-center">
			<a href="javascript:window.close()">ปิดหน้าต่าง</a>
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
