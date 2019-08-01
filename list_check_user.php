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

$division = isset($_POST['division'])?$_POST['division']:$_GET['div'];
$type = isset($_POST['selectedType'])?$_POST['selectedType']:$_GET['type'];

if (!empty($division) && !empty($type)) {
	$sql = "SELECT d.id,d.inspect_date,d.inspect_no,d.budget_year,rf.track_round,t.title_name,ins.firstname,ins.lastname,ul.name FROM data d, inspector ins, title t, userlogin ul, report_follow rf ";
	$sql .= " WHERE ins.titlename=t.id and d.inspector=ins.id and rf.division=ul.username and d.id=rf.data_id and rf.division='$division' and rf.track_round='$type'";
	$sql .= " ORDER BY insert_date DESC LIMIT {$start},{$perpage}";

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

	<title>แสดงรายการผลการดำเนินงานของหน่วยรับการตรวจ</title>

	<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3>
			<!-- MENU-LOCATION=NONE --><img class="img-fluid" src="./images/hd-13.jpg"></h3>
			<h3>แสดงรายการผลการดำเนินงานของหน่วยรับการตรวจ</h3>
			<br>
			<form name="report" action="list_check_user.php" method="post" enctype="multipart/form-data" id="report-form">
				<div class="form-row">
					<div class ="col-sm-4" style="margin-top:5px">
						<!-- <div class="container"> -->
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="selectedType" id="typeSelect1" value="1" <?php if($row['inspect_type']==1){echo "checked";}?> required />
							<label class="form-check-label" for="type1">ครั้งที่ 1</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="selectedType" id="typeSelect12" value="2" <?php if($row['inspect_type']==2){echo "checked";}?> required />
							<label class="form-check-label" for="type1">ครั้งที่ 2</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="selectedType" id="typeSelect13" value="3" <?php if($row['inspect_type']==3){echo "checked";}?> required />
							<label class="form-check-label" for="type1">ครั้งที่ 3</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="selectedType" id="typeSelect13" value="4" <?php if($row['inspect_type']==3){echo "checked";}?> required />
							<label class="form-check-label" for="type1">ครั้งที่ 4</label>
						</div>
						<!-- </div> -->
					</div>

					<div class="col-sm-5">
						<select class="form-control" name="division" id="division" required>
							<option value="">- กรุณาเลือก -</option>
							<?php
							$sql_receiver = "SELECT name,username FROM userlogin WHERE permission_group='2' ORDER BY name ASC";
							$query_receiver = mysqli_query($conn,$sql_receiver);
							?>
							<?php while ($data_receiver = mysqli_fetch_array($query_receiver)){ ?>
								<option <?php if($row['division']==$data_receiver['username']){echo "selected";}?> value="<?php echo $data_receiver['username']; ?>">
									<?php echo $data_receiver['name']; ?>
								</option>
							<?php }; ?>
						</select>
					</div>
					<div class="col-sm-1"></div>
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
							<th scope="col">ดูข้อมูล</th>
						</tr>
					</thead>
					<tbody>

						<?php
						if (!empty($division) && !empty($type)) {
							if (mysqli_num_rows($query_detail) >= 1) {
								while ($data = mysqli_fetch_assoc($query_detail)){
									//query join table
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
										<td><?php echo $track; ?></td>
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
										<td><a href="view_user.php?id=<?=$id?>&div=<?=$division?>&t=<?=$type?>"><i class='fas fa-file'></i></a></td>
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
										<a class="page-link" href="list_check_user.php?page=1&div=<?=$division?>&type=<?=$type?>" aria-label="First">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">First</span>
										</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="list_check_user.php?page=<?php echo ($page - 1);?>&div=<?=$division?>&type=<?=$type?>" aria-label="Previous">
											<span aria-hidden="true">&lt;</span>
											<span class="sr-only">Previous</span>
										</a>
									</li>
								<?php } ?>

								<?php for($i=$start_loop;$i<=$end_loop+1;$i++){ ?>
									<li class="page-item">
										<a class="page-link" href="list_check_user.php?page=<?php echo $i; ?>&div=<?=$division?>&type=<?=$type?>">
											<?php echo $i; ?>
										</a>
									</li>
								<?php } ?>

								<?php if($page <= $end_loop){ ?>
									<li class="page-item">
										<a class="page-link" href="list_check_user.php?page=<?php echo ($page + 1);?>&div=<?=$division?>&type=<?=$type?>" aria-label="Next">
											<span aria-hidden="true">&gt;</span>
											<span class="sr-only">Next</span>
										</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="list_check_user.php?page=<?php echo $total_pages;?>&div=<?=$division?>&type=<?=$type?>" aria-label="Last">
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
		<!-- JScript -->
		<script>

		</script>
	</body>
	</html>
