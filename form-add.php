<?php
session_start();
error_reporting(~E_NOTICE);
if($_SESSION["user"] == "")
{
	echo "Please Login";
	exit();
}

if($_SESSION["permission"] != "1")
{
	echo "Please Login as Admin";
	exit();
}

if($_SESSION["userID"] != "1")
{
	echo "Please Login as Admin";
	exit();
}
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');

// set variable and query
$menu = $_GET['menu'];

if ($menu == "edit") {
	$id = $_GET['i'];
	$sql = "SELECT * FROM data WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);

	$csql = "SELECT * FROM center_reason WHERE id='".$row['center_id']."'";
	$cquery = mysqli_query($conn, $csql);
	$crow = mysqli_fetch_assoc($cquery);
}

$locate = (!empty($_GET['t']))?$_GET['t']:$row['type_locate'];
$keylocate = $locate=="1"? "sp":'tr';
?>
<!doctype html>
<html lang="en">

<!-- Head -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<!-- Style CSS -->
	<style>
	body{
		background-color: Ivory;
	}
	</style>

	<title>เพิ่มข้อมูลการออกตรวจราชการ</title>

</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3><img src="./images/hd-13.jpg" width="1000" height="150"></h3>
		<h3><?php if($menu=="add"){echo "เพิ่มข้อมูลการออกตรวจราชการ";}else{echo "แก้ไขข้อมูลการออกตรวจราชการ";} ?></h3>
	</div>
	<!-- Form -->
	<div class="container p-2" style="max-width:800px;">
		<div class="container p-2 text-right">
			<a href="detail-report.php?p=1" target="_blank">ดูรายงานทั้งหมด</a>
			<!--
			|
			<a href="detail-reply.php" target="_blank">ดูการตอบกลับทั้งหมด</a>
		-->
	</div>
	<form name="report" action="form-add-sent.php" method="post" enctype="multipart/form-data" id="report-form">
		<hr>
		<!-- ==================================================== tab 1 ==================================================== -->
		<!-- Text input -->
		<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<input type="hidden" name="menu" value="<?=$menu?>">
			<input type="hidden" name="locate" value="<?=$locate?>">
			<?php if (!empty($id)) {
								echo "<input type='hidden' name='inid' value='$id'>";
								echo "<input type='hidden' name='cid' value='".$row['center_id']."'>";
							}
			?>
			<label class="col-sm-12 col-form-label"></label>
			<label for="input-date_year" class="col-3 col-form-label">ปีงบประมาณ:</label>
			<div class="col-3">
				<select class="form-control" name="txtDate_year" id="input-date_year">
					<?php $current = date("Y")+543;
					for($y=2558;$y<=$current+1;$y++){ ?>
						<option <?php if($row['budget_year']==$y){echo "selected";}?> value="<?php echo $y; ?>"><?php echo $y; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-6"></div>
			<label class="col-sm-12 col-form-label"></label>
			<label for="input-date_year" class="col-3 col-form-label">ชื่อผู้ตรวจ:</label>
			<div class="col-9">
				<select class="form-control" name="txtinspector" id="inspector_d">
					<?php
					$sql_inspector = "select ins.id,ins.firstname,ins.lastname,t.title_name from inspector ins, title t where ins.titlename=t.id and mar='1'";
					$query_inspector = mysqli_query($conn,$sql_inspector);
					?>
					<?php while ($data_inspector = mysqli_fetch_assoc($query_inspector)){ ?>
						<option <?php if($row['inspector']==$data_inspector['id']){echo "selected ";}?> value="<?php echo $data_inspector['id']; ?>">
							<?php echo $data_inspector['title_name'].$data_inspector['firstname']." ".$data_inspector['lastname']; ?>
						</option>
					<?php }; ?>
				</select>
			</div>

			<label class="col-sm-12 col-form-label"></label>
			<label for="input-creator" class="col-sm-3 col-form-label">ชื่อหัวหน้าหน่วยงาน:</label>
			<div class="col-sm-9">
				<input type="text" name="txtboss_name" class="form-control" id="input-boss_name" value="<?=$row['boss_name']?>" required>
			</div>
			<label class="col-sm-12 col-form-label"></label>
			<label for="input-receiver" class="col-sm-3 col-form-label">หน่วยรับการตรวจ:</label>
			<div class="col-sm-9">
				<select class="form-control" name="txtReceiver" id="input-receiver">
					<?php
					$sql_receiver = "SELECT name,username FROM userlogin WHERE permission_group='2' and username LIKE '$keylocate%' ORDER BY name ASC";
					$query_receiver = mysqli_query($conn,$sql_receiver);
					?>
					<?php while ($data_receiver = mysqli_fetch_array($query_receiver)){ ?>
						<option <?php if($row['division']==$data_receiver['username']){echo "selected";}?> value="<?php echo $data_receiver['username']; ?>">
							<?php echo $data_receiver['name']; ?>
						</option>
					<?php }; ?>
				</select>
			</div>
			<label class="col-sm-12 col-form-label"></label>
			<label for="input-round" class="col-sm-3 col-form-label">ครั้งที่ติดตาม: </label>
			<div class="col-sm-9">
				<div class="container">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="selectedType" id="typeSelect1" value="1" <?php if($row['inspect_type']==1){echo "checked";}?> required />
						<label class="form-check-label" for="type1">กรณีปกติ</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="selectedType" id="typeSelect12" value="2" <?php if($row['inspect_type']==2){echo "checked";}?> required />
						<label class="form-check-label" for="type2">กรณีพิเศษ</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="selectedType" id="typeSelect13" value="3" <?php if($row['inspect_type']==3){echo "checked";}?> required />
						<label class="form-check-label" for="type3">กรณีบูรณาการ</label>
					</div>
				</div>
			</div>
			<!-- /Text input -->
			<label class="col-sm-12 col-form-label"></label>
			<label for="input-date_inspect" class="col-sm-3 col-form-label">วัน/เดือน/ปีที่ออกตรวจ:</label>
			<div class="col-sm-4">
				<input type="date" name="DateInspector" class="form-control" id="input-date_inspect" value="<?=$row['inspect_date']?>" required>
			</div>
			<label for="input-number" class="col-sm-2 col-form-label">รอบที่:</label>
			<div class="col-sm-3">
				<input type="text" name="txtNo" class="form-control" id="input-no" onkeypress="keyintdot()" value="<?=$row['inspect_no']?>" required>
			</div>
			<!-- /Text input -->
			<label class="col-sm-12 col-form-label"></label>
			<label for="input-number" class="col-sm-3 col-form-label">อ้างถึง ยธ:</label>
			<div class="col-sm-4">
				<input type="text" name="txtDoc" class="form-control" id="input-doc" value="<?=$row['inspect_doc']?>" required>
			</div>
			<label for="input-date_doc" class="col-sm-2 col-form-label">วันที่หนังสือ:</label>
			<div class="col-sm-3">
				<input type="date" name="DateDoc" class="form-control" id="input-date_doc" value="<?=$row['inspect_doc_date']?>" required>
			</div>
			<label class="col-sm-12 col-form-label"></label>
		</div>
		<hr>
		<!-- ==================================================== tab 2 ==================================================== -->
		<!-- /Text input -->
		<div class="form-group row">
			<label for="sum_personnel" class="col-sm-3 col-form-label">อัตรากำลัง รวม:</label>
			<div class="col-sm-3">
				<input type="text" name="txtSum" class="form-control" id="sum_personnel" readonly="readonly" style="background:#CCC; text-align:center;"value="<?=$row['personnel1']+$row['personnel2']+$row['personnel3']+$row['personnel4']+$row['personnel5']?>" required>
			</div>
			<label for="sum_personnel" class="col-sm-2 col-form-label">คน จำแนกเป็น</label>
		</div>

		<!-- /Text input -->
		<div class="form-group row"  style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<label class="col-sm-12 col-form-label"></label>
			<label for="personnel1" class="col-sm-3 col-form-label">ข้าราชการ:</label>
			<div class="col-sm-2">
				<input type="text" name="txtpersonnel1" class="form-control" style="text-align:center;" id="personnel1" onkeypress="keyintdot()" onkeyup="sumpersonnel()" value="<?=$row['personnel1']?>" required>
			</div>
			<label for="personnel1" class="col-sm-1 col-form-label">คน</label>
			<div class="col-sm-1"></div>
			<label for="personnel2" class="col-sm-2 col-form-label">ลูกจ้างประจำ:</label>
			<div class="col-sm-2">
				<input type="text" name="txtpersonnel2" class="form-control" style="text-align:center;" id="personnel2" onkeypress="keyintdot()" onkeyup="sumpersonnel()" value="<?=$row['personnel2']?>" required>
			</div>
			<label for="personnel2" class="col-sm-1 col-form-label">คน</label>

			<!-- /Text input -->
			<label class="col-sm-12 col-form-label"></label>
			<label for="personnel3" class="col-sm-3 col-form-label">พนักงานราชการ:</label>
			<div class="col-sm-2">
				<input type="text" name="txtpersonnel3" class="form-control" style="text-align:center;" id="personnel3" onkeypress="keyintdot()" onkeyup="sumpersonnel()" value="<?=$row['personnel3']?>" required>
			</div>
			<label for="personnel3" class="col-sm-1 col-form-label">คน</label>
			<div class="col-sm-1"></div>
			<label for="personnel4" class="col-sm-2 col-form-label">ลูกจ้างชั่วคราว:</label>
			<div class="col-sm-2">
				<input type="text" name="txtpersonnel4" class="form-control" style="text-align:center;" id="personnel4" onkeypress="keyintdot()" onkeyup="sumpersonnel()" value="<?=$row['personnel4']?>" required>
			</div>
			<label for="personnel4" class="col-sm-1 col-form-label">คน</label>

			<!-- /Text input -->
			<label class="col-sm-12 col-form-label"></label>
			<label for="personnel5" class="col-sm-3 col-form-label">จ้างเหมาบริการ:</label>
			<div class="col-sm-2">
				<input type="text" name="txtpersonnel5" class="form-control" style="text-align:center;" id="personnel5" onkeypress="keyintdot()" onkeyup="sumpersonnel()" value="<?=$row['personnel5']?>" required>
			</div>
			<label for="personnel5" class="col-sm-1 col-form-label">คน</label>
			<label class="col-sm-12 col-form-label"></label>
		</div>
		<!-- ==================================================== tab 3 for locate SP ==================================================== -->
		<hr>
		<?php
		if ($keylocate == "sp") { // check if keylocate == sp
			?>
			<!-- /Text input -->
			<div class="form-group row">
				<label style="font-size:18px;">ปริมาณคดีในสถานพินิจฯ (ข้อมูล ณ วันเข้ารับการตรวจ)</label>
			</div>

			<!-- /Text input -->
			<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label"></label>
				<label for="casecm" class="col-sm-3 col-form-label">คดีอาญา:</label>
				<div class="col-sm-2">
					<input type="text" name="casecm" class="form-control" style="text-align:center;" id="casecm" onkeypress="keyintdot()" value="<?=$row['cm']?>" required>
				</div>
				<label for="casecm" class="col-sm-1 col-form-label">คดี</label>
				<div class="col-sm-1"></div>
				<label for="casefc" class="col-sm-2 col-form-label">คดีครอบครัว:</label>
				<div class="col-sm-2">
					<input type="text" name="casefc" class="form-control" style="text-align:center;" id="casefc" onkeypress="keyintdot()" value="<?=$row['fc']?>" required>
				</div>
				<label for="casefc" class="col-sm-1 col-form-label">คดี</label>
				<!-- </div> -->

				<!-- /Text input -->
				<!-- <div class="form-group row"> -->
				<label class="col-sm-12 col-form-label"></label>
				<label for="casecc" class="col-sm-3 col-form-label">คดีกำกับการปกครอง:</label>
				<div class="col-sm-2">
					<input type="text" name="casecc" class="form-control" style="text-align:center;" id="casecc" onkeypress="keyintdot()" value="<?=$row['cc']?>" required>
				</div>
				<label for="casecc" class="col-sm-1 col-form-label">คดี</label>
				<label class="col-sm-12 col-form-label"></label>
			</div>
			<!-- ==================================================== tab 4 for locate SP ==================================================== -->
			<hr>
			<!-- /Text input -->
			<div class="form-group row">
				<label style="font-size:18px;">ปริมาณเด็กและเยาวชนในสถานพินิจฯ</label>
			</div>

			<!-- /Text input -->
			<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label"></label>
				<label for="casechild" class="col-sm-5 col-form-label">คดีตาม พ.ร.บ.ศาลเยาวชน พ.ศ. 2553:</label>
				<div class="col-sm-6">
					<input type="text" name="casechild" class="form-control" style="text-align:right;" id="casechild" onkeypress="keyintdot()" value="<?=$row['case53']?>" required>
				</div>
				<label for="casechild" class="col-sm-1 col-form-label">คดี</label>
				<!-- /Text input -->
				<label class="col-sm-12 col-form-label"></label>
				<label for="caserecov" class="col-sm-5 col-form-label">คดีตาม พ.ร.บ.ฟื้นฟูฯ:</label>
				<div class="col-sm-6">
					<input type="text" name="caserecov" class="form-control" style="text-align:right;" id="caserecov" onkeypress="keyintdot()" value="<?=$row['case_f']?>" required>
				</div>
				<label for="caserecov" class="col-sm-1 col-form-label">คดี</label>
				<!-- /Text input -->
				<label class="col-sm-12 col-form-label"></label>
				<label for="case_132" class="col-sm-5 col-form-label">คดีศาลมีคำสั่งมาตรา132 วรรค 2:</label>
				<div class="col-sm-6">
					<input type="text" name="case_132" class="form-control" style="text-align:right;" id="case132" onkeypress="keyintdot()" value="<?=$row['case132']?>" required>
				</div>
				<label for="case_132" class="col-sm-1 col-form-label">คดี</label>
				<!-- /Text input -->
				<label class="col-sm-12 col-form-label"></label>
				<label for="casedjop" class="col-sm-5 col-form-label">คดีศาลมีคำสั่งฝึกอบรมในสถานพินิจฯ:</label>
				<div class="col-sm-6">
					<input type="text" name="casedjop" class="form-control" style="text-align:right;" id="casedjop" onkeypress="keyintdot()" value="<?=$row['case_sp']?>" required>
				</div>
				<label for="casedjop" class="col-sm-1 col-form-label">คดี</label>
				<label class="col-sm-12 col-form-label"></label>
			</div>
			<!-- ==================================================== tab 5 for locate TR ==================================================== -->
			<hr>
			<?php
		} elseif ($keylocate == "tr") { // check if keylocate == tr
			?>
			<!-- /Text input -->
			<div class="form-group row">
				<label style="font-size:18px;">ปริมาณเด็กและเยาวชนในศูนย์ฝึกและอบรมฯ (ข้อมูล ณ วันเข้ารับการตรวจ)</label>
			</div>

			<!-- /Text input -->
			<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label"></label>
				<label for="casetr" class="col-sm-3 col-form-label">ฝึกอบรมในศูนย์ฝึก:</label>
				<div class="col-sm-2">
					<input type="text" name="casetr" class="form-control" style="text-align:right;" id="casetr" onkeypress="keyintdot()" value="<?=$row['tr1']?>" required>
				</div>
				<label for="casetr" class="col-sm-1 col-form-label">คน</label>
				<div class="col-sm-1"></div>
				<label for="caseleave" class="col-sm-2 col-form-label">ลาเยี่ยมบ้าน:</label>
				<div class="col-sm-2">
					<input type="text" name="caseleave" class="form-control" style="text-align:center;" id="caseleave" onkeypress="keyintdot()" value="<?=$row['tr2']?>" required>
				</div>
				<label for="caseleave" class="col-sm-1 col-form-label">คน</label>
				<!-- /Text input -->
				<label class="col-sm-12 col-form-label"></label>
				<label for="casehealth" style="margin-top: -8px;" class="col-sm-3 col-form-label">รักษาตัวที่สถาน<br>พยาบาล/บ้าน:</label>
				<div class="col-sm-2">
					<input type="text" name="casehealth" class="form-control" style="text-align:right;" id="casehealth" onkeypress="keyintdot()" value="<?=$row['tr3']?>" required>
				</div>
				<label for="casehealth" class="col-sm-1 col-form-label">คน</label>
				<div class="col-sm-1"></div>
				<label for="caserest" class="col-sm-2 col-form-label">พักฝึกอบรม:</label>
				<div class="col-sm-2">
					<input type="text" name="caserest" class="form-control" style="text-align:center;" id="caserest" onkeypress="keyintdot()" value="<?=$row['tr4']?>" required>
				</div>
				<label for="caserest" class="col-sm-1 col-form-label">คน</label>

				<!-- /Text input -->
				<label class="col-sm-12 col-form-label"></label>
				<label for="caseoutinday" style="margin-top: -8px;" class="col-sm-5 col-form-label">ออกไปศึกษา/ฝึกอาชีพภายนอก<br>แบบเช้าไปเย็นกลับ:</label>
				<div class="col-sm-6">
					<input type="text" name="caseoutinday" class="form-control" style="text-align:right;" id="caseoutinday" onkeypress="keyintdot()" value="<?=$row['tr5']?>" required>
				</div>
				<label for="caseoutinday" class="col-sm-1 col-form-label">คน</label>

				<!-- /Text input -->
				<label class="col-sm-12 col-form-label"></label>
				<label for="caseoutallday" style="margin-top: -8px;" class="col-sm-5 col-form-label">ออกไปศึกษา/ฝึกอาชีพภายนอก<br>แบบพักค้างคืนข้างนอก:</label>
				<div class="col-sm-6">
					<input type="text" name="caseoutallday" class="form-control" style="text-align:right;" id="caseoutallday" onkeypress="keyintdot()" value="<?=$row['tr6']?>" required>
				</div>
				<label for="caseoutallday" class="col-sm-1 col-form-label">คน</label>
			</div>
			<!-- ==================================================== tab 6 for locate TR ==================================================== -->
			<hr>
			<!-- /Text input -->
			<div class="form-group row">
				<label style="font-size:18px;">ปริมาณเด็กและเยาวชนที่ถูกจำหน่ายออกจากศูนย์ฝึกและอบรมฯ</label>
			</div>

			<!-- /Text input -->
			<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label"></label>
				<label for="casedead" class="col-sm-3 col-form-label">เสียชีวิต:</label>
				<div class="col-sm-2">
					<input type="text" name="casedead" class="form-control" style="text-align:right;" id="casedead" onkeypress="keyintdot()" value="<?=$row['tr7']?>" required>
				</div>
				<label for="casedead" class="col-sm-1 col-form-label">คน</label>
				<div class="col-sm-1"></div>
				<label for="caseescape" class="col-sm-2 col-form-label">หลบหนี	:</label>
				<div class="col-sm-2">
					<input type="text" name="caseescape" class="form-control" style="text-align:center;" id="caseescape" onkeypress="keyintdot()" value="<?=$row['tr8']?>" required>
				</div>
				<label for="caseescape" class="col-sm-1 col-form-label">คน</label>
				<label class="col-sm-12 col-form-label"></label>
			</div>
			<!-- ==================================================== tab 7 ==================================================== -->
			<hr>
			<?php
		} // end if keylocate == tr
		?>
		<!-- /Text -->
		<div class="form-group row">
			<label style="font-size:18px;">สรุปข้อสังเกต/ความเสี่ยง</label>
		</div>
		<!-- activity 1 -->
		<div class="form-group row" id="r1" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<label class="col-sm-12 col-form-label" style="cursor: pointer;" >1. ข้อมูลทั่วไป</label>
			<!-- activity 1.1 -->
			<div class="col-sm-1"></div>
			<label for="r1-1" class="col-sm-11 col-form-label">1.1 บุคลากร</label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r1-1" name="r1-1" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r1_1']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onclick="hide_frm('1-1-1');" name="cb1-1[]" id="reason1-1-1" value="1" <?php if(strpos($row['cb1_1'],"1")!==false){echo "checked";}?>>
				<label class="form-check-label">กบค</label>
			</div>
			<div class="col-sm-6" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-1-2');" name="cb1-1[]" id="reason1-1-2" value="2" <?php if(strpos($row['cb1_1'],"2")!==false){echo "checked";}?>>
				<label class="form-check-label">JDI</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-1-1"  name="r1-1-1" rows="2" placeholder="กบค" required <?php if(strpos($row['cb1_1'],"1")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_1_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-1-2"  name="r1-1-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb1_1'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_1_2']?></textarea>
			</div>
			<!-- close activity 1.1 -->
			<!-- activity 1.2 -->
			<div class="col-sm-1"></div>
			<label for="r1-2" class="col-sm-11 col-form-label">1.2 งบประมาณ</label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r1-2" name="r1-2" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r1_2']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-2-1');" name="cb1-2[]" id="reason1-2-1" value="3" <?php if(strpos($row['cb1_2'],"3")!==false){echo "checked";}?>>
				<label class="form-check-label">แผน</label>
			</div>
			<div class="col-sm-6" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-2-2');" name="cb1-2[]" id="reason1-2-2" value="4" <?php if(strpos($row['cb1_2'],"4")!==false){echo "checked";}?>>
				<label class="form-check-label">คลัง</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-2-1" name="r1-2-1" rows="2" placeholder="แผน" required <?php if(strpos($row['cb1_2'],"3")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_2_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-2-2" name="r1-2-2" rows="2" placeholder="คลัง" required <?php if(strpos($row['cb1_2'],"4")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_2_2']?></textarea>
			</div>
			<!-- close activity 1.2 -->
			<!-- activity 1.3 -->
			<div class="col-sm-1"></div>
			<label for="r1-3" class="col-sm-11 col-form-label">1.3 อาคารสถานที่</label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r1-3" name="r1-3" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r1_3']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-3-1');" name="cb1-3[]" id="reason1-3-1" value="3" <?php if(strpos($row['cb1_3'],"3")!==false){echo "checked";}?>>
				<label class="form-check-label">แผน</label>
			</div>
			<div class="col-sm-6" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-3-2');" name="cb1-3[]" id="reason1-3-2" value="4" <?php if(strpos($row['cb1_3'],"4")!==false){echo "checked";}?>>
				<label class="form-check-label">คลัง</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-3-1" name="r1-3-1" rows="2" placeholder="แผน" required <?php if(strpos($row['cb1_3'],"3")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_3_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-3-2" name="r1-3-2" rows="2" placeholder="คลัง" required <?php if(strpos($row['cb1_3'],"4")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_3_2']?></textarea>
			</div>
			<!-- close activity 1.3 -->
			<!-- activity 1.4 -->
			<div class="col-sm-1"></div>
			<label for="r1-4" class="col-sm-11 col-form-label">1.4 ยานพาหนะ</label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r1-4" name="r1-4" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r1_4']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-4-1');" name="cb1-4[]" id="reason1-4-1" value="3" <?php if(strpos($row['cb1_4'],"3")!==false){echo "checked";}?>>
				<label class="form-check-label">แผน</label>
			</div>
			<div class="col-sm-6" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-4-2');" name="cb1-4[]" id="reason1-4-2" value="4" <?php if(strpos($row['cb1_4'],"4")!==false){echo "checked";}?>>
				<label class="form-check-label">คลัง</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-4-1" name="r1-4-1" rows="2" placeholder="แผน" required <?php if(strpos($row['cb1_4'],"3")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_4_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-4-2" name="r1-4-2" rows="2" placeholder="คลัง" required <?php if(strpos($row['cb1_4'],"4")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_4_2']?></textarea>
			</div>
			<!-- close activity 1.4 -->
			<!-- activity 1.5 -->
			<div class="col-sm-1"></div>
			<label for="r1-5" class="col-sm-11 col-form-label">1.5 ตัวชี้วัดตามคำรับรอง</label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r1-5" name="r1-5" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r1_5']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-5-1');" name="cb1-5[]" id="reason1-5-1" value="5" <?php if(strpos($row['cb1_5'],"5")!==false){echo "checked";}?>>
				<label class="form-check-label">กพร</label>
			</div>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-5-2');" name="cb1-5[]" id="reason1-5-2" value="6" <?php if(strpos($row['cb1_5'],"6")!==false){echo "checked";}?>>
				<label class="form-check-label">กพย</label>
			</div>
			<div class="col-sm-5" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('1-5-3');" name="cb1-5[]" id="reason1-5-3" value="7" <?php if(strpos($row['cb1_5'],"7")!==false){echo "checked";}?>>
				<label class="form-check-label">กองสุขภาพ</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-5-1" name="r1-5-1" rows="2" placeholder="กพร" required <?php if(strpos($row['cb1_5'],"5")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_5_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-5-2" name="r1-5-2" rows="2" placeholder="กพย" required <?php if(strpos($row['cb1_5'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_5_2']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide1-5-3" name="r1-5-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb1_5'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen1_5_3']?></textarea>
				<small class="form-text"></small>
			</div>
			<!-- close activity 1.5 -->
			<!-- close activity 1 form -->
		</div>

		<!-- activity 2 -->
		<div class="form-group row" id="r2" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
			<label class="col-sm-12 col-form-label" style="cursor: pointer;" >2. แผนงาน/โครงการที่ส่งผลกระทบสูงต่อภารกิจหลักของกรม</label>
			<!-- activity 2.1 -->
			<div class="col-sm-1"></div>
			<label for="r2-1" class="col-sm-11 col-form-label">2.1 การรับตัวเด็กและเยาวชน</label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r2-1" name="r2-1" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r2_1']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-1-1');" name="cb2-1[]" id="reason2-1-1" value="6" <?php if(strpos($row['cb2_1'],"6")!==false){echo "checked";}?>>
				<label class="form-check-label">กพย</label>
			</div>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-1-2');" name="cb2-1[]" id="reason2-1-2" value="2" <?php if(strpos($row['cb2_1'],"2")!==false){echo "checked";}?>>
				<label class="form-check-label">JDI</label>
			</div>
			<div class="col-sm-5" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-1-3');" name="cb2-1[]" id="reason2-1-3" value="7" <?php if(strpos($row['cb2_1'],"7")!==false){echo "checked";}?>>
				<label class="form-check-label">กองสุขภาพ</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-1-1" name="r2-1-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_1'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_1_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-1-2" name="r2-1-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_1'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_1_2']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-1-3" name="r2-1-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb2_1'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_1_3']?></textarea>
				<small class="form-text"></small>
			</div>
			<!-- close activity 2.1 -->
			<!-- activity 2.2 -->
			<div class="col-sm-1"></div>
			<label for="r2-2" class="col-sm-11 col-form-label">2.2 <?php if($keylocate=="sp"){echo "การประเมินความเสี่ยงและความจำเป็น";}else{echo "การจำแนกและจัดทำแผนฝุกอบรมรายบุคคล";}?></label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r2-2" name="r2-2" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r2_2']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-2-1');" name="cb2-2[]" id="reason2-2-1" value="6" <?php if(strpos($row['cb2_2'],"6")!==false){echo "checked";}?>>
				<label class="form-check-label">กพย</label>
			</div>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-2-2');" name="cb2-2[]" id="reason2-2-2" value="2" <?php if(strpos($row['cb2_2'],"2")!==false){echo "checked";}?>>
				<label class="form-check-label">JDI</label>
			</div>
			<div class="col-sm-5" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-2-3');" name="cb2-2[]" id="reason2-2-3" value="7" <?php if(strpos($row['cb2_2'],"7")!==false){echo "checked";}?>>
				<label class="form-check-label">กองสุขภาพ</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-2-1" name="r2-2-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_2'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_2_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-2-2" name="r2-2-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_2'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_2_2']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-2-3" name="r2-2-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb2_2'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_2_3']?></textarea>
				<small class="form-text"></small>
			</div>
			<!-- close activity 2.2 -->
			<!-- activity 2.3 -->
			<div class="col-sm-1"></div>
			<label for="r2-3" class="col-sm-11 col-form-label">2.3 <?php if($keylocate=="sp"){echo "การส่งต่อนักวิชาชีพเพื่อประเมินเฉพาะด้าน";}else{echo "การฝึกอบรม/การบำบัด";}?></label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r2-3" name="r2-3" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r2_3']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-3-1');" name="cb2-3[]" id="reason2-3-1" value="6" <?php if(strpos($row['cb2_3'],"6")!==false){echo "checked";}?>>
				<label class="form-check-label">กพย</label>
			</div>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-3-2');" name="cb2-3[]" id="reason2-3-2" value="2" <?php if(strpos($row['cb2_3'],"2")!==false){echo "checked";}?>>
				<label class="form-check-label">JDI</label>
			</div>
			<div class="col-sm-5" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-3-3');" name="cb2-3[]" id="reason2-3-3" value="7" <?php if(strpos($row['cb2_3'],"7")!==false){echo "checked";}?>>
				<label class="form-check-label">กองสุขภาพ</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-3-1" name="r2-3-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_3'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_3_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-3-2" name="r2-3-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_3'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_3_2']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-3-3" name="r2-3-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb2_3'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_3_3']?></textarea>
				<small class="form-text"></small>
			</div>
			<!-- close activity 2.3 -->
			<!-- activity 2.4 -->
			<div class="col-sm-1"></div>
			<label for="r2-4" class="col-sm-11 col-form-label">2.4 <?php if($keylocate=="sp"){echo "การรายงานข้อเท็จจริง";}else{echo "เกษตรอินทรีย์";}?></label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r2-4" name="r2-4" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r2_4']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-4-1');" name="cb2-4[]" id="reason2-4-1" value="6" <?php if(strpos($row['cb2_4'],"6")!==false){echo "checked";}?>>
				<label class="form-check-label">กพย</label>
			</div>
			<div class="col-sm-6" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-4-2');" name="cb2-4[]" id="reason2-4-2" value="2" <?php if(strpos($row['cb2_4'],"2")!==false){echo "checked";}?>>
				<label class="form-check-label">JDI</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-4-1" name="r2-4-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_4'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_4_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-4-2" name="r2-4-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_4'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_4_2']?></textarea>
			</div>
			<!-- close activity 2.4 -->
			<!-- activity 2.5 -->
			<div class="col-sm-1"></div>
			<label for="r2-5" class="col-sm-11 col-form-label">2.5 <?php if($keylocate=="sp"){echo "การดำเนินงานตามมาตรการพิเศษ";}else{echo "ห้องเรียนกีฬา";}?></label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r2-5" name="r2-5" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r2_5']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<div class="col-sm-1" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-5-1');" name="cb2-5[]" id="reason2-5-1" value="6" <?php if(strpos($row['cb2_5'],"6")!==false){echo "checked";}?>>
				<label class="form-check-label">กพย</label>
			</div>
			<div class="col-sm-6" style="margin-top: 8px;">
				<input type="checkbox" class="form-check-input" onClick="hide_frm('2-5-2');" name="cb2-5[]" id="reason2-5-2" value="2" <?php if(strpos($row['cb2_5'],"2")!==false){echo "checked";}?>>
				<label class="form-check-label">JDI</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-5-1" name="r2-5-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_5'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_5_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide2-5-2" name="r2-5-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_5'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_5_2']?></textarea>
			</div>
			<!-- close activity 2.5 -->
			<!-- activity 2.6 -->
			<div class="col-sm-1"></div>
			<label for="r2-6" class="col-sm-11 col-form-label">2.6 <?php if($keylocate=="sp"){echo "การลงข้อมูลในระบบ CM ของเด็กและเยาวชนถูกต้องครบถ้วน";}else{echo "การจัดการศึกษาสามัญ อาชีวศึกษาและอุดมศึกษา";}?></label>
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<textarea class="form-control" id="r2-6" name="r2-6" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r2_6']?></textarea>
			</div>
			<div class="col-sm-1"></div>
			<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
			<?php
			if ($keylocate == "sp") { // check if from SP
				?>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-6-1');" name="cb2-6[]" id="reason2-6-1" value="6" <?php if(strpos($row['cb2_6'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-6-2');" name="cb2-6[]" id="reason2-6-2" value="2" <?php if(strpos($row['cb2_6'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-6-3');" name="cb2-6[]" id="reason2-6-3" value="7" <?php if(strpos($row['cb2_6'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-6-1" name="r2-6-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_6'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_6_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-6-2" name="r2-6-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_6'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_6_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-6-3" name="r2-6-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb2_6'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_6_3']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 2.6 from SP -->
				<?php
			} else { // cheeck if from TR
				?>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-6-1');" name="cb2-6[]" id="reason2-6-1" value="6" <?php if(strpos($row['cb2_6'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-6-2');" name="cb2-6[]" id="reason2-6-2" value="2" <?php if(strpos($row['cb2_6'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-6-1" name="r2-6-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_6'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_6_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-6-2" name="r2-6-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_6'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_6_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 2.6 from TR -->
				<!-- activity 2.7 -->
				<div class="col-sm-1"></div>
				<label for="r2-7" class="col-sm-11 col-form-label">2.7 การลงข้อมูลในระบบ TR ของเด็กและเยาวชนถูกต้อง</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r2-7" name="r2-7" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r2_7']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-7-1');" name="cb2-7[]" id="reason2-7-1" value="6" <?php if(strpos($row['cb2_7'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-7-2');" name="cb2-7[]" id="reason2-7-2" value="2" <?php if(strpos($row['cb2_7'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('2-7-3');" name="cb2-7[]" id="reason2-7-3" value="7" <?php if(strpos($row['cb2_7'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-7-1" name="r2-7-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb2_7'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_7_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-7-2" name="r2-7-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb2_7'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_7_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide2-7-3" name="r2-7-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb2_7'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen2_7_3']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 2.7 -->
				<?php
			}
			?>
			<!-- close activity 2 form -->
		</div>

		<?php
		if ($keylocate == "sp") { // -------------------------------- check if from SP ------------------------------- //
			?>
			<!-- activity 3 from SP -->
			<div class="form-group row" id="r3" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label" style="cursor: pointer;" >3. การรักษาและเพิ่มมาตรฐานการปฏิบัติงาน</label>
				<!-- activity 3.1 -->
				<div class="col-sm-1"></div>
				<label for="r3-1" class="col-sm-11 col-form-label">3.1 งานด้านคดี</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-1" name="r3-1" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_1']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-1-1');" name="cb3-1[]" id="reason3-1-1" value="6" <?php if(strpos($row['cb3_1'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-1-2');" name="cb3-1[]" id="reason3-1-2" value="2"  <?php if(strpos($row['cb3_1'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-1-3');" name="cb3-1[]" id="reason3-1-3" value="7"  <?php if(strpos($row['cb3_1'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-1-1" name="r3-1-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_1'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_1_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-1-2" name="r3-1-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_1'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_1_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-1-3" name="r3-1-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb3_1'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_1_3']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.1 -->
				<!-- activity 3.2 -->
				<div class="col-sm-1"></div>
				<label for="r3-2" class="col-sm-11 col-form-label">3.2 งานรักษาความมั่นคงปลอดภัย</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-2" name="r3-2" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_2']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-2-1');" name="cb3-2[]" id="reason3-2-1" value="6" <?php if(strpos($row['cb3_2'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-2-2');" name="cb3-2[]" id="reason3-2-2" value="2" <?php if(strpos($row['cb3_2'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-2-1" name="r3-2-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_2'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_2_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-2-2" name="r3-2-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_2'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_2_2']?></textarea>
				</div>
				<!-- close activity 3.2 -->
				<!-- activity 3.3 -->
				<div class="col-sm-1"></div>
				<label for="r3-3" class="col-sm-11 col-form-label">3.3 การควบคุมดูแลเด็กและเยาวชนในสถานควบคุม</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-3" name="r3-3" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_3']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-3-1');" name="cb3-3[]" id="reason3-3-1" value="6" <?php if(strpos($row['cb3_3'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-3-2');" name="cb3-3[]" id="reason3-3-2" value="2" <?php if(strpos($row['cb3_3'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-3-3');" name="cb3-3[]" id="reason3-3-3" value="7" <?php if(strpos($row['cb3_3'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-3-1" name="r3-3-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_3'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_3_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-3-2" name="r3-3-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_3'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_3_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-3-3" name="r3-3-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb3_3'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_3_3']?></textarea>
					<small class="form-text"></small>
				</div>
					<!-- close activity 3.3 -->
				<!-- activity 3.4 -->
				<div class="col-sm-1"></div>
				<label for="r3-4" class="col-sm-11 col-form-label">3.4 การแก้ไขบำบัดฟื้นฟูเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-4" name="r3-4" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_4']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-4-1');" name="cb3-4[]" id="reason3-4-1" value="6" <?php if(strpos($row['cb3_4'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-4-2');" name="cb3-4[]" id="reason3-4-2" value="2" <?php if(strpos($row['cb3_4'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-4-3');" name="cb3-4[]" id="reason3-4-3" value="7" <?php if(strpos($row['cb3_4'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide3-4-1" name="r3-4-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_3'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_4_1']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide3-4-2" name="r3-4-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_3'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_4_2']?></textarea>
				<small class="form-text"></small>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<textarea class="form-control" id="frm_hide3-4-3" name="r3-4-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb3_3'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_4_3']?></textarea>
				<small class="form-text"></small>
			</div>
				<!-- close activity 3.4 -->
				<!-- activity 3.5 -->
				<div class="col-sm-1"></div>
				<label for="r3-5" class="col-sm-11 col-form-label">3.5 การป้องกันและปราบปรามการทุจริตประพฤติมิชอบ</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-5" name="r3-5" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_5']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-5-1');" name="cb3-5[]" id="reason3-5-1" value="1" <?php if(strpos($row['cb3_5'],"1")!==false){echo "checked";}?>>
					<label class="form-check-label">กบค</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-5-2');" name="cb3-5[]" id="reason3-5-2" value="2" <?php if(strpos($row['cb3_5'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-5-1" name="r3-5-1" rows="2" placeholder="กบค" required <?php if(strpos($row['cb3_5'],"1")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_5_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-5-2" name="r3-5-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_5'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_5_2']?></textarea>
				</div>
				<!-- close activity 3.5 -->
				<!-- activity 3.6 -->
				<div class="col-sm-1"></div>
				<label for="r3-6" class="col-sm-11 col-form-label">3.6 การสนับสนุนของเครือข่าย</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-6" name="r3-6" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_6']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-6-1');" name="cb3-6[]" id="reason3-6-1" value="6" <?php if(strpos($row['cb3_6'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-6-2');" name="cb3-6[]" id="reason3-6-2" value="2" <?php if(strpos($row['cb3_6'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-6-1" name="r3-6-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_6'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_6_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-6-2" name="r3-6-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_6'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_6_2']?></textarea>
				</div>
				<!-- close activity 3.6 -->
				<!-- activity 3.7 -->
				<div class="col-sm-1"></div>
				<label for="r3-7" class="col-sm-11 col-form-label">3.7 การประหยัดพลังงานและทรัพยากร</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-7" name="r3-7" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_7']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-7-1');" name="cb3-7[]" id="reason3-7-1" value="4" <?php if(strpos($row['cb3_7'],"4")!==false){echo "checked";}?>>
					<label class="form-check-label">คลัง</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-7-2');" name="cb3-7[]" id="reason3-7-2" value="2" <?php if(strpos($row['cb3_7'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-7-3');" name="cb3-7[]" id="reason3-7-3" value="5" <?php if(strpos($row['cb3_7'],"5")!==false){echo "checked";}?>>
					<label class="form-check-label">กพร</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-7-1" name="r3-7-1" rows="2" placeholder="คลัง" required <?php if(strpos($row['cb3_7'],"4")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_7_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-7-2" name="r3-7-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_7'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_7_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-7-3" name="r3-7-3" rows="2" placeholder="กพร" required <?php if(strpos($row['cb3_7'],"5")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_7_3']?></textarea>
					<small class="form-text"></small>
				</div>
					<!-- close activity 3.7 -->
				<!-- activity 3.8 -->
				<div class="col-sm-1"></div>
				<label for="r3-8" class="col-sm-11 col-form-label">3.8 การดำเนินงานด้านการเงินการคลัง</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-8" name="r3-8" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_8']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-8-1');" name="cb3-8[]" id="reason3-8-1" value="4" <?php if(strpos($row['cb3_8'],"4")!==false){echo "checked";}?>>
					<label class="form-check-label">คลัง</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-8-2');" name="cb3-8[]" id="reason3-8-2" value="2" <?php if(strpos($row['cb3_8'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-8-1" name="r3-8-1" rows="2" placeholder="คลัง" required <?php if(strpos($row['cb3_8'],"4")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_8_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-8-2" name="r3-8-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_8'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_8_2']?></textarea>
					<small class="form-text"></small>
				</div>
					<!-- close activity 3.8 -->
				<!-- activity 3.9 -->
				<div class="col-sm-1"></div>
				<label for="r3-9" class="col-sm-11 col-form-label">3.9 การอำนวยความยุติธรรมและการป้องกันปัญหาเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-9" name="r3-9" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_9']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-7" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-9-1');" name="cb3-9[]" id="reason3-9-1" value="6" <?php if(strpos($row['cb3_9'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-9-1" name="r3-9-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_9'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_9_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.9 -->
				<!-- activity 3.10 -->
				<div class="col-sm-1"></div>
				<label for="r3-10" class="col-sm-11 col-form-label">3.10 การสนับสนุนภารกิจของสถานพินิจ</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-10" name="r3-10" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_10']?></textarea>
					<!-- close activity 3.10 -->
				</div>
				<label class="col-sm-1 col-form-label"></label>
				<!-- close activity 3 form SP -->
			</div>
			<?php
		} else { // ------------------------------- check if from TR ------------------------------- //
			?>
			<!-- activity 3 from TR -->
			<div class="form-group row" id="r3" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label" style="cursor: pointer;" >3. การรักษาและเพิ่มมาตรฐานการปฏิบัติงาน</label>
				<!-- activity 3.1 -->
				<div class="col-sm-1"></div>
				<label for="r3-1" class="col-sm-11 col-form-label">3.1 การรังานรักษาความมั่นคงปลอดภัย</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-1" name="r3-1" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_1']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-1-1');" name="cb3-1[]" id="reason3-1-1" value="6" <?php if(strpos($row['cb3_1'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-1-2');" name="cb3-1[]" id="reason3-1-2" value="2" <?php if(strpos($row['cb3_1'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-1-1" name="r3-1-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_1'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_1_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-1-2" name="r3-1-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_1'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_1_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.1 -->
				<!-- activity 3.2 -->
				<div class="col-sm-1"></div>
				<label for="r3-3" class="col-sm-11 col-form-label">3.2 การบริการที่เป็นมิตรแก่เด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-2" name="r3-2" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_2']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-2-1');" name="cb3-2[]" id="reason3-2-1" value="6" <?php if(strpos($row['cb3_2'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-2-2');" name="cb3-2[]" id="reason3-2-2" value="2" <?php if(strpos($row['cb3_2'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-2-3');" name="cb3-2[]" id="reason3-2-3" value="7" <?php if(strpos($row['cb3_2'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-2-1" name="r3-2-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_2'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_2_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-2-2" name="r3-2-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_2'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_2_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-2-3" name="r3-2-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb3_2'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_2_3']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.2 -->
				<!-- activity 3.3 -->
				<div class="col-sm-1"></div>
				<label for="r3-3" class="col-sm-11 col-form-label">3.3 การรับตัวเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-3" name="r3-3" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_3']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-3-1');" name="cb3-3[]" id="reason3-3-1" value="6" <?php if(strpos($row['cb3_3'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-3-2');" name="cb3-3[]" id="reason3-3-2" value="2" <?php if(strpos($row['cb3_3'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-3-1" name="r3-3-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_3'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_3_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-3-2" name="r3-3-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_3'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_3_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.3 -->
				<!-- activity 3.4 -->
				<div class="col-sm-1"></div>
				<label for="r3-4" class="col-sm-11 col-form-label">3.4 การบำบัดแก้ไขฟื้นฟูเด็กและเยาวชน</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-4" name="r3-4" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_4']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-4-1');" name="cb3-4[]" id="reason3-4-1" value="6" <?php if(strpos($row['cb3_4'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-4-2');" name="cb3-4[]" id="reason3-4-2" value="2" <?php if(strpos($row['cb3_4'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-4-3');" name="cb3-4[]" id="reason3-4-3" value="7" <?php if(strpos($row['cb3_4'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-4-1" name="r3-4-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_4'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_4_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-4-2" name="r3-4-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_4'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_4_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-4-3" name="r3-4-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb3_4'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_4_3']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.4 -->
				<!-- activity 3.5 -->
				<div class="col-sm-1"></div>
				<label for="r3-5" class="col-sm-11 col-form-label">3.5 การประชุมคณะกรรมการสหวิชาชีพ</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-5" name="r3-5" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_5']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-5-1');" name="cb3-5[]" id="reason3-5-1" value="6" <?php if(strpos($row['cb3_5'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-5-2');" name="cb3-5[]" id="reason3-5-2" value="2" <?php if(strpos($row['cb3_5'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-5" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-5-3');" name="cb3-5[]" id="reason3-5-3" value="7" <?php if(strpos($row['cb3_5'],"7")!==false){echo "checked";}?>>
					<label class="form-check-label">กองสุขภาพ</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-5-1" name="r3-5-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_5'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_5_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-5-2" name="r3-5-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_5'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_5_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-5-3" name="r3-5-3" rows="2" placeholder="กองสุขภาพ" required <?php if(strpos($row['cb3_5'],"7")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_5_3']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.5 -->
				<!-- activity 3.6 -->
				<div class="col-sm-1"></div>
				<label for="r3-6" class="col-sm-11 col-form-label">3.6 การติดตามภายหลังปล่อย</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-6" name="r3-6" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_6']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-1" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-6-1');" name="cb3-6[]" id="reason3-6-1" value="6" <?php if(strpos($row['cb3_6'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-6" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-6-2');" name="cb3-6[]" id="reason3-6-2" value="2" <?php if(strpos($row['cb3_6'],"2")!==false){echo "checked";}?>>
					<label class="form-check-label">JDI</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-6-1" name="r3-6-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_6'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_6_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-6-2" name="r3-6-2" rows="2" placeholder="JDI" required <?php if(strpos($row['cb3_6'],"2")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_6_2']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.6 -->
				<!-- activity 3.7 -->
				<div class="col-sm-1"></div>
				<label for="r3-7" class="col-sm-11 col-form-label">3.7 การดำเนินแงานป้องกันและปราบปรามการทุจริตประพฤติมิชอบ</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-7" name="r3-7" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_7']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-7" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-7-1');" name="cb3-7[]" id="reason3-7-1" value="1" <?php if(strpos($row['cb3_7'],"1")!==false){echo "checked";}?>>
					<label class="form-check-label">กบค</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-7-1" name="r3-7-1" rows="2" placeholder="กบค" required <?php if(strpos($row['cb3_7'],"1")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_7_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.7 -->
				<!-- activity 3.8 -->
				<div class="col-sm-1"></div>
				<label for="r3-8" class="col-sm-11 col-form-label">3.8 การสนับสนุนดำเนินงานของเครือข่าย</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-8" name="r3-8" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_8']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-7" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-8-1');" name="cb3-8[]" id="reason3-8-1" value="6"<?php if(strpos($row['cb3_8'],"6")!==false){echo "checked";}?>>
					<label class="form-check-label">กพย</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-8-1" name="r3-8-1" rows="2" placeholder="กพย" required <?php if(strpos($row['cb3_8'],"6")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_8_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.8 -->
				<!-- activity 3.9 -->
				<div class="col-sm-1"></div>
				<label for="r3-9" class="col-sm-11 col-form-label">3.9 การประหยัดพลังงาน</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-9" name="r3-9" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_9']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class="col-sm-7" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-9-1');" name="cb3-9[]" id="reason3-9-1" value="4"<?php if(strpos($row['cb3_9'],"4")!==false){echo "checked";}?>>
					<label class="form-check-label">คลัง</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-9-1" name="r3-9-1" rows="2" placeholder="คลัง" required <?php if(strpos($row['cb3_9'],"4")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_9_1']?></textarea>
					<small class="form-text"></small>
				</div>
				<!-- close activity 3.9 -->
				<!-- activity 3.10 -->
				<div class="col-sm-1"></div>
				<label for="r3-10" class="col-sm-11 col-form-label">3.10 การเงินการคลัง</label>
				<div class="col-sm-1"></div>
				<div class="col-sm-11">
					<textarea class="form-control" id="r3-10" name="r3-10" rows="2" placeholder="ผลการดำเนินงานของหน่วยรับการตรวจ"><?=$row['r3_10']?></textarea>
				</div>
				<div class="col-sm-1"></div>
				<label class="col-sm-4 col-form-label">ข้อเสนอแนะของผู้ตรวจราชการกรม:</label>
				<div class=" col-sm-7" style="margin-top: 8px;">
					<input type="checkbox" class="form-check-input" onClick="hide_frm('3-10-1');" name="cb3-10[]" id="reason3-10-1" value="4"<?php if(strpos($row['cb3_10'],"4")!==false){echo "checked";}?>>
					<label class="form-check-label">คลัง</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<textarea class="form-control" id="frm_hide3-10-1" name="r3-10-1" rows="2" placeholder="คลัง" required <?php if(strpos($row['cb3_10'],"4")!==false){}else{echo "disabled style='display:none;'";} ?>><?=$crow['r_cen3_10_1']?></textarea>
					<small class="form-text"></small>
				</div>
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

<!-- JScript -->
<script>
function sumpersonnel() {
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

function hide_frm(i) {
	var ck = document.getElementById('reason'+i)
	var frm = document.getElementById('frm_hide'+i)
	if (ck !== null) {
		if (ck.checked == true) {
			if (frm.value != "") {
				frm.style.display = ""
				frm.disabled = false
			} else {
				frm.style.display = ""
				frm.disabled = false
			}
		} else if (ck.checked == false) {
				frm.style.display = "none"
				frm.disabled = true
				frm.value = ""
		}
	}
}

function refresh () {
	hide_frm('1-1-1')
	hide_frm('1-1-2')
	hide_frm('1-2-1')
	hide_frm('1-2-2')
	hide_frm('1-3-1')
	hide_frm('1-3-2')
	hide_frm('1-4-1')
	hide_frm('1-4-2')
	hide_frm('1-5-1')
	hide_frm('1-5-2')
	hide_frm('1-5-3')
	hide_frm('2-1-1')
	hide_frm('2-1-2')
	hide_frm('2-1-3')
	hide_frm('2-2-1')
	hide_frm('2-2-2')
	hide_frm('2-2-3')
	hide_frm('2-3-1')
	hide_frm('2-3-2')
	hide_frm('2-3-3')
	hide_frm('2-4-1')
	hide_frm('2-4-2')
	hide_frm('2-5-1')
	hide_frm('2-5-2')
	hide_frm('2-6-1')
	hide_frm('2-6-2')
	hide_frm('2-6-3')
	hide_frm('2-7-1')
	hide_frm('2-7-2')
	hide_frm('2-7-3')
	hide_frm('3-1-1')
	hide_frm('3-1-2')
	hide_frm('3-1-3')
	hide_frm('3-2-1')
	hide_frm('3-2-2')
	hide_frm('3-2-3')
	hide_frm('3-3-1')
	hide_frm('3-3-2')
	hide_frm('3-3-3')
	hide_frm('3-4-1')
	hide_frm('3-4-2')
	hide_frm('3-4-3')
	hide_frm('3-5-1')
	hide_frm('3-5-2')
	hide_frm('3-5-3')
	hide_frm('3-6-1')
	hide_frm('3-6-2')
	hide_frm('3-7-1')
	hide_frm('3-7-2')
	hide_frm('3-7-3')
	hide_frm('3-8-1')
	hide_frm('3-8-2')
	hide_frm('3-9-1')
	hide_frm('3-10-1')
}

window.onload = refresh
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script src="js/scripts.js" ></script>
</body>
</html>
