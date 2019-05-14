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

function nameToFormat($oName, $nName) {
	if (strpos($oName, "|") !== false) {
		$arr = explode("|",$oName);
		foreach ($arr as $value) {
			// echo "$value<br>";
			if (strpos($value, "1;") !== false && strpos($nName, "1;") !== false) {
				$strName = empty($strName)?$nName:$strName."|".$nName;
			} elseif (strpos($value, "2;") !== false && strpos($nName, "2;") !== false) {
				$strName = empty($strName)?$nName:$strName."|".$nName;
			} elseif (strpos($value, "3;") !== false && strpos($nName, "3;") !== false) {
				$strName = empty($strName)?$nName:$strName."|".$nName;
			} elseif (strpos($value, "4;") !== false && strpos($nName, "4;") !== false) {
				$strName = empty($strName)?$nName:$strName."|".$nName;
			} elseif (strpos($value, "5;") !== false && strpos($nName, "5;") !== false) {
				$strName = empty($strName)?$nName:$strName."|".$nName;
			} elseif (strpos($value, "6;") !== false && strpos($nName, "6;") !== false) {
				$strName = empty($strName)?$nName:$strName."|".$nName;
			} elseif (strpos($value, "7;") !== false && strpos($nName, "7;") !== false) {
				$strName = empty($strName)?$nName:$strName."|".$nName;
			} else {
				if (!empty($strName)) {
					$strName .= "|".$value;
				} else {
					$strName = $value;
				}
			}
		}
	} else {
		if (strpos($oName, "1;") !== false && strpos($nName, "1;") !== false) {
			$strName = $nName;
		} elseif (strpos($oName, "2;") !== false && strpos($nName, "2;") !== false) {
			$strName = $nName;
		} elseif (strpos($oName, "3;") !== false && strpos($nName, "3;") !== false) {
			$strName = $nName;
		} elseif (strpos($oName, "4;") !== false && strpos($nName, "4;") !== false) {
			$strName = $nName;
		} elseif (strpos($oName, "5;") !== false && strpos($nName, "5;") !== false) {
			$strName = $nName;
		} elseif (strpos($oName, "6;") !== false && strpos($nName, "6;") !== false) {
			$strName = $nName;
		} elseif (strpos($oName, "7;") !== false && strpos($nName, "7;") !== false) {
			$strName = $nName;
		} else {
			if (!empty($oName)) {
				if (!empty($nName)) {
					$strName = $oName."|".$nName;
				} else {
					$strName = $oName;
				}
			} else {
				$strName = $nName;
			}
			// $strName = !empty($oName)?$oName."|".$nName:$nName;
		}
	}
	return $strName;
}

function convertName($name, $pos) {
	if (strpos($name, "|") !== false) {
		$arr = explode("|",$name);
		foreach ($arr as $value) {
			if (strpos($value, "1;", 0) !== false && $pos == 1) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "2;", 0) !== false && $pos == 2) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "3;", 0) !== false && $pos == 3) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "4;", 0) !== false && $pos == 4) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "5;", 0) !== false && $pos == 5) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "6;", 0) !== false && $pos == 6) {
				$name = substr($value, 2);
				break;
			} elseif (strpos($value, "7;", 0) !== false && $pos == 7) {
				$name = substr($value, 2);
				break;
			}
		}
	} else {
		if (strpos($name, "1;", 0) !== false && $pos == 1) {
			$name = substr($name, 2);
		} elseif (strpos($name, "2;", 0) !== false && $pos == 2) {
			$name = substr($name, 2);
		} elseif (strpos($name, "3;", 0) !== false && $pos == 3) {
			$name = substr($name, 2);
		} elseif (strpos($name, "4;", 0) !== false && $pos == 4) {
			$name = substr($name, 2);
		} elseif (strpos($name, "5;", 0) !== false && $pos == 5) {
			$name = substr($name, 2);
		} elseif (strpos($name, "6;", 0) !== false && $pos == 6) {
			$name = substr($name, 2);
		} elseif (strpos($name, "7;", 0) !== false && $pos == 7) {
			$name = substr($name, 2);
		} else {
			$name = "";
		}
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
