<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');
session_start();

//name



// hidden input
$menu = $_POST['menu'];
$locate = $_POST['locate'];
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
