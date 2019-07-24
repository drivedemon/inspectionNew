<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');
session_start();

// hidden input
$menu = $_POST['menu'];
$locate = $_POST['locate'];
$cen_locate = $_POST['cen_locate'];
$round = $_POST['f_round'];
$newround = $round+1;
$id = $_POST['inid'];
$user = $_SESSION["user"];
$uID = $_SESSION["userID"];
$c_date = date("Y-m-d H:i:s");

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
	//file upload sub province choice 1-3
	$arr_file = array();
	isset($_FILES['file1_1'])? array_push($_FILES['file1_1'], "1_1"):'';
	$file1_1 = (isset($_FILES['file1_1']))? array_push($arr_file, $_FILES['file1_1']):'';
	isset($_FILES['file1_2'])? array_push($_FILES['file1_2'], "1_2"):'';
	$file1_2 = (isset($_FILES['file1_2']))? array_push($arr_file, $_FILES['file1_2']):'';
	isset($_FILES['file1_3'])? array_push($_FILES['file1_3'], "1_3"):'';
	$file1_3 = (isset($_FILES['file1_3']))? array_push($arr_file, $_FILES['file1_3']):'';
	isset($_FILES['file1_4'])? array_push($_FILES['file1_4'], "1_4"):'';
	$file1_4 = (isset($_FILES['file1_4']))? array_push($arr_file, $_FILES['file1_4']):'';
	isset($_FILES['file1_5'])? array_push($_FILES['file1_5'], "1_5"):'';
	$file1_5 = (isset($_FILES['file1_5']))? array_push($arr_file, $_FILES['file1_5']):'';
	isset($_FILES['file2_1'])? array_push($_FILES['file2_1'], "2_1"):'';
	$file2_1 = (isset($_FILES['file2_1']))? array_push($arr_file, $_FILES['file2_1']):'';
	isset($_FILES['file2_2'])? array_push($_FILES['file2_2'], "2_2"):'';
	$file2_2 = (isset($_FILES['file2_2']))? array_push($arr_file, $_FILES['file2_2']):'';
	isset($_FILES['file2_3'])? array_push($_FILES['file2_3'], "2_3"):'';
	$file2_3 = (isset($_FILES['file2_3']))? array_push($arr_file, $_FILES['file2_3']):'';
	isset($_FILES['file2_4'])? array_push($_FILES['file2_4'], "2_4"):'';
	$file2_4 = (isset($_FILES['file2_4']))? array_push($arr_file, $_FILES['file2_4']):'';
	isset($_FILES['file2_5'])? array_push($_FILES['file2_5'], "2_5"):'';
	$file2_5 = (isset($_FILES['file2_5']))? array_push($arr_file, $_FILES['file2_5']):'';
	isset($_FILES['file2_6'])? array_push($_FILES['file2_6'], "2_6"):'';
	$file2_6 = (isset($_FILES['file2_6']))? array_push($arr_file, $_FILES['file2_6']):'';
	isset($_FILES['file2_7'])? array_push($_FILES['file2_7'], "2_7"):'';
	$file2_7 = (isset($_FILES['file2_7']))? array_push($arr_file, $_FILES['file2_7']):'';
	isset($_FILES['file3_1'])? array_push($_FILES['file3_1'], "3_1"):'';
	$file3_1 = (isset($_FILES['file3_1']))? array_push($arr_file, $_FILES['file3_1']):'';
	isset($_FILES['file3_2'])? array_push($_FILES['file3_2'], "3_2"):'';
	$file3_2 = (isset($_FILES['file3_2']))? array_push($arr_file, $_FILES['file3_2']):'';
	isset($_FILES['file3_3'])? array_push($_FILES['file3_3'], "3_3"):'';
	$file3_3 = (isset($_FILES['file3_3']))? array_push($arr_file, $_FILES['file3_3']):'';
	isset($_FILES['file3_4'])? array_push($_FILES['file3_4'], "3_4"):'';
	$file3_4 = (isset($_FILES['file3_4']))? array_push($arr_file, $_FILES['file3_4']):'';
	isset($_FILES['file3_5'])? array_push($_FILES['file3_5'], "3_5"):'';
	$file3_5 = (isset($_FILES['file3_5']))? array_push($arr_file, $_FILES['file3_5']):'';
	isset($_FILES['file3_6'])? array_push($_FILES['file3_6'], "3_6"):'';
	$file3_6 = (isset($_FILES['file3_6']))? array_push($arr_file, $_FILES['file3_6']):'';
	isset($_FILES['file3_7'])? array_push($_FILES['file3_7'], "3_7"):'';
	$file3_7 = (isset($_FILES['file3_7']))? array_push($arr_file, $_FILES['file3_7']):'';
	isset($_FILES['file3_8'])? array_push($_FILES['file3_8'], "3_8"):'';
	$file3_8 = (isset($_FILES['file3_8']))? array_push($arr_file, $_FILES['file3_8']):'';
	isset($_FILES['file3_9'])? array_push($_FILES['file3_9'], "3_9"):'';
	$file3_9 = (isset($_FILES['file3_9']))? array_push($arr_file, $_FILES['file3_9']):'';
	isset($_FILES['file3_10'])? array_push($_FILES['file3_10'], "3_10"):'';
	$file3_10 = (isset($_FILES['file3_10']))? array_push($arr_file,$_FILES['file3_10']):'';
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
	// check case upload file 1-3
	if (!empty($file1_1) || !empty($file1_2) || !empty($file1_3) || !empty($file1_4) || !empty($file1_5) ||
	!empty($file2_1) || !empty($file2_2) || !empty($file2_3) || !empty($file2_4) || !empty($file2_5) || !empty($file2_6) || !empty($file2_7) ||
	!empty($file3_1) || !empty($file3_2) || !empty($file3_3) || !empty($file3_4) || !empty($file3_5) || !empty($file3_6) || !empty($file3_7) || !empty($file3_8) || !empty($file3_9) || !empty($file3_10)) {
		// insert path file upload

		foreach ($arr_file as $key => $value) {
			$Name = $arr_file[$key]['name'];
			$TempName = $arr_file[$key]['tmp_name'];
			$Size = $arr_file[$key]['size'];
			$Error = $arr_file[$key]['error'];
			$type = $arr_file[$key]['type'];
			$flag = $arr_file[$key]['0'];
			$ext = explode('.',$Name);
			$actualext= strtolower(end($ext));
			$allowed= array('jpg','pdf');

			if ($Error === 0) {
				if (in_array($actualext,$allowed))	{
					if ($Size < 10000000) { // 10mb
						$newname = "r".$round."_".$user."_".$flag."_".$id."_".date('dmy').".".$actualext;
						if ($actualext == "pdf") {
							$fileDestination = 'files-reply/'.$newname;
						} else {
							$fileDestination = 'pic-reply/_ORG/'.$newname;
							// ====================== resize jpg zone ======================= //
							$images = $TempName;
							$new_images = $newname;
							$width=200; //*** Fix Width & Heigh (Auto caculate) ***//
							$size=GetimageSize($images);
							$height=round($width*$size[1]/$size[0]);
							$images_orig = ImageCreateFromJPEG($images);
							$photoX = ImagesX($images_orig);
							$photoY = ImagesY($images_orig);
							$images_fin = ImageCreateTrueColor($width, $height);
							ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
							ImageJPEG($images_fin,'pic-reply/_RESIZE/'.$new_images);
							ImageDestroy($images_orig);
							ImageDestroy($images_fin);
						}
						move_uploaded_file($TempName,$fileDestination);

						$check_fid = "SELECT id as fid, data_id, track_round FROM pr_filelocate WHERE data_id = '$id' and track_round = '$round'";
						$query_fid = mysqli_query($conn,$check_fid);
						$res_fid = mysqli_fetch_assoc($query_fid);
						$fid = $res_fid['fid'];
							if (mysqli_num_rows($query_fid) == 0) {
								if ($res_fid['track_round'] == 1 || empty($res_fid['track_round'])) {
									if ($round == 1) {
										$f_sql = "INSERT INTO pr_filelocate (data_id, pr".$flag.") VALUES ('$id', '$newname')";
									} else {
										$f_sql = "INSERT INTO pr_filelocate (data_id, track_round, pr".$flag.") VALUES ('$id', '$round', '$newname')";
									}
									$fquery = mysqli_query($conn,$f_sql);
								}
							} else {
								$f_sql = "UPDATE pr_filelocate SET pr".$flag." = '$newname' WHERE id = '$fid'";
								$fquery = mysqli_query($conn,$f_sql);
							}
					}	else {
						echo "<script type='text/javascript'>alert('Error!! File size is too large');javascript:history.go(-1);</script>";//Error!! File size is too large
						die();
					}
				}	else {
					echo "<script type='text/javascript'>alert('Error!! File Extention not Correct');javascript:history.go(-1);</script>";//Error!! File Extention not Correct
					die();
				}
			} elseif ($Error === 4) {
				// do not anything
			}	else {
				echo "<script type='text/javascript'>alert('Error in uploading the file');javascript:history.go(-1);</script>";//Error in uploading the file
				die();
			}
		}
	}

// add main data in first case
if ($round == 1) {
	// add main data
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
 	$sql .= ", pr_follow_round = ".((empty($round))? "NULL" : "'$newround'");
 	$sql .= ", pr_fileid = ".((empty($fid))? "NULL" : "'$fid'");
 	$sql .= ", insert_date = '$c_date',
 	update_by = '$user'";
 	$sql .= " WHERE id = '$id'";
}
	// add follow tracking round log in report_follow
	$rf_sql = "INSERT INTO report_follow (data_id, division, track_round, r1_1, r1_2, r1_3, r1_4, r1_5, r2_1, r2_2, r2_3, r2_4, r2_5, r2_6, r2_7, r3_1, r3_2, r3_3, r3_4, r3_5, r3_6, r3_7, r3_8, r3_9, r3_10, create_date, create_by) ";
	$rf_sql .= "VALUES ('$id', '$user', '$round'";
	$rf_sql .= ", ".((empty($sub_pr1_1))? "NULL" : "'$sub_pr1_1'");
	$rf_sql .= ", ".((empty($sub_pr1_2))? "NULL" : "'$sub_pr1_2'");
	$rf_sql .= ", ".((empty($sub_pr1_3))? "NULL" : "'$sub_pr1_3'");
	$rf_sql .= ", ".((empty($sub_pr1_4))? "NULL" : "'$sub_pr1_4'");
	$rf_sql .= ", ".((empty($sub_pr1_5))? "NULL" : "'$sub_pr1_5'");
	$rf_sql .= ", ".((empty($sub_pr2_1))? "NULL" : "'$sub_pr2_1'");
	$rf_sql .= ", ".((empty($sub_pr2_2))? "NULL" : "'$sub_pr2_2'");
	$rf_sql .= ", ".((empty($sub_pr2_3))? "NULL" : "'$sub_pr2_3'");
	$rf_sql .= ", ".((empty($sub_pr2_4))? "NULL" : "'$sub_pr2_4'");
	$rf_sql .= ", ".((empty($sub_pr2_5))? "NULL" : "'$sub_pr2_5'");
	$rf_sql .= ", ".((empty($sub_pr2_6))? "NULL" : "'$sub_pr2_6'");
	$rf_sql .= ", ".((empty($sub_pr2_7))? "NULL" : "'$sub_pr2_7'");
	$rf_sql .= ", ".((empty($sub_pr3_1))? "NULL" : "'$sub_pr3_1'");
	$rf_sql .= ", ".((empty($sub_pr3_2))? "NULL" : "'$sub_pr3_2'");
	$rf_sql .= ", ".((empty($sub_pr3_3))? "NULL" : "'$sub_pr3_3'");
	$rf_sql .= ", ".((empty($sub_pr3_4))? "NULL" : "'$sub_pr3_4'");
	$rf_sql .= ", ".((empty($sub_pr3_5))? "NULL" : "'$sub_pr3_5'");
	$rf_sql .= ", ".((empty($sub_pr3_6))? "NULL" : "'$sub_pr3_6'");
	$rf_sql .= ", ".((empty($sub_pr3_7))? "NULL" : "'$sub_pr3_7'");
	$rf_sql .= ", ".((empty($sub_pr3_8))? "NULL" : "'$sub_pr3_8'");
	$rf_sql .= ", ".((empty($sub_pr3_9))? "NULL" : "'$sub_pr3_9'");
	$rf_sql .= ", ".((empty($sub_pr3_10))? "NULL" : "'$sub_pr3_10'");
	$rf_sql .= ", '$c_date', '$user')";
	// ---------------------------------------------------------------- editcen for center ---------------------------------------------------------------- //
} elseif ($menu == "editcen") {
	if ($uID == 99) {
		$sub_sql = "SELECT cen1_5,cen2_1,cen2_2,cen2_3,cen2_4,cen2_5,cen2_6,cen2_7,cen3_1,cen3_2,cen3_3,cen3_4,cen3_5,cen3_6,cen3_8,cen3_9 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		// add follow tracking round log in report_follow
		$rf_sql = "INSERT INTO report_follow (data_id, division, track_round, r1_5, r2_1, r2_2, r2_3, r2_4, r2_5, r2_6, r2_7, r3_1, r3_2, r3_3, r3_4, r3_5, r3_6, r3_8, r3_9, create_date, create_by) ";
		$rf_sql .= "VALUES ('$id', '$user', '$round'";
		$rf_sql .= ", ".((empty($cen1_5))? "NULL" : "'$cen1_5'");
		$rf_sql .= ", ".((empty($cen2_1))? "NULL" : "'$cen2_1'");
		$rf_sql .= ", ".((empty($cen2_2))? "NULL" : "'$cen2_2'");
		$rf_sql .= ", ".((empty($cen2_3))? "NULL" : "'$cen2_3'");
		$rf_sql .= ", ".((empty($cen2_4))? "NULL" : "'$cen2_4'");
		$rf_sql .= ", ".((empty($cen2_5))? "NULL" : "'$cen2_5'");
		$rf_sql .= ", ".((empty($cen2_6))? "NULL" : "'$cen2_6'");
		$rf_sql .= ", ".((empty($cen2_7))? "NULL" : "'$cen2_7'");
		$rf_sql .= ", ".((empty($cen3_1))? "NULL" : "'$cen3_1'");
		$rf_sql .= ", ".((empty($cen3_2))? "NULL" : "'$cen3_2'");
		$rf_sql .= ", ".((empty($cen3_3))? "NULL" : "'$cen3_3'");
		$rf_sql .= ", ".((empty($cen3_4))? "NULL" : "'$cen3_4'");
		$rf_sql .= ", ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$rf_sql .= ", ".((empty($cen3_6))? "NULL" : "'$cen3_6'");
		$rf_sql .= ", ".((empty($cen3_8))? "NULL" : "'$cen3_8'");
		$rf_sql .= ", ".((empty($cen3_9))? "NULL" : "'$cen3_9'");
		$rf_sql .= ", '$c_date', '$user')";

		// add main data
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

		// add follow tracking round log in report_follow
		$rf_sql = "INSERT INTO report_follow (data_id, division, track_round, r1_5, r2_1, r2_2, r2_3, r2_6, r2_7, r3_1, r3_2, r3_3, r3_4, r3_5, create_date, create_by) ";
		$rf_sql .= "VALUES ('$id', '$user', '$round'";
		$rf_sql .= ", ".((empty($cen1_5))? "NULL" : "'$cen1_5'");
		$rf_sql .= ", ".((empty($cen2_1))? "NULL" : "'$cen2_1'");
		$rf_sql .= ", ".((empty($cen2_2))? "NULL" : "'$cen2_2'");
		$rf_sql .= ", ".((empty($cen2_3))? "NULL" : "'$cen2_3'");
		$rf_sql .= ", ".((empty($cen2_6))? "NULL" : "'$cen2_6'");
		$rf_sql .= ", ".((empty($cen2_7))? "NULL" : "'$cen2_7'");
		$rf_sql .= ", ".((empty($cen3_1))? "NULL" : "'$cen3_1'");
		$rf_sql .= ", ".((empty($cen3_2))? "NULL" : "'$cen3_2'");
		$rf_sql .= ", ".((empty($cen3_3))? "NULL" : "'$cen3_3'");
		$rf_sql .= ", ".((empty($cen3_4))? "NULL" : "'$cen3_4'");
		$rf_sql .= ", ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$rf_sql .= ", '$c_date', '$user')";

		// add main data
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
	 	$sql .= ", center_follow_round = ".((empty($round))? "NULL" : "'$newround'");
		$sql .= ", insert_date = '$c_date',
		update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 101) {
		$sub_sql = "SELECT cen1_1,cen3_5,cen3_7 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		// add follow tracking round log in report_follow
		$rf_sql = "INSERT INTO report_follow (data_id, division, track_round, r1_1, r3_5, r3_7, create_date, create_by) ";
		$rf_sql .= "VALUES ('$id', '$user', '$round'";
		$rf_sql .= ", ".((empty($cen1_1))? "NULL" : "'$cen1_1'");
		$rf_sql .= ", ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$rf_sql .= ", ".((empty($cen3_7))? "NULL" : "'$cen3_7'");
		$rf_sql .= ", '$c_date', '$user')";

		// add main data
		$cen1_1 = !empty($cen1_1)?"1;".$cen1_1:"";
		$cen1_1 = nameToFormat($srow['cen1_1'], $cen1_1);
		$cen3_5 = !empty($cen3_5)?"1;".$cen3_5:"";
		$cen3_5 = nameToFormat($srow['cen3_5'], $cen3_5);
		$cen3_7 = !empty($cen3_7)?"1;".$cen3_7:"";
		$cen3_7 = nameToFormat($srow['cen3_7'], $cen3_7);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_1 = ".((empty($cen1_1))? "NULL" : "'$cen1_1'");
		$sql .= ", cen3_5 = ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$sql .= ", cen3_7 = ".((empty($cen3_7))? "NULL" : "'$cen3_7'");
	 	$sql .= ", center_follow_round = ".((empty($round))? "NULL" : "'$newround'");
		$sql .= ", insert_date = '$c_date',
		update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 102) {
		$sub_sql = "SELECT cen1_2,cen1_3,cen1_4 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		// add follow tracking round log in report_follow
		$rf_sql = "INSERT INTO report_follow (data_id, division, track_round, r1_2, r1_3, r1_4, create_date, create_by) ";
		$rf_sql .= "VALUES ('$id', '$user', '$round'";
		$rf_sql .= ", ".((empty($cen1_2))? "NULL" : "'$cen1_2'");
		$rf_sql .= ", ".((empty($cen1_3))? "NULL" : "'$cen1_3'");
		$rf_sql .= ", ".((empty($cen1_4))? "NULL" : "'$cen1_4'");
		$rf_sql .= ", '$c_date', '$user')";

		// add main data
		$cen1_2 = !empty($cen1_2)?"3;".$cen1_2:"";
		$cen1_2 = nameToFormat($srow['cen1_2'], $cen1_2);
		$cen1_3 = !empty($cen1_3)?"3;".$cen1_3:"";
		$cen1_3 = nameToFormat($srow['cen1_3'], $cen1_3);
		$cen1_4 = !empty($cen1_4)?"3;".$cen1_4:"";
		$cen1_4 = nameToFormat($srow['cen1_4'], $cen1_4);

		$sql = "UPDATE data SET ";
		$sql .= "cen1_2 = ".((empty($cen1_2))? "NULL" : "'$cen1_2'");
		$sql .= ", cen1_3 = ".((empty($cen1_3))? "NULL" : "'$cen1_3'");
		$sql .= ", cen1_4 = ".((empty($cen1_4))? "NULL" : "'$cen1_4'");
	 	$sql .= ", center_follow_round = ".((empty($round))? "NULL" : "'$newround'");
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
	 	$sql .= ", center_follow_round = ".((empty($round))? "NULL" : "'$newround'");
		$sql .= ", insert_date = '$c_date',
		update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 104) {
		$sub_sql = "SELECT cen1_2,cen1_3,cen1_4,cen3_7,cen3_8,cen3_9,cen3_10 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		// add follow tracking round log in report_follow
		$rf_sql = "INSERT INTO report_follow (data_id, division, track_round, r1_2, r1_3, r1_4, r3_7, r3_8, r3_9, r3_10, create_date, create_by) ";
		$rf_sql .= "VALUES ('$id', '$user', '$round'";
		$rf_sql .= ", ".((empty($cen1_2))? "NULL" : "'$cen1_2'");
		$rf_sql .= ", ".((empty($cen1_3))? "NULL" : "'$cen1_3'");
		$rf_sql .= ", ".((empty($cen1_4))? "NULL" : "'$cen1_4'");
		$rf_sql .= ", ".((empty($cen3_7))? "NULL" : "'$cen3_7'");
		$rf_sql .= ", ".((empty($cen3_8))? "NULL" : "'$cen3_8'");
		$rf_sql .= ", ".((empty($cen3_9))? "NULL" : "'$cen3_9'");
		$rf_sql .= ", ".((empty($cen3_10))? "NULL" : "'$cen3_10'");
		$rf_sql .= ", '$c_date', '$user')";

		// add main data
		$cen1_2 = !empty($cen1_2)?"4;".$cen1_2:"";
		$cen1_2 = nameToFormat($srow['cen1_2'], $cen1_2);
		$cen1_3 = !empty($cen1_3)?"4;".$cen1_3:"";
		$cen1_3 = nameToFormat($srow['cen1_3'], $cen1_3);
		$cen1_4 = !empty($cen1_4)?"4;".$cen1_4:"";
		$cen1_4 = nameToFormat($srow['cen1_4'], $cen1_4);
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
	 	$sql .= ", center_follow_round = ".((empty($round))? "NULL" : "'$newround'");
		$sql .= ", insert_date = '$c_date',
		update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	} elseif ($uID == 105) {
		$sub_sql = "SELECT cen1_1,cen2_1,cen2_2,cen2_3,cen2_4,cen2_5,cen2_6,cen2_7,cen3_1,cen3_2,cen3_3,cen3_4,cen3_5,cen3_6,cen3_7,cen3_8 FROM data WHERE id='$id'";
		$sub_query = mysqli_query($conn,$sub_sql);
		$srow = mysqli_fetch_assoc($sub_query);

		// add follow tracking round log in report_follow
		$rf_sql = "INSERT INTO report_follow (data_id, division, track_round, r1_1, r2_1, r2_2, r2_3, r2_4, r2_5, r2_6, r2_7, r3_1, r3_2, r3_3, r3_4, r3_5, r3_6, r3_7, r3_8, create_date, create_by) ";
		$rf_sql .= "VALUES ('$id', '$user', '$round'";
		$rf_sql .= ", ".((empty($cen1_1))? "NULL" : "'$cen1_1'");
		$rf_sql .= ", ".((empty($cen2_1))? "NULL" : "'$cen2_1'");
		$rf_sql .= ", ".((empty($cen2_2))? "NULL" : "'$cen2_2'");
		$rf_sql .= ", ".((empty($cen2_3))? "NULL" : "'$cen2_3'");
		$rf_sql .= ", ".((empty($cen2_4))? "NULL" : "'$cen2_4'");
		$rf_sql .= ", ".((empty($cen2_5))? "NULL" : "'$cen2_5'");
		$rf_sql .= ", ".((empty($cen2_6))? "NULL" : "'$cen2_6'");
		$rf_sql .= ", ".((empty($cen2_7))? "NULL" : "'$cen2_7'");
		$rf_sql .= ", ".((empty($cen3_1))? "NULL" : "'$cen3_1'");
		$rf_sql .= ", ".((empty($cen3_2))? "NULL" : "'$cen3_2'");
		$rf_sql .= ", ".((empty($cen3_3))? "NULL" : "'$cen3_3'");
		$rf_sql .= ", ".((empty($cen3_4))? "NULL" : "'$cen3_4'");
		$rf_sql .= ", ".((empty($cen3_5))? "NULL" : "'$cen3_5'");
		$rf_sql .= ", ".((empty($cen3_6))? "NULL" : "'$cen3_6'");
		$rf_sql .= ", ".((empty($cen3_7))? "NULL" : "'$cen3_7'");
		$rf_sql .= ", ".((empty($cen3_8))? "NULL" : "'$cen3_8'");
		$rf_sql .= ", '$c_date', '$user')";

		// add main data
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
	 	$sql .= ", center_follow_round = ".((empty($round))? "NULL" : "'$newround'");
		$sql .= ", insert_date = '$c_date',
		update_by = '$user'";
		$sql .= " WHERE id = '$id'";
	}
} else {
	echo '<script type="text/javascript">';
	echo 'alert("don\'t skip process pls!");javascript:history.go(-1)';
	echo '</script>';
}

if (!empty($sql) || !empty($rf_sql)) {
	if (!empty($sql)) {
		$query = mysqli_query($conn,$sql);
	}
	if (!empty($rf_sql)) {
		$rf_query = mysqli_query($conn,$rf_sql);
	}
	if($query) {
		echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.location.href ='list_user.php?user=".$uID."';</script>";//Save successfully!
	} else {
		echo '<script type="text/javascript">';
		echo 'alert("Error can not save data!");javascript:history.go(-1)';
		echo '</script>';
	}
	mysqli_close($conn);
}
?>
