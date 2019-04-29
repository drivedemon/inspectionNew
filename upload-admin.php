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

    <title>อัพโหลดไฟล์สำหรับส่วนกลาง</title>

  </head>

<!-- Body -->
  <body>
	<div class="container pt-3 text-center">
		<h3><img src="./images/hd-13.jpg" width="1000" height="150"></h3>
		<h3>อัพโหลดไฟล์ไปยังหน่วยงานในสังกัด</h3>
	</div>
	<!-- Form -->
	<div class="container p-2" style="max-width:800px;">
		<div class="container p-2 text-right">
			<a href="detail-upload-admin.php" target="_blank">แสดงรายการอัพโหลดไฟล์</a>
<!--
			|
			<a href="detail-reply.php" target="_blank">ดูการตอบกลับทั้งหมด</a>
-->
		</div>
		<form name="report" action="upload-admin-sent.php" method="post" enctype="multipart/form-data" id="report-form">
			<!-- Text input -->
			<div class="form-group row">
				<label for="input-date_year" class="col-3 col-form-label">ปีงบประมาณ:</label>
				<div class="col-9">
					<select class="form-control" name="txtDate_year" id="input-date_year">
						<?php $current = date("Y")+543;
							for($y=2562;$y<=$current+1;$y++){ ?>
								<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
              <div class="form-group row">
				<label for="input-round" class="col-sm-3 col-form-label">รอบที่: </label>
               <div class="col-sm-9">
					<div class="container">
						<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="selectedNumber" id="numberSelect1" value="1" required />
									  <label class="form-check-label" for="type1">รอบที่1</label>
						</div>
						<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="selectedNumber" id="numberSelect2" value="2" required />
									  <label class="form-check-label" for="type2">รอบที่2</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="input-receiver" class="col-sm-3 col-form-label">ถึงหน่วยงาน:</label>
				<div class="col-sm-9">
					<select class="form-control" name="txtReceiver" id="input-receiver">
						<?php
							$sql_receiver = "SELECT id,name FROM userlogin WHERE permission_group='2' ORDER BY id ASC";
							$query_receiver = mysqli_query($conn,$sql_receiver);
						?>
						<?php while ($data_receiver = mysqli_fetch_array($query_receiver)){ ?>
							<option value="<?php echo $data_receiver['id']; ?>">
								<?php echo $data_receiver['name']; ?>
							</option>
						<?php }; ?>
					</select>
				</div>
			</div>
			<!-- /Text input -->
			<div class="form-group row">
				<label for="input-date_sent" class="col-sm-3 col-form-label">วันที่อธิบดีลงนาม:</label>
				<div class="col-sm-9">
					<input type="date" name="DateSent" class="form-control" id="input-date_sent" required>
				</div>
			</div>
			<!-- Upload input -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">แนบไฟล์:</label>
					<div class="input-files col-sm-5">
						<input class="pb-1" type="file" name="file" id="file" required>
					</div>
					<div class="col-sm-4">
						<small style="color:red;">ไฟล์ .pdf เท่านั้น</small><br/>
						<small style="color:red;">ขนาดไฟล์ไม่เกิน 20MB</small>
					</div>

			</div>
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
	<!-- JScript -->
	<script>
	/*	$(document).ready(function(){
			var id = 1;
			$("#AddMore").click(function(){
				var showId = ++id;
				$(".input-files").append('<input class="pb-1" type="file" class="form-control-file" name="'+showId+'">');
				if(showId == 5){
					document.getElementById("AddMore").disabled = true;
				}
			});
		}); */
	</script>
  </body>
</html>
