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
	$sql = "SELECT * FROM inspector WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);

	$area_arr = (strpos($row['area'], '|') !== false)? explode("|", $row['area']):$row['area'];
	$sub_ins_arr = (strpos($row['sub_ins'], '|') !== false)? explode("|", $row['sub_ins']):$row['sub_ins'];
	$sub_insname_arr = (strpos($row['sub_insname'], '|') !== false)? explode("|", $row['sub_insname']):$row['sub_insname'];
	$tr_locate_arr = (strpos($row['tr_locate'], '|') !== false)? explode("|", $row['tr_locate']):$row['tr_locate'];

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
		<form name="ins-form" action="form-add-ins-sent.php" method="post" enctype="multipart/form-data" id="ins-form">
			<hr>
			<!-- ==================================================== tab 1 ==================================================== -->
			<!-- Text input -->
			<div class="form-group row" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<input type="hidden" name="menu" value="<?=$menu?>">
				<?php if(!empty($id)){echo "<input type='hidden' name='inid' value='$id'";} ?>
				<label class="col-sm-12 col-form-label"></label>
				<label for="input-creator" class="col-sm-12 col-form-label bold">ชื่อผู้ตรวจ : </label>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-2">
					<label>คำนำหน้า</label>
					<select class="form-control" name="tname" id="input-tname">
						<?php
						$sql_tname = "SELECT * FROM title ORDER BY title_name DESC";
						$query_tname = mysqli_query($conn,$sql_tname);
						?>
						<?php while ($data_tname = mysqli_fetch_assoc($query_tname)){ ?>
							<option <?php if($row['titlename']==$data_tname['id']){echo "selected ";}?>value="<?php echo $data_tname['id']; ?>">
								<?php echo $data_tname['title_name']; ?>
							</option>
						<?php }; ?>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label>ชื่อ</label>
					<input type="text" name="firstname" class="form-control" id="firstname" placeholder="ชื่อ" value="<?=$row['firstname']?>" required>
				</div>
				<div class="form-group col-md-4">
					<label>นามสกุล</label>
					<input type="text" name="lastname" class="form-control" id="lastname" placeholder="นามสกุล" value="<?=$row['lastname']?>" required>
				</div>
			</div>

			<div class="form-group row" id="area_zone" style="border-style:solid; background-color: #FFFAE5; border-width:2px; border-color: #FFEEE5; border-radius: 8px !important;">
				<label class="col-sm-12 col-form-label bold">ข้อมูลเขตตรวจราชการ : </label>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-7">
					<label>เขตตรวจราชการที่ 1</label>
					<input type="text" name="area[]" class="form-control" id="area1" placeholder="เขตตรวจราชการที่ 1" value="<?=is_array($area_arr)?$area_arr[0]:$area_arr?>" required>
				</div>
				<div class="form-group col-md-3">
					<label>รองที่กำกับดูแล</label>
					<select class="form-control" name="sub_ins[]" id="sub_ins1">
						<?php
						$sql_zone = "SELECT * FROM subins_zone ORDER BY id ASC";
						$query_zone = mysqli_query($conn,$sql_zone);
						?>
						<?php while ($data_zone = mysqli_fetch_assoc($query_zone)){ ?>
							<option
							<?php
							if(is_array($sub_ins_arr)) {
								if ($sub_ins_arr[0]==$data_zone['id']) {
									echo " selected ";
								}
							} else {
								if ($sub_ins_arr==$data_zone['id']) {
									echo " selected ";
								}
							}
							?>
							value="<?php echo $data_zone['id']; ?>">
							<?php echo $data_zone['name']; ?>
						</option>
						<?php }; ?>
					</select>
				</div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-1"></div>
				<div class="form-group col-md-7">
					<label>ผต.ยธที่ดูแล</label>
					<input type="text" name="insname[]" class="form-control" id="insname1" placeholder="ชื่อ-นามสกุล" value="<?=is_array($sub_insname_arr)?$sub_insname_arr[0]:$sub_insname_arr?>" required>
				</div>
				<div class="form-group col-md-3">
					<label>ศูนย์ฝึกที่ฝึกอบรม</label>
					<select class="form-control" name="trlocate[]" id="trlocate1">
						<?php
						$sql_trdivi = "SELECT * FROM tr_locate ORDER BY id ASC";
						$query_trdivi = mysqli_query($conn,$sql_trdivi);
						while ($data_trdivi = mysqli_fetch_assoc($query_trdivi)){
							?>
							<option
							<?php
							if(is_array($tr_locate_arr)) {
								if ($tr_locate_arr[0]==$data_trdivi['id']) {
									echo " selected ";
								}
							} else {
								if ($tr_locate_arr==$data_trdivi['id']) {
									echo " selected ";
								}
							}
							?>
							value="<?php echo $data_trdivi['id']; ?>">
							<?php echo $data_trdivi['name']; ?>
						</option>
					<?php }; ?>
				</select>
			</div>
			<div class="form-group col-md-1"></div>


			<?php
			if (is_array($area_arr)) {
				$i = 1;
				foreach ($area_arr as $key => $value) {
					if ($key == $i) {
						$dp = $i + 1;
						$sql_sub_ins = "select * from subins_zone";
						$query_sub_ins = mysqli_query($conn, $sql_sub_ins);
						$sql_trlocate = "select * from tr_locate";
						$query_trlocate = mysqli_query($conn, $sql_trlocate);

						echo '<label class="col-sm-12 col-form-label" id="hr'.$dp.'"><hr></label>';
						echo '<div class="form-group col-md-1" id="fcol'.$dp.'"></div>';
						echo '<div class="form-group col-md-7" id="farea'.$dp.'"><label>เขตตรวจราชการที่ '.$dp.'</label><input type="text" name="area[]" class="form-control" id="area'.$dp.'" placeholder="เขตตรวจราชการที่ '.$dp.'" value="'.$value.'" required></div>';
						echo '<div class="form-group col-md-3" id="fsub'.$dp.'"><label>รองที่กำกับดูแล</label><select class="form-control" name="sub_ins[]" id="sub_ins'.$dp.'">';
						while ($sub_datains = mysqli_fetch_assoc($query_sub_ins)){
							echo '<option '.(($sub_ins_arr[$key]==$sub_datains['id'])?"selected ":"").' value="'.$sub_datains['id'].'">'.$sub_datains['name'].'</option>';
						};
						echo '</select></div>';
						echo '<div class="form-group col-md-1" id="fcolend'.$dp.'"></div>';
						echo '<div class="form-group col-md-1" id="scol'.$dp.'"></div>';
						echo '<div class="form-group col-md-7" id="sinsname'.$dp.'"><label>ผต.ยธที่ดูแล</label><input type="text" name="insname[]" class="form-control" id="insname'.$dp.'" placeholder="ชื่อ-นามสกุล" value="'.$sub_insname_arr[$key].'" required></div>';
						echo '<div class="form-group col-md-3" id="strzone'.$dp.'"><label>ศูนย์ฝึกที่ฝึกอบรม</label><select class="form-control" name="trlocate[]" id="trlocate'.$dp.'">';
						while ($sub_trlocate = mysqli_fetch_assoc($query_trlocate)){
							echo '<option '.(($tr_locate_arr[$key]==$sub_trlocate['id'])?"selected ":"").' value="'.$sub_trlocate['id'].'">'.$sub_trlocate['name'].'</option>';
						};
						echo '</select></div>';
						echo '<div class="form-group col-md-1" id="scolend'.$dp.'"></div>';
						$i++;
					}
				}
			}
			?>


		</div>



		<div class="form-group row">
			<div class="col-sm-3">
				<input type="button" class="myButton2" value="+ เขตการตรวจราชการ" id="AddMore">
			</div>
			<div class="col-sm-7">
				<div id="remove-cont">
					<?php
					if (!empty($row['area'])) {
						$countnum = count(explode("|", $row['area']));
						if ($countnum > 1) {
							echo '<input type="button" class="myButton3" id="removeMore" onClick="rmve(\''.$countnum.'\')" value="- เขตการตรวจราชการ">';
						}
					}
					?>
				</div>
			</div>
		</div>
		<!-- </div> -->
		<hr>
		<!-- /Upload input -->
		<div class="form-group text-right">
			<div id="submit-form">
				<button type="button" onclick="checkInput()" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
	<div class="text-center">
		<a href="javascript:window.close()">ปิดหน้าต่าง</a> |
		<a href="logout.php">Logout</a>
	</div>
</div>
<select id="indarea" name="indarea" size="5" style="display :none;">
	<?php
	foreach ($area_arr as $key => $value) {
		if ($key != 0) {
			$n = $key+1;
			echo "<option>$n</option>";
		}
	}
	?>
</select>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script src="js/scripts.js" ></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<!-- JScript -->
<script>
function rmve(i) {
	var o = i;
	var x2 = document.getElementById("area"+o);
	var indar = document.getElementById("indarea");
	// alert(indar.length);
	if (indar.length == 1) {
		$("#hr"+o).remove();
		$("#fcol"+o).remove();
		$("#farea"+o).remove();
		$("#fsub"+o).remove();
		$("#fcolend"+o).remove();
		$("#scol"+o).remove();
		$("#sinsname"+o).remove();
		$("#strzone"+o).remove();
		$("#scolend"+o).remove();
		indar.remove(indar.length-1);
		$("#remove-cont").empty();
		$("#submit-form").empty();
		$("#submit-form").append('<button type="button" onclick="checkInput()" class="btn btn-primary">Submit</button>');
	} else {
		$("#hr"+o).remove();
		$("#fcol"+o).remove();
		$("#farea"+o).remove();
		$("#fsub"+o).remove();
		$("#fcolend"+o).remove();
		$("#scol"+o).remove();
		$("#sinsname"+o).remove();
		$("#strzone"+o).remove();
		$("#scolend"+o).remove();
		// x2.remove();
		indar.remove(indar.length-1);
		var lastind = (indar.length) + 1;
		$("#remove-cont").empty();
		$("#remove-cont").append('<input type="button" class="myButton3" id="removeMore" onClick="rmve(\''+lastind+'\')" value="- เขตการตรวจราชการ">');
		$("#submit-form").empty();
		$("#submit-form").append('<button type="button" onclick="checkInput(\''+lastind+'\')" class="btn btn-primary">Submit</button>');
	}
}

$(document).ready(function(){
	$("#AddMore").click(function(){
		var indad = document.getElementById("indarea").length;
		indad = indad+2;
		var dd = $("#removeMore").val();
		$("#area_zone").append('<label class="col-sm-12 col-form-label" id="hr'+indad+'"><hr></label>');
		$("#area_zone").append('<div class="form-group col-md-1" id="fcol'+indad+'"></div>');
		$("#area_zone").append('<div class="form-group col-md-7" id="farea'+indad+'"><label>เขตตรวจราชการที่ '+indad+'</label><input type="text" name="area[]" class="form-control" id="area'+indad+'" placeholder="เขตตรวจราชการที่ '+indad+'" value="" required></div>');
		$("#area_zone").append('<div class="form-group col-md-3" id="fsub'+indad+'"><label>รองที่กำกับดูแล</label><select class="form-control" name="sub_ins[]" id="sub_ins'+indad+'"></select></div>');
		$("#area_zone").append('<div class="form-group col-md-1" id="fcolend'+indad+'"></div>');
		$("#area_zone").append('<div class="form-group col-md-1" id="scol'+indad+'"></div>');
		$("#area_zone").append('<div class="form-group col-md-7" id="sinsname'+indad+'"><label>ผต.ยธที่ดูแล</label><input type="text" name="insname[]" class="form-control" id="insname'+indad+'" placeholder="ชื่อ-นามสกุล" value="" required></div>');
		$("#area_zone").append('<div class="form-group col-md-3" id="strzone'+indad+'"><label>ศูนย์ฝึกที่ฝึกอบรม</label><select class="form-control" name="trlocate[]" id="trlocate'+indad+'"></select></div>');
		$("#area_zone").append('<div class="form-group col-md-1" id="scolend'+indad+'"></div>');
		subinsLoad(indad);
		trzoneLoad(indad);
		$("#indarea").append('<option>'+indad+'</option>');
		$("#submit-form").empty();
		$("#submit-form").append('<button type="button" onclick="checkInput(\''+indad+'\')" class="btn btn-primary">Submit</button>');
		if (typeof dd === "undefined") {
			$("#remove-cont").append('<input type="button" class="myButton3" id="removeMore" onClick="rmve(\''+indad+'\')" value="- เขตการตรวจราชการ">');
		} else {
			$("#remove-cont").empty();
			$("#remove-cont").append('<input type="button" class="myButton3" id="removeMore" onClick="rmve(\''+indad+'\')" value="- เขตการตรวจราชการ">');
			$("#submit-form").empty();
			$("#submit-form").append('<button type="button" onclick="checkInput(\''+indad+'\')" class="btn btn-primary">Submit</button>');
		}
	});
});

function subinsLoad(n) {
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

function trzoneLoad(n) {
	$.ajax({
		url: "ajax_get_trzone.php",
		type: "POST",
		async:false,
		success: function(data, status) {
			$("#trlocate"+n).html(data);
			var q = data;
		},
		error: function(xhr, status, exception) { alert(status); }
	});
}

function submit() {
	document.getElementById("ins-form").submit();
}

function checkInput(i) {
	if (!$("#firstname").val() || !$("#lastname").val()) {
		alert("กรุณากรอกข้อมูลชื่อหรือนามสกุลให้เรียบร้อย");
	} else if (i === undefined) {
		if (!$("#area1").val() || !$("#sub_ins1").val() || !$("#insname1").val() || !$("#trlocate1").val()) {
			alert("กรุณากรอกข้อมูลเขตตรวจราชการให้ครบทุกช่อง");
		} else {
			submit();
		}
	} else {
		if (i > 1) {
			for (var num = 1; num <= i; num++) {
				if (num > 1) {
					if (!$("#area"+num).val() || !$("#sub_ins"+num).val() || !$("#insname"+num).val() || !$("#trlocate"+num).val()) {
						alert("กรุณากรอกข้อมูลเขตตรวจราชการให้ครบทุกช่อง");
						break;
					} else {
						submit();
					}
				} else {
					if (!$("#area1").val() || !$("#sub_ins1").val() || !$("#insname1").val() || !$("#trlocate1").val()) {
						alert("กรุณากรอกข้อมูลเขตตรวจราชการให้ครบทุกช่อง");
						break;
					}
				}}
			}
		}
	}
	</script>
</body>
</html>
