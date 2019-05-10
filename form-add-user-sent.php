<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');
session_start();

// hidden input
$menu = $_POST['menu'];
$locate = $_POST['locate'];
$cen_locate = $_POST['cen_locate'];
$id = $_POST['inid'];
$user = $_SESSION["user"];
$uID = $_SESSION["userID"];
$c_date = date("Y-m-d H:i:s");

echo "$uID";

if ($cen_locate != 3) {
	//activity 1 || sub province 1
	$sub_pr1_1 = (isset($_POST['sub_pr1_1']))? $_POST["sub_pr1_1"]:'';
	$sub_pr1_2 = (isset($_POST['sub_pr1_2']))? $_POST["sub_pr1_2"]:'';
	$sub_pr1_3 = (isset($_POST['sub_pr1_3']))? $_POST["sub_pr1_3"]:'';
	$sub_pr1_4 = (isset($_POST['sub_pr1_4']))? $_POST["sub_pr1_4"]:'';
	$sub_pr1_5 = (isset($_POST['sub_pr1_5']))? $_POST["sub_pr1_5"]:'';
	//activity 1 || sub province 2
	$sub_pr2_1 = (isset($_POST['sub_pr2_1']))? $_POST["sub_pr2_1"]:'';
	$sub_pr2_2 = (isset($_POST['sub_pr2_2']))? $_POST["sub_pr2_2"]:'';
	$sub_pr2_3 = (isset($_POST['sub_pr2_3']))? $_POST["sub_pr2_3"]:'';
	$sub_pr2_4 = (isset($_POST['sub_pr2_4']))? $_POST["sub_pr2_4"]:'';
	$sub_pr2_5 = (isset($_POST['sub_pr2_5']))? $_POST["sub_pr2_5"]:'';
	$sub_pr2_6 = (isset($_POST['sub_pr2_6']))? $_POST["sub_pr2_6"]:'';
	$sub_pr2_7 = (isset($_POST['sub_pr2_7']))? $_POST["sub_pr2_7"]:'';
	//activity 1 || sub province 3
	$sub_pr3_1 = (isset($_POST['sub_pr3_1']))? $_POST["sub_pr3_1"]:'';
	$sub_pr3_2 = (isset($_POST['sub_pr3_2']))? $_POST["sub_pr3_2"]:'';
	$sub_pr3_3 = (isset($_POST['sub_pr3_3']))? $_POST["sub_pr3_3"]:'';
	$sub_pr3_4 = (isset($_POST['sub_pr3_4']))? $_POST["sub_pr3_4"]:'';
	$sub_pr3_5 = (isset($_POST['sub_pr3_5']))? $_POST["sub_pr3_5"]:'';
	$sub_pr3_6 = (isset($_POST['sub_pr3_6']))? $_POST["sub_pr3_6"]:'';
	$sub_pr3_7 = (isset($_POST['sub_pr3_7']))? $_POST["sub_pr3_7"]:'';
	$sub_pr3_8 = (isset($_POST['sub_pr3_8']))? $_POST["sub_pr3_8"]:'';
	$sub_pr3_9 = (isset($_POST['sub_pr3_9']))? $_POST["sub_pr3_9"]:'';
	$sub_pr3_10 = (isset($_POST['sub_pr3_10']))? $_POST["sub_pr3_10"]:'';
} else {
	// act center 1
	$cen1_1 = (isset($_POST['cen1_1']))? $_POST["cen1_1"]:'';
	$cen1_2 = (isset($_POST['cen1_2']))? $_POST["cen1_2"]:'';
	$cen1_3 = (isset($_POST['cen1_3']))? $_POST["cen1_3"]:'';
	$cen1_4 = (isset($_POST['cen1_4']))? $_POST["cen1_4"]:'';
	$cen1_5 = (isset($_POST['cen1_5']))? $_POST["cen1_5"]:'';
	// act center 2
	$cen2_1 = (isset($_POST['cen2_1']))? $_POST["cen2_1"]:'';
	$cen2_2 = (isset($_POST['cen2_2']))? $_POST["cen2_2"]:'';
	$cen2_3 = (isset($_POST['cen2_3']))? $_POST["cen2_3"]:'';
	$cen2_4 = (isset($_POST['cen2_4']))? $_POST["cen2_4"]:'';
	$cen2_5 = (isset($_POST['cen2_5']))? $_POST["cen2_5"]:'';
	$cen2_6 = (isset($_POST['cen2_6']))? $_POST["cen2_6"]:'';
	$cen2_7 = (isset($_POST['cen2_7']))? $_POST["cen2_7"]:'';
	// act center 3
	$cen3_1 = (isset($_POST['cen3_1']))? $_POST["cen3_1"]:'';
	$cen3_2 = (isset($_POST['cen3_2']))? $_POST["cen3_2"]:'';
	$cen3_3 = (isset($_POST['cen3_3']))? $_POST["cen3_3"]:'';
	$cen3_4 = (isset($_POST['cen3_4']))? $_POST["cen3_4"]:'';
	$cen3_5 = (isset($_POST['cen3_5']))? $_POST["cen3_5"]:'';
	$cen3_6 = (isset($_POST['cen3_6']))? $_POST["cen3_6"]:'';
	$cen3_7 = (isset($_POST['cen3_7']))? $_POST["cen3_7"]:'';
	$cen3_8 = (isset($_POST['cen3_8']))? $_POST["cen3_8"]:'';
	$cen3_9 = (isset($_POST['cen3_9']))? $_POST["cen3_9"]:'';
	$cen3_10 = (isset($_POST['cen3_10']))? $_POST["cen3_10"]:'';
}

// ================================ check menu center or province (update data) ================================ //
// ------------------------------------------------ edit for province ------------------------------------------------ //
if ($menu == "edit") {
	$sql = "UPDATE data SET ";
	// reason 1 from sub province
	$sql .= "sub_pr1_1 = ".((empty($sub_pr1_1))? "NULL" : "'$sub_pr1_1'");
	$sql .= ", sub_pr1_2 = ".((empty($sub_pr1_2))? "NULL" : "'$sub_pr1_2'");
	$sql .= ", sub_pr1_3 = ".((empty($sub_pr1_3))? "NULL" : "'$sub_pr1_3'");
	$sql .= ", sub_pr1_4 = ".((empty($sub_pr1_4))? "NULL" : "'$sub_pr1_4'");
	$sql .= ", sub_pr1_5 = ".((empty($sub_pr1_5))? "NULL" : "'$sub_pr1_5'");
	// reason 2 from sub province
	$sql .= ", sub_pr2_1 = ".((empty($sub_pr2_1))? "NULL" : "'$sub_pr2_1'");
	$sql .= ", sub_pr2_2 = ".((empty($sub_pr2_2))? "NULL" : "'$sub_pr2_2'");
	$sql .= ", sub_pr2_3 = ".((empty($sub_pr2_3))? "NULL" : "'$sub_pr2_3'");
	$sql .= ", sub_pr2_4 = ".((empty($sub_pr2_4))? "NULL" : "'$sub_pr2_4'");
	$sql .= ", sub_pr2_5 = ".((empty($sub_pr2_5))? "NULL" : "'$sub_pr2_5'");
	$sql .= ", sub_pr2_6 = ".((empty($sub_pr2_6))? "NULL" : "'$sub_pr2_6'");
	$sql .= ", sub_pr2_7 = ".((empty($sub_pr2_7))? "NULL" : "'$sub_pr2_7'");
	// reason 3 from sub province
	$sql .= ", sub_pr3_1 = ".((empty($sub_pr3_1))? "NULL" : "'$sub_pr3_1'");
	$sql .= ", sub_pr3_2 = ".((empty($sub_pr3_2))? "NULL" : "'$sub_pr3_2'");
	$sql .= ", sub_pr3_3 = ".((empty($sub_pr3_3))? "NULL" : "'$sub_pr3_3'");
	$sql .= ", sub_pr3_4 = ".((empty($sub_pr3_4))? "NULL" : "'$sub_pr3_4'");
	$sql .= ", sub_pr3_5 = ".((empty($sub_pr3_5))? "NULL" : "'$sub_pr3_5'");
	$sql .= ", sub_pr3_6 = ".((empty($sub_pr3_6))? "NULL" : "'$sub_pr3_6'");
	$sql .= ", sub_pr3_7 = ".((empty($sub_pr3_7))? "NULL" : "'$sub_pr3_7'");
	$sql .= ", sub_pr3_8 = ".((empty($sub_pr3_8))? "NULL" : "'$sub_pr3_8'");
	$sql .= ", sub_pr3_9 = ".((empty($sub_pr3_9))? "NULL" : "'$sub_pr3_9'");
	$sql .= ", sub_pr3_10 = ".((empty($sub_pr3_10))? "NULL" : "'$sub_pr3_10'");
	$sql .= ", insert_date = '$c_date',
						 update_by = '$user'";
	$sql .= " WHERE id = '$id'";
// ---------------------------------------------------------------- editcen for center ---------------------------------------------------------------- //
} elseif ($menu == "editcen") {
	if ($uID == 99) {
		$sub_sql = "SELECT cen1_5,cen2_1,cen2_2,cen2_3,cen2_4,cen2_5,cen2_6,cen2_7,cen3_1,cen3_2,cen3_3,cen3_4,cen3_5,cen3_6,cen3_8,cen3_9 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		$cen1_5 = !empty($cen1_5)?"6;".$cen1_5:"";
		$cen1_5 = nameToFormat($srow['cen1_5'], $cen1_5);
		$cen2_1 = !empty($cen2_1)?"6;".$cen2_1:"";
		$cen2_1 = nameToFormat($srow['cen2_1'], $cen2_1);
		$cen2_2 = !empty($cen2_2)?"6;".$cen2_2:"";
		$cen2_2 = nameToFormat($srow['cen2_2'], $cen2_2);
		$cen2_3 = !empty($cen2_3)?"6;".$cen2_3:"";
		$cen2_3 = nameToFormat($srow['cen2_3'], $cen2_3);
		$cen2_4 = !empty($cen2_4)?"6;".$cen2_4:"";
		$cen2_4 = nameToFormat($srow['cen2_4'], $cen2_4);
		$cen2_5 = !empty($cen2_5)?"6;".$cen2_5:"";
		$cen2_5 = nameToFormat($srow['cen2_5'], $cen2_5);
		$cen2_6 = !empty($cen2_6)?"6;".$cen2_6:"";
		$cen2_6 = nameToFormat($srow['cen2_6'], $cen2_6);
		$cen2_7 = !empty($cen2_7)?"6;".$cen2_7:"";
		$cen2_7 = nameToFormat($srow['cen2_7'], $cen2_7);
		$cen3_1 = !empty($cen3_1)?"6;".$cen3_1:"";
		$cen3_1 = nameToFormat($srow['cen3_1'], $cen3_1);
		$cen3_2 = !empty($cen3_2)?"6;".$cen3_2:"";
		$cen3_2 = nameToFormat($srow['cen3_2'], $cen3_2);
		$cen3_3 = !empty($cen3_3)?"6;".$cen3_3:"";
		$cen3_3 = nameToFormat($srow['cen3_3'], $cen3_3);
		$cen3_4 = !empty($cen3_4)?"6;".$cen3_4:"";
		$cen3_4 = nameToFormat($srow['cen3_4'], $cen3_4);
		$cen3_5 = !empty($cen3_5)?"6;".$cen3_5:"";
		$cen3_5 = nameToFormat($srow['cen3_5'], $cen3_5);
		$cen3_6 = !empty($cen3_6)?"6;".$cen3_6:"";
		$cen3_6 = nameToFormat($srow['cen3_6'], $cen3_6);
		$cen3_8 = !empty($cen3_8)?"6;".$cen3_8:"";
		$cen3_8 = nameToFormat($srow['cen3_8'], $cen3_8);
		$cen3_9 = !empty($cen3_9)?"6;".$cen3_9:"";
		$cen3_9 = nameToFormat($srow['cen3_9'], $cen3_9);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_5 = ".((empty($cen1_5))? "NULL" : "'$cen1_5'");
		$sql .= ", cen2_1 = ".((empty($cen2_1))? "NULL" : "'$cen2_1'");
		$sql .= ", cen2_2 = ".((empty($cen2_2))? "NULL" : "'$cen2_2'");
		$sql .= ", cen2_3 = ".((empty($cen2_3))? "NULL" : "'$cen2_3'");
		$sql .= ", cen2_4 = ".((empty($cen2_4))? "NULL" : "'$cen2_4'");
		$sql .= ", cen2_5 = ".((empty($cen2_5))? "NULL" : "'$cen2_5'");
		$sql .= ", cen2_6 = ".((empty($cen2_6))? "NULL" : "'$cen2_6'");
		$sql .= ", cen2_7 = ".((empty($cen2_7))? "NULL" : "'$cen2_7'");
		$sql .= ", cen3_1 = ".((empty($cen3_1))? "NULL" : "'$cen3_1'");
		$sql .= ", cen3_2 = ".((empty($cen3_2))? "NULL" : "'$cen3_2'");
		$sql .= ", cen3_3 = ".((empty($cen3_3))? "NULL" : "'$cen3_3'");
		$sql .= ", cen3_4 = ".((empty($cen3_4))? "NULL" : "'$cen3_4'");
		$sql .= ", cen3_5 = ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$sql .= ", cen3_6 = ".((empty($cen3_6))? "NULL" : "'$cen3_6'");
		$sql .= ", cen3_8 = ".((empty($cen3_8))? "NULL" : "'$cen3_8'");
		$sql .= ", cen3_9 = ".((empty($cen3_9))? "NULL" : "'$cen3_9'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 100) {
		$sub_sql = "SELECT cen1_5,cen2_1,cen2_2,cen2_3,cen2_6,cen2_7,cen3_1,cen3_2,cen3_3,cen3_4,cen3_5 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		$cen1_5 = !empty($cen1_5)?"7;".$cen1_5:"";
		$cen1_5 = nameToFormat($srow['cen1_5'], $cen1_5);
		$cen2_1 = !empty($cen2_1)?"7;".$cen2_1:"";
		$cen2_1 = nameToFormat($srow['cen2_1'], $cen2_1);
		$cen2_2 = !empty($cen2_2)?"7;".$cen2_2:"";
		$cen2_2 = nameToFormat($srow['cen2_2'], $cen2_2);
		$cen2_3 = !empty($cen2_3)?"7;".$cen2_3:"";
		$cen2_3 = nameToFormat($srow['cen2_3'], $cen2_3);
		$cen2_6 = !empty($cen2_6)?"7;".$cen2_6:"";
		$cen2_6 = nameToFormat($srow['cen2_6'], $cen2_6);
		$cen2_7 = !empty($cen2_7)?"7;".$cen2_7:"";
		$cen2_7 = nameToFormat($srow['cen2_7'], $cen2_7);
		$cen3_1 = !empty($cen3_1)?"7;".$cen3_1:"";
		$cen3_1 = nameToFormat($srow['cen3_1'], $cen3_1);
		$cen3_2 = !empty($cen3_2)?"7;".$cen3_2:"";
		$cen3_2 = nameToFormat($srow['cen3_2'], $cen3_2);
		$cen3_3 = !empty($cen3_3)?"7;".$cen3_3:"";
		$cen3_3 = nameToFormat($srow['cen3_3'], $cen3_3);
		$cen3_4 = !empty($cen3_4)?"7;".$cen3_4:"";
		$cen3_4 = nameToFormat($srow['cen3_4'], $cen3_4);
		$cen3_5 = !empty($cen3_5)?"7;".$cen3_5:"";
		$cen3_5 = nameToFormat($srow['cen3_5'], $cen3_5);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_5 = ".((empty($cen1_5))? "NULL" : "'$cen1_5'");
		$sql .= ", cen2_1 = ".((empty($cen2_1))? "NULL" : "'$cen2_1'");
		$sql .= ", cen2_2 = ".((empty($cen2_2))? "NULL" : "'$cen2_2'");
		$sql .= ", cen2_3 = ".((empty($cen2_3))? "NULL" : "'$cen2_3'");
		$sql .= ", cen2_6 = ".((empty($cen2_6))? "NULL" : "'$cen2_6'");
		$sql .= ", cen2_7 = ".((empty($cen2_7))? "NULL" : "'$cen2_7'");
		$sql .= ", cen3_1 = ".((empty($cen3_1))? "NULL" : "'$cen3_1'");
		$sql .= ", cen3_2 = ".((empty($cen3_2))? "NULL" : "'$cen3_2'");
		$sql .= ", cen3_3 = ".((empty($cen3_3))? "NULL" : "'$cen3_3'");
		$sql .= ", cen3_4 = ".((empty($cen3_4))? "NULL" : "'$cen3_4'");
		$sql .= ", cen3_5 = ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 101) {
		$sub_sql = "SELECT cen1_1,cen3_5,cen3_7 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		$cen1_1 = !empty($cen1_1)?"1;".$cen1_1:"";
		$cen1_1 = nameToFormat($srow['cen1_1'], $cen1_1);
		echo "$cen1_1";
		$cen3_5 = !empty($cen3_5)?"1;".$cen3_5:"";
		$cen3_5 = nameToFormat($srow['cen3_5'], $cen3_5);
		$cen3_7 = !empty($cen3_7)?"1;".$cen3_7:"";
		$cen3_7 = nameToFormat($srow['cen3_7'], $cen3_7);
		echo "$cen3_7";
		$sql = "UPDATE data SET ";
		$sql .= "cen1_1 = ".((empty($cen1_1))? "NULL" : "'$cen1_1'");
		$sql .= ", cen3_5 = ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$sql .= ", cen3_7 = ".((empty($cen3_7))? "NULL" : "'$cen3_7'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 102) {
		$sub_sql = "SELECT cen1_2,cen1_3,cen1_4 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		$cen1_2 = !empty($cen1_2)?"3;".$cen1_2:"";
		$cen1_2 = nameToFormat($srow['cen1_2'], $cen1_2);
		echo "$cen1_2";
		$cen1_3 = !empty($cen1_3)?"3;".$cen1_3:"";
		$cen1_3 = nameToFormat($srow['cen1_3'], $cen1_3);
		echo "$cen1_3";
		$cen1_4 = !empty($cen1_4)?"3;".$cen1_4:"";
		$cen1_4 = nameToFormat($srow['cen1_4'], $cen1_4);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_2 = ".((empty($cen1_2))? "NULL" : "'$cen1_2'");
		$sql .= ", cen1_3 = ".((empty($cen1_3))? "NULL" : "'$cen1_3'");
		$sql .= ", cen1_4 = ".((empty($cen1_4))? "NULL" : "'$cen1_4'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 103) {
		$sub_sql = "SELECT cen1_5 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		$cen1_5 = !empty($cen1_5)?"5;".$cen1_5:"";
		$cen1_5 = nameToFormat($srow['cen1_5'], $cen1_5);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_5 = ".((empty($cen1_5))? "NULL" : "'$cen1_5'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 104) {
		$sub_sql = "SELECT cen1_2,cen1_3,cen1_4,cen3_7,cen3_8,cen3_9,cen3_10 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		$cen1_2 = !empty($cen1_2)?"4;".$cen1_2:"";
		$cen1_2 = nameToFormat($srow['cen1_2'], $cen1_2);
		echo "$cen1_2";
		$cen1_3 = !empty($cen1_3)?"4;".$cen1_3:"";
		$cen1_3 = nameToFormat($srow['cen1_3'], $cen1_3);
		$cen1_4 = !empty($cen1_4)?"4;".$cen1_4:"";
		$cen1_4 = nameToFormat($srow['cen1_4'], $cen1_4);
		echo "$cen1_4";
		$cen3_7 = !empty($cen3_7)?"4;".$cen3_7:"";
		$cen3_7 = nameToFormat($srow['cen3_7'], $cen3_7);
		$cen3_8 = !empty($cen3_8)?"4;".$cen3_8:"";
		$cen3_8 = nameToFormat($srow['cen3_8'], $cen3_8);
		$cen3_9 = !empty($cen3_9)?"4;".$cen3_9:"";
		$cen3_9 = nameToFormat($srow['cen3_9'], $cen3_9);
		$cen3_10 = !empty($cen3_10)?"4;".$cen3_10:"";
		$cen3_10 = nameToFormat($srow['cen3_10'], $cen3_10);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_2 = ".((empty($cen1_2))? "NULL" : "'$cen1_2'");
		$sql .= ", cen1_3 = ".((empty($cen1_3))? "NULL" : "'$cen1_3'");
		$sql .= ", cen1_4 = ".((empty($cen1_4))? "NULL" : "'$cen1_4'");
		$sql .= ", cen3_7 = ".((empty($cen3_7))? "NULL" : "'$cen3_7'");
		$sql .= ", cen3_8 = ".((empty($cen3_8))? "NULL" : "'$cen3_8'");
		$sql .= ", cen3_9 = ".((empty($cen3_9))? "NULL" : "'$cen3_9'");
		$sql .= ", cen3_10 = ".((empty($cen3_10))? "NULL" : "'$cen3_10'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 105) {
		$sub_sql = "SELECT cen1_1,cen2_1,cen2_2,cen2_3,cen2_4,cen2_5,cen2_6,cen2_7,cen3_1,cen3_2,cen3_3,cen3_4,cen3_5,cen3_6,cen3_7,cen3_8 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		$cen1_1 = !empty($cen1_1)?"2;".$cen1_1:"";
		$cen1_1 = nameToFormat($srow['cen1_1'], $cen1_1);
		$cen2_1 = !empty($cen2_1)?"2;".$cen2_1:"";
		$cen2_1 = nameToFormat($srow['cen2_1'], $cen2_1);
		$cen2_2 = !empty($cen2_2)?"2;".$cen2_2:"";
		$cen2_2 = nameToFormat($srow['cen2_2'], $cen2_2);
		$cen2_3 = !empty($cen2_3)?"2;".$cen2_3:"";
		$cen2_3 = nameToFormat($srow['cen2_3'], $cen2_3);
		$cen2_4 = !empty($cen2_4)?"2;".$cen2_4:"";
		$cen2_4 = nameToFormat($srow['cen2_4'], $cen2_4);
		$cen2_5 = !empty($cen2_5)?"2;".$cen2_5:"";
		$cen2_5 = nameToFormat($srow['cen2_5'], $cen2_5);
		$cen2_6 = !empty($cen2_6)?"2;".$cen2_6:"";
		$cen2_6 = nameToFormat($srow['cen2_6'], $cen2_6);
		$cen2_7 = !empty($cen2_7)?"2;".$cen2_7:"";
		$cen2_7 = nameToFormat($srow['cen2_7'], $cen2_7);
		$cen3_1 = !empty($cen3_1)?"2;".$cen3_1:"";
		$cen3_1 = nameToFormat($srow['cen3_1'], $cen3_1);
		$cen3_2 = !empty($cen3_2)?"2;".$cen3_2:"";
		$cen3_2 = nameToFormat($srow['cen3_2'], $cen3_2);
		$cen3_3 = !empty($cen3_3)?"2;".$cen3_3:"";
		$cen3_3 = nameToFormat($srow['cen3_3'], $cen3_3);
		$cen3_4 = !empty($cen3_4)?"2;".$cen3_4:"";
		$cen3_4 = nameToFormat($srow['cen3_4'], $cen3_4);
		$cen3_5 = !empty($cen3_5)?"2;".$cen3_5:"";
		$cen3_5 = nameToFormat($srow['cen3_5'], $cen3_5);
		$cen3_6 = !empty($cen3_6)?"2;".$cen3_6:"";
		$cen3_6 = nameToFormat($srow['cen3_6'], $cen3_6);
		$cen3_7 = !empty($cen3_7)?"2;".$cen3_7:"";
		$cen3_7 = nameToFormat($srow['cen3_7'], $cen3_7);
		$cen3_8 = !empty($cen3_8)?"2;".$cen3_8:"";
		$cen3_8 = nameToFormat($srow['cen3_8'], $cen3_8);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_1 = ".((empty($cen1_1))? "NULL" : "'$cen1_1'");
		$sql .= ", cen2_1 = ".((empty($cen2_1))? "NULL" : "'$cen2_1'");
		$sql .= ", cen2_2 = ".((empty($cen2_2))? "NULL" : "'$cen2_2'");
		$sql .= ", cen2_3 = ".((empty($cen2_3))? "NULL" : "'$cen2_3'");
		$sql .= ", cen2_4 = ".((empty($cen2_4))? "NULL" : "'$cen2_4'");
		$sql .= ", cen2_5 = ".((empty($cen2_5))? "NULL" : "'$cen2_5'");
		$sql .= ", cen2_6 = ".((empty($cen2_6))? "NULL" : "'$cen2_6'");
		$sql .= ", cen2_7 = ".((empty($cen2_7))? "NULL" : "'$cen2_7'");
		$sql .= ", cen3_1 = ".((empty($cen3_1))? "NULL" : "'$cen3_1'");
		$sql .= ", cen3_2 = ".((empty($cen3_2))? "NULL" : "'$cen3_2'");
		$sql .= ", cen3_3 = ".((empty($cen3_3))? "NULL" : "'$cen3_3'");
		$sql .= ", cen3_4 = ".((empty($cen3_4))? "NULL" : "'$cen3_4'");
		$sql .= ", cen3_5 = ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$sql .= ", cen3_6 = ".((empty($cen3_6))? "NULL" : "'$cen3_6'");
		$sql .= ", cen3_7 = ".((empty($cen3_7))? "NULL" : "'$cen3_7'");
		$sql .= ", cen3_8 = ".((empty($cen3_8))? "NULL" : "'$cen3_8'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	}
} else {
	echo '<script type="text/javascript">';
	echo 'alert("don\'t skip process pls!");javascript:history.go(-1)';
	echo '</script>';
}

if (!empty($sql)) {
  $query = mysqli_query($conn,$sql);
  if($query){
    echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.location.href ='list_user.php?user=".$uID."';</script>";//Save successfully!
  }else{
		echo '<script type="text/javascript">';
		echo 'alert("Error can not save data!");javascript:history.go(-1)';
		echo '</script>';
  }
  mysqli_close($conn);
}
?>
