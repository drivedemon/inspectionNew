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
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<!-- Style CSS -->
	<style>
	body{
		background-color: Ivory;
	}
	</style>

	<title>เพิ่มข้อมูลผู้ตรวจราชการ</title>

</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3><img src="./images/hd-13.jpg" width="1000" height="150"></h3>
		<h3><?php if($menu=="add"){echo "เพิ่มข้อมูลผู้ตรวจราชการ";}else{echo "แก้ไขข้อมูลผู้ตรวจราชการ";} ?></h3>
	</div>
	<!-- Form -->
	<div class="container p-2" style="max-width:800px;">
		<form name="report" action="form-add-sent.php" method="post" enctype="multipart/form-data" id="report-form">
			<hr>
			<!-- ==================================================== tab 1 ==================================================== -->
			<!-- Text input -->
			<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<input type="hidden" name="menu" value="<?=$menu?>">
				<input type="hidden" name="locate" value="<?=$locate?>">
				<?php if(!empty($id)){echo "<input type='hidden' name='inid' value='$id'";} ?>
				<label class="col-sm-12 col-form-label"></label>
				<label for="input-creator" class="col-sm-12 col-form-label bold">ชื่อผู้ตรวจ : </label>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-2">
					<label>คำนำหน้า</label>
					<select class="form-control" name="txtReceiver" id="input-receiver">
						<?php
						$sql_tname = "SELECT * FROM title ORDER BY title_name DESC";
						$query_tname = mysqli_query($conn,$sql_tname);
						?>
						<?php while ($data_tname = mysqli_fetch_assoc($query_tname)){ ?>
							<option <?php if($row['division']==$data_tname['username']){echo "selected";}?> value="<?php echo $data_tname['id']; ?>">
								<?php echo $data_tname['title_name']; ?>
							</option>
						<?php }; ?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label>ชื่อ</label>
					<input type="text" name="firstname" class="form-control" id="firstname" placeholder="ชื่อ" value="<?=$row['boss_name']?>" required>
				</div>
				<div class="form-group col-md-4">
					<label>นามสกุล</label>
					<input type="text" name="lastname" class="form-control" id="lastname" placeholder="นามสกุล" value="<?=$row['boss_name']?>" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3">
					<input type="button" class="myButton2" value="+ เขตการตรวจราชการ" id="AddMore">
				</div>
				<div class="col-sm-7">
					<div id="remove-cont"></div>
				</div>
			</div>

			<div class="form-group row" id="area_zone" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label"></label>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-7">
					<label>เขตตรวจราชการ</label>
					<input type="text" name="area[]" class="form-control" id="area1" placeholder="เขตตรวจราชการที่ 1" value="" required>
				</div>
				<div class="form-group col-md-3">
					<label>รองที่กำกับดูแล</label>
					<select class="form-control" name="area[]" id="sub_ins1">
						<?php
						$sql_zone = "SELECT * FROM zone ORDER BY id ASC";
						$query_zone = mysqli_query($conn,$sql_zone);
						?>
						<?php while ($data_zone = mysqli_fetch_assoc($query_zone)){ ?>
							<option <?php if($row['division']==$data_zone['id']){echo "selected";}?> value="<?php echo $data_zone['id']; ?>">
								<?php echo $data_zone['name']; ?>
							</option>
						<?php }; ?>
					</select>
				</div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-7">
					<label>ผต.ยธที่ดูแล</label>
					<input type="text" name="area[]" class="form-control" id="ins1" placeholder="ชื่อ-นามสกุล" value="" required>
				</div>
				<div class="form-group col-md-3">
					<label>ศูนย์ฝึกที่ฝึกอบรม</label>
					<select class="form-control" name="area[]" id="locate1">
						<?php
						$sql_divi = "SELECT distinct * FROM tr_area ORDER BY id ASC";
						$query_divi = mysqli_query($conn,$sql_divi);
						?>
						<?php while ($data_divi = mysqli_fetch_assoc($query_divi)){ ?>
							<option <?php if($row['division']==$data_divi['id']){echo "selected";}?> value="<?php echo $data_divi['id']; ?>">
								<?php echo $data_divi['name']; ?>
							</option>
						<?php }; ?>
					</select>
				</div>
			</div>





			<label class="col-sm-12 col-form-label"></label>
			<!-- </div> -->
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
	<select id="indarea" size="5" style="display :;">
		<?php
		foreach ($c13Q as $key => $value) {
			if ($key != 0) {
				$n = $key+1;
				echo "<option>$n</option>";
			}
		}
		?>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		<script src="js/scripts.js" ></script>
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<!-- JScript -->
		<script>
		$(document).ready(function(){
			$("#AddMore").click(function(){
				var indad = document.getElementById("indarea").length;
				indad = indad+2;
				var dd = $("#removeMore").val();
				$("#area_zone").append('<label class="col-sm-12 col-form-label"><hr></label>');
				$("#area_zone").append('<div class="form-group col-md-1"></div>');
				$("#area_zone").append('<div class="form-group col-md-7"><label>เขตตรวจราชการ</label><input type="text" name="area[]" class="form-control" id="area'+indad+'" placeholder="เขตตรวจราชการท่ '+indad+'" value="" required></div>');
				$("#area_zone").append('<div class="form-group col-md-3"><label>รองที่กำกับดูแล</label><select class="form-control" name="area[]" id="sub_ins'+indad+'"></div>');
				$("#area_zone").append('<div class="form-group col-md-1"></div>');
				subinsLoad(indad);
				$("#indarea").append('<option>'+indad+'</option>');
				if (typeof dd === "undefined") {
					$("#remove-cont").append('<input type="button" class="myButton3" id="removeMore" onClick="rmve(\''+indad+'\')" value="- เขตการตรวจราชการ">');
				} else {
					$("#remove-cont").empty();
					$("#remove-cont").append('<input type="button" class="myButton3" id="removeMore" onClick="rmve(\''+indad+'\')" value="- เขตการตรวจราชการ">');
				}
			});
		});

		function subinsLoad(n) {
			var list = "";
			$.ajax({
				url: "ajax_get_inspect.php",
				type: "POST",
				async:false,
				success: function(data, status) {
					$("#sub_ins"+n).html(data);
					var q = data;
				},
				error: function(xhr, status, exception) { alert(status); }
			});
		}
		</script>
	</body>
	</html>
