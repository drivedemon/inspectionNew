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

$perpage = 10;	//จำนวนข้อมูลในแต่ละหน้า
$page = '';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$start = ($page - 1) * $perpage; //ตำแหน่งข้อมูลแรกในแต่ละหน้า

$division = isset($_POST['division'])?$_POST['division']:$_GET['division'];
$instype = isset($_POST['type'])?$_POST['type']:$_GET['type'];

if (!empty($division) && !empty($instype)) {
	if ($instype == 1) {
		$sql = "SELECT d.id,d.inspect_date,d.inspect_no,d.budget_year,t.title_name,ins.firstname,ins.lastname,ul.name FROM data d, inspector ins, title t, userlogin ul";
		$sql .= " WHERE ins.titlename=t.id and d.inspector=ins.id and d.division=ul.username and d.division='$division'";
	} else {
		$sql = "SELECT DISTINCT d.id,d.inspect_date,d.inspect_no,d.budget_year,MAX(rf.track_round) as track_round,t.title_name,ins.firstname,ins.lastname,ul.name FROM data d, inspector ins, title t, userlogin ul, report_follow rf ";
		$sql .= " WHERE ins.titlename=t.id and d.inspector=ins.id and d.division=ul.username and d.id=rf.data_id and rf.division='$division'";
		$sql .= " group by d.id,d.inspect_date,d.inspect_no,d.budget_year,t.title_name,ins.firstname,ins.lastname,ul.name";
	}
	$sql .= " ORDER BY insert_date DESC LIMIT {$start},{$perpage}";
	// echo "$sql";
	$query_detail = mysqli_query($conn, $sql);
}
$num_rows = 0;

//Time Zone Set
date_default_timezone_set('Asia/Bangkok');
$currentdate = date('Y-m-d');

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
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<!-- Style CSS -->
	<style>
	body{
		background-color: #FFF;
	}
	</style>

	<title>สรุปรายงานจำแนกรายหน่วยงาน</title>

	<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3>
			<!-- MENU-LOCATION=NONE --><img class="img-fluid" src="./images/hd-13.jpg"></h3>
			<h3>สรุปรายงานจำแนกรายหน่วยงาน</h3>
			<br>
			<form name="report" action="select_export.php" method="post" enctype="multipart/form-data" id="report-form">
				<div class="form-row">
					<div class="col-sm-1"></div>
					<div class ="col-sm-4" style="margin-top:5px">
						<!-- <div class="container"> -->
						<!-- <div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="selectedType" id="typeSelect1" value="1" required />
						<label class="form-check-label" for="typeSelect1">ครั้งที่ 1</label>
					</div>
					<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="selectedType" id="typeSelect2" value="2" required />
					<label class="form-check-label" for="typeSelect2">ครั้งที่ 2</label>
				</div>
				<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="selectedType" id="typeSelect3" value="3" required />
				<label class="form-check-label" for="typeSelect3">ครั้งที่ 3</label>
			</div>
			<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="selectedType" id="typeSelect4" value="4" required />
			<label class="form-check-label" for="typeSelect4">ครั้งที่ 4</label>
		</div> -->
		<!-- </div> -->
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="type" id="type1" onclick="selected('1');" value="1" required />
			<label class="form-check-label" for="type1">สำหรับอธิบดี</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="type" id="type2" onclick="selected('2');" value="2" required />
			<label class="form-check-label" for="type2">สำหรับในหน่วยงาน</label>
		</div>
	</div>

	<div class="col-sm-5">
		<select style="width:400px;" class="form-control form-control-sm" name="division" id="division" required>
			<option value="">- กรุณาเลือก -</option>
		</select>
	</div>
	<div class="col-sm-2"></div>
	<div class="col-sm-12"><p></div>
		<div class="col-sm-12"><p></div>
			<div class="col-sm-5"></div>
			<div class="col-sm-2">
				<button class="btn btn-block" style="background-color: #DB2626; color:#ffffff; font-size: 16px;"><i class="fa fa-search"></i>&nbsp;&nbsp; ค้นหาหน่วยงาน </button>
			</div>
		</div>
		<br>
	</form>
	<div class="container table-responsive">
		<table class="table table-striped" style="background-color:white;">
			<thead class="thead-dark">
				<tr>
					<th scope="col">ผู้ตรวจ</th>
					<th scope="col">หน่วยงาน</th>
					<th scope="col">การติดตาม</th>
					<th scope="col">รอบที่</th>
					<th scope="col">วันที่ตรวจ</th>
					<th scope="col">พิมพ์รายงาน</th>
				</tr>
			</thead>
			<tbody>

				<?php
				if (!empty($division) && !empty($instype)) {
					if (mysqli_num_rows($query_detail) >= 1) {
						while ($data = mysqli_fetch_assoc($query_detail)){
							$id = $data['id'];
							$inspect_date = $data['inspect_date'];
							$inspect_no = $data['inspect_no'];
							$budget_year = $data['budget_year'];
							$track = $data['track_round'];
							$fullname = $data['title_name'].$data['firstname']." ".$data['lastname'];
							$name_division = $data['name'];
							$num_rows++;
							?>
							<tr>
								<td><?php echo $fullname; ?></td>
								<td><?php echo $name_division; ?></td>
								<td><?php echo (!empty($track))?"<i class='fas fa-check'></i>":"-"; ?></td>
								<td><?php echo $inspect_no.'/'.$budget_year; ?></td>
								<td>
									<?php
									$sent_date = date_create($inspect_date);
									$sday = date_format($sent_date,"d");
									$smonth = date_format($sent_date,"m");
									$syear = date_format($sent_date,"Y")+543;
									echo $sday."/".$smonth."/".$syear;
									?>
								</td>
								<td>
									<?php
									if ($instype == 1) {
										?>
										<a href="print_slip.php?id=<?=$id?>&division=<?=$division?>&t=<?=$instype?>"><i class='fas fa-print'></i></a>
										<?php
									} else {
										?>
										<a href="export_excel.php?id=<?=$id?>&division=<?=$division?>&t=<?=$instype?>"><i class='fas fa-print'></i></a>
										<?php
									}
									?>
								</td>
							</tr>
							<?php
						};
					} else {
						echo "<td colspan='6'>No data...</td>";
					}
				} else {
					echo "<td colspan='6'>Please fill the form...</td>";
				}
				?>
			</tbody>
		</table>
		<!-- pagination -->
		<div class="container">
			<?php
			if ($query_detail) {
				$total_record = mysqli_num_rows($query_detail);
				$total_pages = ceil($total_record / $perpage);

				$start_loop = $page;
				$difference = $total_pages - $page;
				if($difference <= 5)
				{
					$start_loop = $total_pages-5;
				}
				$end_loop = $start_loop + 4;
				if($total_pages <=5){
					$start_loop = 1;
				}
				?>
				<nav>
					<ul class="pagination justify-content-center">
						<?php if($page > 1){ ?>
							<li class="page-item">
								<a class="page-link" href="select_export.php?page=1&division=<?=$division?>&type=<?=$instype?>" aria-label="First">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">First</span>
								</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="select_export.php?page=<?php echo ($page - 1);?>&division=<?=$division?>&type=<?=$instype?>" aria-label="Previous">
									<span aria-hidden="true">&lt;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
						<?php } ?>

						<?php for($i=$start_loop;$i<=$end_loop+1;$i++){ ?>
							<li class="page-item">
								<a class="page-link" href="select_export.php?page=<?php echo $i; ?>&division=<?=$division?>&type=<?=$instype?>">
									<?php echo $i; ?>
								</a>
							</li>
						<?php } ?>

						<?php if($page <= $end_loop){ ?>
							<li class="page-item">
								<a class="page-link" href="select_export.php?page=<?php echo ($page + 1);?>&division=<?=$division?>&type=<?=$instype?>" aria-label="Next">
									<span aria-hidden="true">&gt;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="select_export.php?page=<?php echo $total_pages;?>&division=<?=$division?>&type=<?=$instype?>" aria-label="Last">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Last</span>
								</a>
							</li>
							<?php
						}
					}
					?>
				</ul><!-- pagination -->
			</nav>
		</div><!-- /container -->
		<!-- -->
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
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<!-- JScript -->
<script>
function selected(i) {
	// let t1 = document.getElementById("typeSelect1");
	// let t2 = document.getElementById("typeSelect2");
	// let t3 = document.getElementById("typeSelect3");
	// let t4 = document.getElementById("typeSelect4");
	if (i == 1) {
		typeexport(i);
		// t1.checked = false;
		// t2.checked = false;
		// t3.checked = false;
		// t4.checked = false;
		// t1.disabled = true;
		// t2.disabled = true;
		// t3.disabled = true;
		// t4.disabled = true;
	} else {
		typeexport(i);
		// t1.disabled = false;
		// t2.disabled = false;
		// t3.disabled = false;
		// t4.disabled = false;
	}
}

function typeexport(n) {
	type = "t="+n;
	$.ajax({
		url: "ajax_get_section.php",
		data: type,
		type: "POST",
		async:false,
		success: function(data, status) {
			$("#division").empty();
			$("#division").append('<option value="">- กรุณาเลือก -</option>');
			$("#division").append(data);
			var q = data;
		},
		error: function(xhr, status, exception) { alert(status); }
	});
}
</script>
</body>
</html>
