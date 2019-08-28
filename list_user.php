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
//Time Zone Set
date_default_timezone_set('Asia/Bangkok');
$currentdate = date('Y-m-d');

$locate = $_SESSION["user"];
if (substr($locate,0,2) == "sp") {
	$check_locate = 1;
} elseif (substr($locate,0,2) == "tr") {
	$check_locate = 2;
} else {
	$check_locate = 3;
}

$perpage = 10;	//จำนวนข้อมูลในแต่ละหน้า
$page = '';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$start = ($page - 1) * $perpage; //ตำแหน่งข้อมูลแรกในแต่ละหน้า

$sql_detail = "SELECT d.id,d.inspector,d.division,d.inspect_level,d.inspect_date,d.inspect_no,d.budget_year,d.insert_date,t.title_name,ins.firstname,ins.lastname,ul.name,d.cb1_1,d.cb1_2,d.cb1_3,d.cb1_4,d.cb1_5,d.cb2_1,d.cb2_2,d.cb2_3,d.cb2_4,d.cb2_5,d.cb2_6,d.cb2_7,d.cb3_1,d.cb3_2,d.cb3_3,d.cb3_4,d.cb3_5,d.cb3_6,d.cb3_7,d.cb3_8,d.cb3_9,d.cb3_10";
$sql_detail .= " from data d, inspector ins, userlogin ul, title t";
if ($check_locate == 1 || $check_locate == 2) {
	$sql_detail .= " WHERE (d.r1_1 is not null or d.r1_2 is not null or d.r1_3 is not null or d.r1_4 is not null or d.r1_5 is not null or d.r2_1 is not null or d.r2_2 is not null or d.r2_3 is not null or d.r2_4 is not null or d.r2_5 is not null or d.r2_6 is not null or d.r2_7 is not null or d.r3_1 is not null or d.r3_2 is not null or d.r3_3 is not null or d.r3_4 is not null or d.r3_5 is not null or d.r3_6 is not null or d.r3_7 is not null or d.r3_8 is not null or d.r3_9 is not null or d.r3_10 is not null) and ";
	$sql_detail .= " division = '$locate' and type_locate = $check_locate and ";
	$sql_detail .= " d.inspector=ins.id and d.division=ul.username and t.id=ins.titlename ORDER BY insert_date DESC LIMIT ".$start.",".$perpage;
} else {
	$sql_detail .= " WHERE (d.r1_1 is not null or d.r1_2 is not null or d.r1_3 is not null or d.r1_4 is not null or d.r1_5 is not null or d.r2_1 is not null or d.r2_2 is not null or d.r2_3 is not null or d.r2_4 is not null or d.r2_5 is not null or d.r2_6 is not null or d.r2_7 is not null or d.r3_1 is not null or d.r3_2 is not null or d.r3_3 is not null or d.r3_4 is not null or d.r3_5 is not null or d.r3_6 is not null or d.r3_7 is not null or d.r3_8 is not null or d.r3_9 is not null or d.r3_10 is not null) and ";
	if ($_GET['user'] == 99) {
		$sql_detail .= " (d.cb1_5 LIKE '%6%' or d.cb2_1 LIKE '%6%' or d.cb2_2 LIKE '%6%' or d.cb2_3 LIKE '%6%' or d.cb2_4 LIKE '%6%' or d.cb2_5 LIKE '%6%' or d.cb2_6 LIKE '%6%' or d.cb2_7 LIKE '%6%' or d.cb3_1 LIKE '%6%' or d.cb3_2 LIKE '%6%' or d.cb3_3 LIKE '%6%' or d.cb3_4 LIKE '%6%' or d.cb3_5 LIKE '%6%' or d.cb3_6 LIKE '%6%' or d.cb3_8 LIKE '%6%' or d.cb3_9 LIKE '%6%') and ";
	} elseif ($_GET['user'] == 100) {
		$sql_detail .= " (d.cb1_5 LIKE '%7%' or d.cb2_1 LIKE '%7%' or d.cb2_2 LIKE '%7%' or d.cb2_3 LIKE '%7%' or d.cb2_6 LIKE '%7%' or d.cb2_7 LIKE '%7%' or d.cb3_1 LIKE '%7%' or d.cb3_2 LIKE '%7%' or d.cb3_3 LIKE '%7%' or d.cb3_4 LIKE '%7%' or d.cb3_5 LIKE '%7%') and ";
	} elseif ($_GET['user'] == 101) {
		$sql_detail .= " (d.cb1_1 LIKE '%1%' or d.cb3_5 LIKE '%1%' or d.cb3_7 LIKE '%1%') and ";
	} elseif ($_GET['user'] == 102) {
		$sql_detail .= " (d.cb1_2 LIKE '%3%' or d.cb1_3 LIKE '%3%' or d.cb1_4 LIKE '%3%') and ";
	} elseif ($_GET['user'] == 103) {
		$sql_detail .= " (d.cb1_5 LIKE '%5%' or d.cb3_7 LIKE '%5%') and ";
	} elseif ($_GET['user'] == 104) {
		$sql_detail .= " (d.cb1_2 LIKE '%4%' or d.cb1_3 LIKE '%4%' or d.cb1_4 LIKE '%4%' or d.cb3_7 LIKE '%4%' or d.cb3_8 LIKE '%4%' or d.cb3_9 LIKE '%4%' or d.cb3_10 LIKE '%4%') and ";
	} elseif ($_GET['user'] == 105) {
		$sql_detail .= " (d.cb1_1 LIKE '%2%' or d.cb2_1 LIKE '%2%' or d.cb2_2 LIKE '%2%' or d.cb2_3 LIKE '%2%' or d.cb2_4 LIKE '%2%' or d.cb2_5 LIKE '%2%' or d.cb2_6 LIKE '%2%' or d.cb2_7 LIKE '%2%' or d.cb3_1 LIKE '%2%' or d.cb3_2 LIKE '%2%' or d.cb3_3 LIKE '%2%' or d.cb3_4 LIKE '%2%' or d.cb3_5 LIKE '%2%' or d.cb3_6 LIKE '%2%' or d.cb3_7 LIKE '%2%' or d.cb3_8 LIKE '%2%') and ";
	} else {
		$sql_detail .= "";
	}
	$sql_detail .= " d.inspector=ins.id and d.division=ul.username and t.id=ins.titlename ORDER BY insert_date DESC LIMIT ".$start.",".$perpage;
}
$query_detail = mysqli_query($conn, $sql_detail);
$num_rows = 0;
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
				<thead class="thead-dark">
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
					if (mysqli_num_rows($query_detail) >= 1) {
						while ($data = mysqli_fetch_assoc($query_detail)){
							//query join table
							$id = $data['id'];
							$inspector = $data['inspector'];
							$division = $data['division'];
							$inspect_level = $data['inspect_level'];
							$inspect_date = $data['inspect_date'];
							$inspect_no = $data['inspect_no'];
							$budget_year = $data['budget_year'];
							$fullname = $data['title_name'].$data['firstname']." ".$data['lastname'];
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
								<td><a href="form-add-user.php?user=<?=$_GET['user']?>&i=<?=$id?>"><i class='fas fa-pen'></i></a></td>
							</tr>
							<?php
						};
					} else {
						echo "<td colspan='5'>No data from inspector...</td>";
					}
					?>
				</tbody>
			</table>
			<!-- -->
			<div class="container">
				<?php
				// $sql3 = "SELECT * FROM data"; //select items มาเพื่อนับจำนวนทั้งหมด มาหาจำนวนหน้า
				// $query3 = mysqli_query($conn, $sql3);
				$total_record = mysqli_num_rows($query_detail);
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
