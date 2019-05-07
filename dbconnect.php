<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "inspection_new";

	// Create connection
	$conn = new mysqli($servername,$username,$password,$db);
	$conn->query("set names utf8");

	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function checkNull($a) {
	if (empty($a)) {
		echo '<script language="javascript">';
		echo 'alert("Data can not null value!");javascript:history.go(-1);';
		echo '</script>';
		exit();
	}
	return $a;
}

function convertName($name, $pos) {
	if (strpos($name, "|") !== false) {
		$arr = explode("|",$name);
		foreach ($arr as $key => $value) {
			if (strpos($value, "1;", 0) !== false && $pos == 1) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "2;", 0) !== false && $pos == 2) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "3;", 0) !== false) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "4;", 0) !== false) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "5;", 0) !== false) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "6;", 0) !== false) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "7;", 0) !== false) {
				$name = substr($value, 2);
				break;
			}
		}
	} else {
		$name = substr($name, 2);
	}
	return $name;
}

function DateThai($strDate)	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
}
?>
