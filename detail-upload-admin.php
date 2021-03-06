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
$sql_detail = "SELECT * FROM report ORDER BY date_sent DESC LIMIT {$start},{$perpage}";
$query_detail = mysqli_query($conn, $sql_detail);
$num_rows = 0;

//Time Zone Set
date_default_timezone_set('Asia/Bangkok');
$currentdate = date('Y-m-d');


//delete
if($_GET['did'] !=""){
	$sql = "SELECT file FROM report WHERE id = '".$_GET['did']."'";
	$getname = mysqli_query($conn,$sql)or die(mysqli_query());
	$fnameDelete = mysqli_fetch_assoc($getname);

	$sql_Delete = "delete from report where id='".$_GET['did']."'";
	$getname = mysqli_query($conn,$sql_Delete)or die(mysqli_query());
	$f_delete = "files-report/".$fnameDelete['file'];
	@unlink($f_delete);
	header("location:detail-upload-admin.php");
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	<!-- Style CSS -->
	<style>
	body{
		background-color: #FFF;
	}
	</style>


	<title>รายงานผลการตรวจสอบตามแผนประจำปี</title>

	<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
</head>

<!-- Body -->
<body>
	<div class="container pt-3 text-center">
		<h3>
			<!-- MENU-LOCATION=NONE -->
			<img src="./images/hd-13.jpg" width="1000" height="150">
		</h3>
		<h3>รายงานผลการตรวจสอบตามแผนประจำปี</h3>
		<div class="container table-responsive">
			<table class="table table-striped" style="background-color:white;">
				<!--
				<div class="row float-right"><small>*หมายเหตุ สีตัวอักษรของกำหนดการตอบกลับ</small>&nbsp;<small style="color:green">สีเขียว หมายถึง ยังไม่เกินเวลาตอบกลับ</small>&nbsp;<small style="color:red">สีแดง หมายถึง เกินกำหนดเวลาตอบกลับแล้ว</small></div>
			-->
			<thead>
				<tr>
					<th scope="col">ปีงบประมาณ</th>
					<th scope="col">รอบที่ออกตรวจ</th>
					<th scope="col">ถึงหน่วยงาน</th>
					<th scope="col">วันที่อธิบดีลงนาม</th>
					<th scope="col">วันที่อัพโหลดไฟล์เข้าระบบ</th>
					<th scope="col">ไฟล์แนบ</th>
					<th scope="col">ลบไฟล์</th>
				</tr>
			</thead>
			<tbody>

				<?php while ($data_detail = mysqli_fetch_array($query_detail)){
					$sql_receiver = "SELECT name FROM userlogin WHERE id=".$data_detail['receiver']."";
					$query_receiver = mysqli_query($conn,$sql_receiver);
					$data_receiver = mysqli_fetch_array($query_receiver);
					$num_rows++;

					$title = addslashes(trim($data_detail['date_year']));
					$title = htmlspecialchars($title,ENT_QUOTES);
					$title = mysqli_real_escape_string($conn,$title);

					$number = addslashes(trim($data_detail['number']));
					$number = htmlspecialchars($number,ENT_QUOTES);
					$number = mysqli_real_escape_string($conn,$number);

					$del_id = $data_detail['id']
					?>
					<tr>
						<td><?php echo $title; ?></td>
						<td><?php echo "รอบที่ ".$number; ?></td>
						<td><?php echo $data_receiver['name']; ?></td>
						<td>
							<?php
							$sent_date = date_create($data_detail['date_sent']);
							$sday = date_format($sent_date,"d");
							$smonth = date_format($sent_date,"m");
							$syear = date_format($sent_date,"Y")+543;
							echo $sday."/".$smonth."/".$syear;
							?>
						</td>
						<td>
							<?php
							$date = date_create($data_detail['insert_date']);
							$day = date_format($date,"d");
							$month = date_format($date,"m");
							$year = date_format($date,"Y")+543;
							$current = date_create($currentdate);
							$diff = date_diff($current,$date);
							$diffdate = $diff->format("%R%a");
							echo "<p>".$day."/".$month."/".$year."</p>";
							/*if($diffdate>=0){
							echo "<p style='color:green;'>".$day."/".$month."/".$year."</p>"."<br/>";
						}else{
						echo "<p style='color:red;'>".$day."/".$month."/".$year."</p>"."<br/>";
					}*/

					?>
				</td>
				<td>
					<?php
					$allowed_types=array('pdf');
					$dir ="files-report/".$data_detail['file']."/";
					if(is_dir($dir)){
						$files1 = scandir($dir);
						foreach($files1 as $key=>$value){
							if($key>1){
								$file_parts = explode('.',$value);
								$ext = strtolower(array_pop($file_parts));
								if(in_array($ext,$allowed_types)){ ?>
									<a href="<?php echo $dir; ?><?php echo $value; ?>" target="_blank"><?php echo $value; ?></a>
								<?php }
							}
						}
					}
					else{
						$dir = "files-report/";
						$fileindir = $dir.$data_detail['file'];
						if(file_exists($fileindir)){?>
							<a href="<?php echo $dir; ?><?php echo $data_detail['file']; ?>" target="_blank"><?php echo $data_detail['file']; ?></a>
						<?php	}
						else{
							echo ("ไม่พบไฟล์แนบ");
						}
					} ?>
				</td>
				<td>
					<a href="detail-upload-admin.php?did=<?=$del_id?>" onClick="return Confd(this)"><img src="./images/delete_icon.gif" width="16" height="16" border="0" /></a>
				</td>
			</tr>
		<?php }; ?>
	</tbody>
</table>
<!-- -->
<div class="container">
	<?php
	$sql3 = "SELECT * FROM report"; //select items มาเพื่อนับจำนวนทั้งหมด มาหาจำนวนหน้า
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
					<a class="page-link" href="detail-report.php?page=1" aria-label="First">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">First</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="detail-report.php?page=<?php echo ($page - 1);?>" aria-label="Previous">
						<span aria-hidden="true">&lt;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
			<?php } ?>

			<?php for($i=$start_loop;$i<=$end_loop+1;$i++){ ?>
				<li class="page-item">
					<a class="page-link" href="detail-report.php?page=<?php echo $i; ?>">
						<?php echo $i; ?>
					</a>
				</li>
			<?php } ?>

			<?php if($page <= $end_loop){ ?>
				<li class="page-item">
					<a class="page-link" href="detail-report.php?page=<?php echo ($page + 1);?>" aria-label="Next">
						<span aria-hidden="true">&gt;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="detail-report.php?page=<?php echo $total_pages;?>" aria-label="Last">
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
<script language="JavaScript">

function Confd(object) {

	if (confirm("ยืนยันการลบข้อมูล") == true) {

		return true;

	}

	return false;

}
</script>
</body>
</html>
