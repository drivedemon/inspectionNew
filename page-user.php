<?php
session_start();
error_reporting(~E_NOTICE);
require 'dbconnect.php';
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

	<title>[หน้าแรก]รายงานผลการตรวจสอบ</title>

</head>

<!-- Body -->
<body>

	<div class="container pt-3 text-center">
		<h3>
			<!-- MENU-LOCATION=NONE -->
			<img class="img-fluid" src="./images/hd-13.jpg">
		</h3>
		<h3>[หน้าแรก]รายงานผลการตรวจสอบ <?=$_SESSION['uname'];?></h3>
	</div>
	<div class="container p-2">
		<?php if($_SESSION["permission"]=='3'){ ?>
			<div class="container">
				<a href="detail-report.php" target="_blank">รายงานผลการตรวจสอบตามแผนประจำปี</a><br />
			</div>
		<?php }else{ ?>
			<a href="list_user.php?user=<?php echo $_GET['user'] ?>" target="_blank">ดูข้อมูล</a><br />
			<a href="show-user-report.php?user=<?php echo $_GET['user'] ?>" target="_blank">รายงานผลการตรวจสอบตามแผนประจำปี</a><br />
			<a href="show-user-report-follow.php?user=<?php echo $_GET['user'] ?>" target="_blank">รายงานผลการตรวจสอบตามข้อเสนอแนะ(ทดสอบ)</a><br />
		<?php } ?>
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
