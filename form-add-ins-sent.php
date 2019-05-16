<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');
session_start();

//name
$tname = (isset($_POST['tname']))? $_POST["tname"]:'';
$fname = (isset($_POST['firstname']))? $_POST["firstname"]:'';
$lname = (isset($_POST['lastname']))? $_POST["lastname"]:'';


$area = (isset( $_POST['area']))? $_POST['area']:'';
$sub_ins = (isset( $_POST['sub_ins']))? $_POST['sub_ins']:'';
$insname = (isset( $_POST['insname']))? $_POST['insname']:'';
$trlocate = (isset( $_POST['trlocate']))? $_POST['trlocate']:'';
$area_res = implode("|", $area);
$sub_ins_res = implode("|", $sub_ins);
$insname_res = implode("|", $insname);
$trlocate_res = implode("|", $trlocate);
// hidden input
$id = $_POST['inid'];
$menu = $_POST['menu'];
$user = $_SESSION["user"];
$c_date = date("Y-m-d H:i:s");
// ================================ check menu ADD (insert data) ================================ //
if ($menu == "add") {
	$sql = " INSERT INTO inspector (titlename, firstname, lastname, area, sub_ins, sub_insname, tr_locate, mar, create_date, update_date)";
	$sql .= " VALUES ('$tname','$fname','$lname','$area_res','$sub_ins_res','$insname_res','$trlocate_res'";
	$sql .= ",'1','$c_date','$c_date')";
// ================================ check menu EDIT (update data) ================================ //
} elseif ($menu == "edit") {
	$sql = "UPDATE inspector SET ";
	$sql .= "titlename = ".((empty($tname))? "NULL" : "'$tname'");
	$sql .= ", firstname = ".((empty($fname))? "NULL" : "'$fname'");
	$sql .= ", lastname = ".((empty($lname))? "NULL" : "'$lname'");
	$sql .= ", area = ".((empty($area_res))? "NULL" : "'$area_res'");
	$sql .= ", sub_ins = ".((empty($sub_ins_res))? "NULL" : "'$sub_ins_res'");
	$sql .= ", sub_insname = ".((empty($insname_res))? "NULL" : "'$insname_res'");
	$sql .= ", tr_locate = ".((empty($trlocate_res))? "NULL" : "'$trlocate_res'");
	$sql .= ", update_date = '$c_date'";
	$sql .= " WHERE id = '$id'";
} else {
	echo '<script type="text/javascript">';
	echo 'alert("don\'t skip process pls!");javascript:history.go(-1)';
	echo '</script>';
}

if (!empty($sql)) {
  $query = mysqli_query($conn,$sql);
  if($query){
    echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.location.href ='inspector.php';</script>";//Save successfully!
  }else{
		echo '<script type="text/javascript">';
		echo 'alert("Error can not save data!");javascript:history.go(-1)';
		echo '</script>';
  }
  mysqli_close($conn);
}
?>
