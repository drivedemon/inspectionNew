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
?>
<!doctype html>
<html lang="en">
<!-- Head -->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">

	<!-- Style CSS -->
	<style>
		body{
			background-color: Ivory;
		}
	</style>

    <title>[หน้าแรก]แสดงเมนูการทำงานของส่วนกลาง[กลุ่มผู้ตรวจราชการกรม]</title>

  </head>

<!-- Body -->
  <body>

	<div class="container pt-3 text-center">
    <h3>
		  <!-- MENU-LOCATION=NONE -->
          <img class="img-fluid" src="./images/hd-13.jpg">
    </h3>
		<h3>[หน้าแรก]แสดงเมนูการทำงานของส่วนกลาง[กลุ่มผู้ตรวจราชการกรม]</h3>
	</div>
	<div class="container p-2">

    	<a href="list.php" target="_blank">บันทึก/ดูข้อมูล/แก้ไขข้อมูล</a><br />
        <a href="inspector.php" target="_blank">รายชื่อผู้ตรวจราชการกรม</a><br />
				<a href="select_export.php" target="_blank">สรุปรายงานจำแนกรายหน่วยงาน</a><br />
				<a href="list_check_user.php" target="_blank">ผลการดำเนินงานของหน่วยรับการตรวจ</a><br />
        <a href="upload-admin.php" target="_blank">อัพโหลดไฟล์ไปยังหน่วยงานที่รับการตรวจ</a><br />
        <a href="detail-upload-admin.php" target="_blank">แสดงรายการอัพโหลดไฟล์/เมนูลบไฟล์</a><br />

		<!--<a href="form-report.php" target="_blank">ส่งรายงานผลการตรวจราชการประจำปี</a><br />
		<a href="detail-report.php" target="_blank">รายงานผลการตรวจราชการตามแผนประจำปี</a><br />

		<a href="report-follow.php" target="_blank">ส่งรายงานผลการตรวจราชการ(ทดสอบ)</a><br />
		<a href="detail-report-follow.php" target="_blank">รายงานผลการตรวจราชการ(ทดสอบ)</a><br />-->

<!--
		<a href="detail-reply.php" target="_blank">การตอบกลับผลการรายงานการตรวจสอบติดตาม</a><br />
-->

		<div class="text-center">
			<a href="logout.php">Logout</a>
		</div>

	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<!-- JScript -->
	<script>

	</script>
  </body>
</html>
