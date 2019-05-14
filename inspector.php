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
$sql_detail = "SELECT d.id,d.inspector,d.division,d.inspect_level,d.inspect_date,d.inspect_no,d.budget_year,d.insert_date,t.title_name,ins.firstname,ins.lastname,ul.name from data d, inspector ins, title t, userlogin ul where ins.titlename=t.id and d.inspector=ins.id and d.division=ul.username
							 ORDER BY insert_date DESC LIMIT {$start},{$perpage}";

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
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<!-- Style CSS -->
	<style>
	body{
		background-color: #FFF;
	}
	</style>

	<title>แสดงรายชื่อผู้ตรวจราชการ กรมพินิจและคุ้มตรองเด็กและเยาวชน</title>

</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3>
			<!-- MENU-LOCATION=NONE -->
			<img class="img-fluid" src="./images/hd-13.jpg"></h3>
			<h3>แสดงรายชื่อผู้ตรวจราชการ กรมพินิจและคุ้มตรองเด็กและเยาวชน</h3>
			<div align="left"><button class="myButton" onclick="javascript:window.location.href ='form-add-ins.php?menu=add';">เพิ่มข้อมูลผู้ตรวจราชการ</button></div>
			<br>
			<div class="container table-responsive">
				<table class="table table-striped" style="background-color:white;">
				<thead>
					<tr>
						<th scope="col">ลำดับ</th>
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
							<td><?php echo $num_rows; ?></td>
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
							<td><a href="form-add.php?menu=edit&i=<?=$id?>"><i class='fas fa-pen'></i></a></td>
						</tr>
					<?php
				 };
			 } else {
				 echo "<td colspan='5'>Please Add more data...</td>";
			 }
				 ?>
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
								<a class="page-link" href="list.php?page=1" aria-label="First">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">First</span>
								</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="list.php?page=<?php echo ($page - 1);?>" aria-label="Previous">
									<span aria-hidden="true">&lt;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
						<?php } ?>

						<?php for($i=$start_loop;$i<=$end_loop+1;$i++){ ?>
							<li class="page-item">
								<a class="page-link" href="list.php?page=<?php echo $i; ?>">
									<?php echo $i; ?>
								</a>
							</li>
						<?php } ?>

						<?php if($page <= $end_loop){ ?>
							<li class="page-item">
								<a class="page-link" href="list.php?page=<?php echo ($page + 1);?>" aria-label="Next">
									<span aria-hidden="true">&gt;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="list.php?page=<?php echo $total_pages;?>" aria-label="Last">
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
