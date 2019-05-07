<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');
session_start();

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

// hidden input
$menu = $_POST['menu'];
$locate = $_POST['locate'];
$id = $_POST['inid'];
$user = $_SESSION["user"];
$uID = $_SESSION["userID"];
$c_date = date("Y-m-d H:i:s");
// ================================ check menu ADD (insert data) ================================ //
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
