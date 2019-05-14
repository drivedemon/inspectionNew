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
$area_srl = serialize($area);
$sub_ins = (isset( $_POST['sub_ins']))? $_POST['sub_ins']:'';
$areaname = (isset( $_POST['areaname']))? $_POST['areaname']:'';
$trlocate = (isset( $_POST['trlocate']))? $_POST['trlocate']:'';
print_r($sub_ins);






// hidden input
$menu = $_POST['menu'];
$user = $_SESSION["user"];
$c_date = date("Y-m-d H:i:s");
// ================================ check menu ADD (insert data) ================================ //
if ($menu == "add") {



// ================================ check menu EDIT (update data) ================================ //
} elseif ($menu == "edit") {



} else {
	echo '<script type="text/javascript">';
	echo 'alert("don\'t skip process pls!");javascript:history.go(-1)';
	echo '</script>';
}

if (!empty($sql)) {
  $query = mysqli_query($conn,$sql);
  if($query){
    echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.location.href ='list.php';;</script>";//Save successfully!
  }else{
		echo '<script type="text/javascript">';
		echo 'alert("Error can not save data!");javascript:history.go(-1)';
		echo '</script>';
  }
  mysqli_close($conn);
}
?>
