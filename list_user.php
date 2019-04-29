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

$check_locate = substr($_SESSION["user"],0,2)=="sp"?"1":"2";
$perpage = 10;	//จำนวนข้อมูลในแต่ละหน้า
$page = '';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$start = ($page - 1) * $perpage; //ตำแหน่งข้อมูลแรกในแต่ละหน้า
$sql_detail = "SELECT d.id,d.inspector,d.division,d.inspect_level,d.inspect_date,d.inspect_no,d.budget_year,d.insert_date,ins.fullname,ul.name from data d, inspector ins,userlogin ul";
$sql_detail .= " WHERE (r1_1 is not null or r1_2 is not null or r1_3 is not null or r1_4 is not null or r1_5 is not null or r2_1 is not null or r2_2 is not null or r2_3 is not null or r2_4 is not null or r2_5 is not null or r2_6 is not null or r2_7 is not null or r3_1 is not null or r3_2 is not null or r3_3 is not null or r3_4 is not null or r3_5 is not null or r3_6 is not null or r3_7 is not null or r3_8 is not null or r3_9 is not null or r3_10 is not null) and ";
$sql_detail .= " type_locate = $check_locate and d.inspector=ins.id and d.division=ul.username";
$sql_datail .= " ORDER BY insert_date DESC LIMIT {$start},{$perpage}";

$query_detail = mysqli_query($conn, $sql_detail);
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

	<!-- Style CSS -->
	<style>
	body{
		background-color: #FFF;
	}
	</style>

	<title>แสดงรายการตรวจราชการของผู้ตรวจ  <?=$_SESSION['uname'];?></title>

	<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3>
			<!-- MENU-LOCATION=NONE --><img class="img-fluid" src="./images/hd-13.jpg"></h3>
			<h3>แสดงรายการตรวจราชการของผู้ตรวจ  <?=$_SESSION['uname'];?></h3><br>
			<div class="container table-responsive">
				<table class="table table-striped" style="background-color:white;">
					<!--
					<div class="row float-right"><small>*หมายเหตุ สีตัวอักษรของกำหนดการตอบกลับ</small>&nbsp;<small style="color:green">สีเขียว หมายถึง ยังไม่เกินเวลาตอบกลับ</small>&nbsp;<small style="color:red">สีแดง หมายถึง เกินกำหนดเวลาตอบกลับแล้ว</small></div>
				-->
				<thead>
					<tr>
						<th scope="col">ผู้ตรวจ</th>
						<th scope="col">หน่วยงาน</th>
						<th scope="col">ครั้งที่</th>
						<th scope="col">วันที่ตรวจ</th>
						<th scope="col">แก้ไข</th>
					</tr>
				</thead>
				<tbody>

					<?php
					while ($data = mysqli_fetch_assoc($query_detail)){
						//query join table
						$id = $data['id'];
						$inspector = $data['inspector'];
						$division = $data['division'];
						$inspect_level = $data['inspect_level'];
						$inspect_date = $data['inspect_date'];
						$inspect_no = $data['inspect_no'];
						$budget_year = $data['budget_year'];
						$fullname = $data['fullname'];
						$name_division = $data['name'];
						$num_rows++;
						?>
						<tr>
							<td><?php echo $fullname; ?></td>
							<td><?php echo $name_division; ?></td>
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
							<td><a href="form-add-user.php?user=<?=$_GET['user']?>&i=<?=$id?>"><img src="./images/edit.png" width="18" height="18" border="0" /></a></td>
						</tr>
					<?php }; ?>
				</tbody>
			</table>
			<!-- -->
			<div class="container">
				<?php
				$sql3 = "SELECT *FROM data"; //select items มาเพื่อนับจำนวนทั้งหมด มาหาจำนวนหน้า
				$query3 = mysqli_query($conn, $sql3);
				$total_record = mysqli_num_rows($query3);
				$total_pages = ceil($total_record / $perpage);

				$start_loop = $page; //start ที่ page= ที่getมา
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
								<a class="page-link" href="list_user.php?user=<?=$_GET['user']?>&page=1" aria-label="First">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">First</span>
								</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="list_user.php?user=<?=$_GET['user']?>&page=<?php echo ($page - 1);?>" aria-label="Previous">
									<span aria-hidden="true">&lt;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
						<?php } ?>

						<?php for($i=$start_loop;$i<=$end_loop+1;$i++){ ?>
							<li class="page-item">
								<a class="page-link" href="list_user.php?user=<?=$_GET['user']?>&page=<?php echo $i; ?>">
									<?php echo $i; ?>
								</a>
							</li>
						<?php } ?>

						<?php if($page <= $end_loop){ ?>
							<li class="page-item">
								<a class="page-link" href="list_user.php?user=<?=$_GET['user']?>&page=<?php echo ($page + 1);?>" aria-label="Next">
									<span aria-hidden="true">&gt;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="list_user.php?user=<?=$_GET['user']?>&page=<?php echo $total_pages;?>" aria-label="Last">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Last</span>
								</a>
							</li>
						<?php } ?>
					</ul><!-- pagination -->
				</nav>
			</div><!-- /container -->
			<!-- -->
		</div>
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

	</script>
</body>
</html>
