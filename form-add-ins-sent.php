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
$menu = $_POST['menu'];
$user = $_SESSION["user"];
$c_date = date("Y-m-d H:i:s");
echo "$menu".$c_date;
// ================================ check menu ADD (insert data) ================================ //
if ($menu == "add") {
	$sql = " INSERT INTO inspector (titlename, firstname, lastname, area, sub_ins, sub_insname, tr_locate, mar, create_date, update_date)";
	$sql .= " VALUES ('$tname','$fname','$lname','$area_res','$sub_ins_res','$insname_res','$trlocate_res'";
	$sql .= ",'1','$c_date','$c_date')";

echo "$sql";

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
    echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.location.href ='inspector.php';</script>";//Save successfully!
  }else{
		echo '<script type="text/javascript">';
		echo 'alert("Error can not save data!");javascript:history.go(-1)';
		echo '</script>';
  }
  mysqli_close($conn);
}
?>
