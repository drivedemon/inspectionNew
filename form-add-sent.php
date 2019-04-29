<?php
require 'dbconnect.php';
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: text/html; charset=utf-8');
session_start();

//Year
$txt_dateyear = (isset($_POST['txtDate_year']))? checkNull($_POST["txtDate_year"]):'';
//insid
$insid = (isset($_POST['txtinspector']))? checkNull($_POST["txtinspector"]):'';
//txtboss_name
$txtboss_name = (isset($_POST['txtboss_name']))? checkNull($_POST["txtboss_name"]):'';
//division
$txtReceiver = (isset($_POST['txtReceiver']))? checkNull($_POST["txtReceiver"]):'';
//inspectType
$inspectType = (isset($_POST['selectedType']))? checkNull($_POST["selectedType"]):'';
//inspectDate
$inspectDate = (isset($_POST['DateInspector']))? checkNull($_POST["DateInspector"]):'';
//inspectNo
$inspectNo = (isset($_POST['txtNo']))? checkNull($_POST["txtNo"]):'';
//inspectDoc
$inspectDoc = (isset($_POST['txtDoc']))? checkNull($_POST["txtDoc"]):'';
//inspectDateDoc
$inspectDateDoc = (isset($_POST['DateDoc']))? checkNull($_POST["DateDoc"]):'';
//txtSum
$txtSum = (isset($_POST['txtSum']))? checkNull($_POST["txtSum"]):'';
//txtpersonnel
$txtpersonnel1 = (isset($_POST['txtpersonnel1']))? checkNull($_POST["txtpersonnel1"]):'';
$txtpersonnel2 = (isset($_POST['txtpersonnel2']))? checkNull($_POST["txtpersonnel2"]):'';
$txtpersonnel3 = (isset($_POST['txtpersonnel3']))? checkNull($_POST["txtpersonnel3"]):'';
$txtpersonnel4 = (isset($_POST['txtpersonnel4']))? checkNull($_POST["txtpersonnel4"]):'';
$txtpersonnel5 = (isset($_POST['txtpersonnel5']))? checkNull($_POST["txtpersonnel5"]):'';
// --------------------- zone SP ---------------------------//
//CM FC CC
$case_CM = (isset($_POST['casecm']))? checkNull($_POST["casecm"]):'';
$case_FC = (isset($_POST['casefc']))? checkNull($_POST["casefc"]):'';
$case_CC = (isset($_POST['casecc']))? checkNull($_POST["casecc"]):'';
//case 53
$casechild_53 = (isset($_POST['casechild']))? checkNull($_POST["casechild"]):'';
//case f
$caserecov = (isset($_POST['caserecov']))? checkNull($_POST["caserecov"]):'';
//case 132
$case132 = (isset($_POST['case_132']))? checkNull($_POST["case_132"]):'';
//case sp
$casedjop = (isset($_POST['casedjop']))? checkNull($_POST["casedjop"]):'';
// --------------------- zone TR ---------------------------//
//t1-t8
$t1 = (isset($_POST['casetr']))? checkNull($_POST["casetr"]):'';
$t2 = (isset($_POST['caseleave']))? checkNull($_POST["caseleave"]):'';
$t3 = (isset($_POST['casehealth']))? checkNull($_POST["casehealth"]):'';
$t4 = (isset($_POST['caserest']))? checkNull($_POST["caserest"]):'';
$t5 = (isset($_POST['caseoutinday']))? checkNull($_POST["caseoutinday"]):'';
$t6 = (isset($_POST['caseoutallday']))? checkNull($_POST["caseoutallday"]):'';
$t7 = (isset($_POST['casedead']))? checkNull($_POST["casedead"]):'';
$t8 = (isset($_POST['caseescape']))? checkNull($_POST["caseescape"]):'';
//activity 1 || r1-1,cb1-1
$r1_1 = (isset($_POST['r1-1']))? $_POST["r1-1"]:'';
$cb1_1 = (isset($_POST['cb1-1']))? implode("",$_POST["cb1-1"]):'';
$r1_2 = (isset($_POST['r1-2']))? $_POST["r1-2"]:'';
$cb1_2 = (isset($_POST['cb1-2']))? implode("",$_POST["cb1-2"]):'';
$r1_3 = (isset($_POST['r1-3']))? $_POST["r1-3"]:'';
$cb1_3 = (isset($_POST['cb1-3']))? implode("",$_POST["cb1-3"]):'';
$r1_4 = (isset($_POST['r1-4']))? $_POST["r1-4"]:'';
$cb1_4 = (isset($_POST['cb1-4']))? implode("",$_POST["cb1-4"]):'';
$r1_5 = (isset($_POST['r1-5']))? $_POST["r1-5"]:'';
$cb1_5 = (isset($_POST['cb1-5']))? implode("",$_POST["cb1-5"]):'';
//activity 2 || r2-1,cb2-1
$r2_1 = (isset($_POST['r2-1']))? $_POST["r2-1"]:'';
$cb2_1 = (isset($_POST['cb2-1']))? implode("",$_POST["cb2-1"]):'';
$r2_2 = (isset($_POST['r2-2']))? $_POST["r2-2"]:'';
$cb2_2 = (isset($_POST['cb2-2']))? implode("",$_POST["cb2-2"]):'';
$r2_3 = (isset($_POST['r2-3']))? $_POST["r2-3"]:'';
$cb2_3 = (isset($_POST['cb2-3']))? implode("",$_POST["cb2-3"]):'';
$r2_4 = (isset($_POST['r2-4']))? $_POST["r2-4"]:'';
$cb2_4 = (isset($_POST['cb2-4']))? implode("",$_POST["cb2-4"]):'';
$r2_5 = (isset($_POST['r2-5']))? $_POST["r2-5"]:'';
$cb2_5 = (isset($_POST['cb2-5']))? implode("",$_POST["cb2-5"]):'';
$r2_6 = (isset($_POST['r2-6']))? $_POST["r2-6"]:'';
$cb2_6 = (isset($_POST['cb2-6']))? implode("",$_POST["cb2-6"]):'';
$r2_7 = (isset($_POST['r2-7']))? $_POST["r2-7"]:'';
$cb2_7 = (isset($_POST['cb2-7']))? implode("",$_POST["cb2-7"]):'';
//activity 3 || r3-1,cb3-1
$r3_1 = (isset($_POST['r3-1']))? $_POST["r3-1"]:'';
$cb3_1 = (isset($_POST['cb3-1']))? implode("",$_POST["cb3-1"]):'';
$r3_2 = (isset($_POST['r3-2']))? $_POST["r3-2"]:'';
$cb3_2 = (isset($_POST['cb3-2']))? implode("",$_POST["cb3-2"]):'';
$r3_3 = (isset($_POST['r3-3']))? $_POST["r3-3"]:'';
$cb3_3 = (isset($_POST['cb3-3']))? implode("",$_POST["cb3-3"]):'';
$r3_4 = (isset($_POST['r3-4']))? $_POST["r3-4"]:'';
$cb3_4 = (isset($_POST['cb3-4']))? implode("",$_POST["cb3-4"]):'';
$r3_5 = (isset($_POST['r3-5']))? $_POST["r3-5"]:'';
$cb3_5 = (isset($_POST['cb3-5']))? implode("",$_POST["cb3-5"]):'';
$r3_6 = (isset($_POST['r3-6']))? $_POST["r3-6"]:'';
$cb3_6 = (isset($_POST['cb3-6']))? implode("",$_POST["cb3-6"]):'';
$r3_7 = (isset($_POST['r3-7']))? $_POST["r3-7"]:'';
$cb3_7 = (isset($_POST['cb3-7']))? implode("",$_POST["cb3-7"]):'';
$r3_8 = (isset($_POST['r3-8']))? $_POST["r3-8"]:'';
$cb3_8 = (isset($_POST['cb3-8']))? implode("",$_POST["cb3-8"]):'';
$r3_9 = (isset($_POST['r3-9']))? $_POST["r3-9"]:'';
$cb3_9 = (isset($_POST['cb3-9']))? implode("",$_POST["cb3-9"]):'';
$r3_10 = (isset($_POST['r3-10']))? $_POST["r3-10"]:'';
$cb3_10 = (isset($_POST['cb3-10']))? implode("",$_POST["cb3-10"]):'';

// hidden input
$menu = $_POST['menu'];
$locate = $_POST['locate'];
$user = $_SESSION["user"];
$c_date = date("Y-m-d H:i:s");
// ================================ check menu ADD (insert data) ================================ //
if ($menu == "add") {
	// check type locate SP = 1 TR = 2
	if ($locate == 1) {
		// insert with type == SP
		$sql = " INSERT INTO data (type_locate,inspect_level,inspector,division,boss_name,inspect_type,inspect_date,inspect_no,inspect_doc,inspect_doc_date,personnel1,personnel2,personnel3,personnel4,personnel5,cm,fc,cc,case53,case_f,case132,case_sp";
		$sql .= ",r1_1,cb1_1,r1_2,cb1_2,r1_3,cb1_3,r1_4,cb1_4,r1_5,cb1_5";
		$sql .= ",r2_1,cb2_1,r2_2,cb2_2,r2_3,cb2_3,r2_4,cb2_4,r2_5,cb2_5,r2_6,cb2_6";
		$sql .= ",r3_1,cb3_1,r3_2,cb3_2,r3_3,cb3_3,r3_4,cb3_4,r3_5,cb3_5,r3_6,cb3_6,r3_7,cb3_7,r3_8,cb3_8,r3_9,cb3_9,r3_10,cb3_10";
		$sql .= ",insert_date,create_date,create_by,budget_year)";
		$sql .= " VALUES ('$locate','d','$insid','$txtReceiver','$txtboss_name','$inspectType','$inspectDate','$inspectNo','$inspectDoc','$inspectDateDoc','$txtpersonnel1','$txtpersonnel2','$txtpersonnel3','$txtpersonnel4','$txtpersonnel5','$case_CM','$case_FC','$case_CC','$casechild_53','$caserecov','$case132','$casedjop'";
		// reason 1
		$sql .= ",".((empty($r1_1))? "NULL" : "'$r1_1'");
		$sql .= ",".((empty($cb1_1))? "NULL" : "'$cb1_1'");
		$sql .= ",".((empty($r1_2))? "NULL" : "'$r1_2'");
		$sql .= ",".((empty($cb1_2))? "NULL" : "'$cb1_2'");
		$sql .= ",".((empty($r1_3))? "NULL" : "'$r1_3'");
		$sql .= ",".((empty($cb1_3))? "NULL" : "'$cb1_3'");
		$sql .= ",".((empty($r1_4))? "NULL" : "'$r1_4'");
		$sql .= ",".((empty($cb1_4))? "NULL" : "'$cb1_4'");
		$sql .= ",".((empty($r1_5))? "NULL" : "'$r1_5'");
		$sql .= ",".((empty($cb1_5))? "NULL" : "'$cb1_5'");
		// reason 2
		$sql .= ",".((empty($r2_1))? "NULL" : "'$r2_1'");
		$sql .= ",".((empty($cb2_1))? "NULL" : "'$cb2_1'");
		$sql .= ",".((empty($r2_2))? "NULL" : "'$r2_2'");
		$sql .= ",".((empty($cb2_2))? "NULL" : "'$cb2_2'");
		$sql .= ",".((empty($r2_3))? "NULL" : "'$r2_3'");
		$sql .= ",".((empty($cb2_3))? "NULL" : "'$cb2_3'");
		$sql .= ",".((empty($r2_4))? "NULL" : "'$r2_4'");
		$sql .= ",".((empty($cb2_4))? "NULL" : "'$cb2_4'");
		$sql .= ",".((empty($r2_5))? "NULL" : "'$r2_5'");
		$sql .= ",".((empty($cb2_5))? "NULL" : "'$cb2_5'");
		$sql .= ",".((empty($r2_6))? "NULL" : "'$r2_6'");
		$sql .= ",".((empty($cb2_6))? "NULL" : "'$cb2_6'");
		// reason 3
		$sql .= ",".((empty($r3_1))? "NULL" : "'$r3_1'");
		$sql .= ",".((empty($cb3_1))? "NULL" : "'$cb3_1'");
		$sql .= ",".((empty($r3_2))? "NULL" : "'$r3_2'");
		$sql .= ",".((empty($cb3_2))? "NULL" : "'$cb3_2'");
		$sql .= ",".((empty($r3_3))? "NULL" : "'$r3_3'");
		$sql .= ",".((empty($cb3_3))? "NULL" : "'$cb3_3'");
		$sql .= ",".((empty($r3_4))? "NULL" : "'$r3_4'");
		$sql .= ",".((empty($cb3_4))? "NULL" : "'$cb3_4'");
		$sql .= ",".((empty($r3_5))? "NULL" : "'$r3_5'");
		$sql .= ",".((empty($cb3_5))? "NULL" : "'$cb3_5'");
		$sql .= ",".((empty($r3_6))? "NULL" : "'$r3_6'");
		$sql .= ",".((empty($cb3_6))? "NULL" : "'$cb3_6'");
		$sql .= ",".((empty($r3_7))? "NULL" : "'$r3_7'");
		$sql .= ",".((empty($cb3_7))? "NULL" : "'$cb3_7'");
		$sql .= ",".((empty($r3_8))? "NULL" : "'$r3_8'");
		$sql .= ",".((empty($cb3_8))? "NULL" : "'$cb3_8'");
		$sql .= ",".((empty($r3_9))? "NULL" : "'$r3_9'");
		$sql .= ",".((empty($cb3_9))? "NULL" : "'$cb3_9'");
		$sql .= ",".((empty($r3_10))? "NULL" : "'$r3_10'");
		$sql .= ",".((empty($cb3_10))? "NULL" : "'$cb3_10'");
		$sql .= ",'$c_date','$c_date','$user','$txt_dateyear')";
	} elseif ($locate == 2) {
		// insert with type == TR
		$sql = " INSERT INTO data (type_locate,inspect_level,inspector,division,boss_name,inspect_type,inspect_date,inspect_no,inspect_doc,inspect_doc_date,personnel1,personnel2,personnel3,personnel4,personnel5,tr1,tr2,tr3,tr4,tr5,tr6,tr7,tr8";
		$sql .= ",r1_1,cb1_1,r1_2,cb1_2,r1_3,cb1_3,r1_4,cb1_4,r1_5,cb1_5";
		$sql .= ",r2_1,cb2_1,r2_2,cb2_2,r2_3,cb2_3,r2_4,cb2_4,r2_5,cb2_5,r2_6,cb2_6,r2_7,cb2_7";
		$sql .= ",r3_1,cb3_1,r3_2,cb3_2,r3_3,cb3_3,r3_4,cb3_4,r3_5,cb3_5,r3_6,cb3_6,r3_7,cb3_7,r3_8,cb3_8,r3_9,cb3_9,r3_10,cb3_10";
		$sql .= ",insert_date,create_date,create_by,budget_year)";
		$sql .= " VALUES ('$locate','d','$insid','$txtReceiver','$txtboss_name','$inspectType','$inspectDate','$inspectNo','$inspectDoc','$inspectDateDoc','$txtpersonnel1','$txtpersonnel2','$txtpersonnel3','$txtpersonnel4','$txtpersonnel5','$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8'";
		// reason 1
		$sql .= ",".((empty($r1_1))? "NULL" : "'$r1_1'");
		$sql .= ",".((empty($cb1_1))? "NULL" : "'$cb1_1'");
		$sql .= ",".((empty($r1_2))? "NULL" : "'$r1_2'");
		$sql .= ",".((empty($cb1_2))? "NULL" : "'$cb1_2'");
		$sql .= ",".((empty($r1_3))? "NULL" : "'$r1_3'");
		$sql .= ",".((empty($cb1_3))? "NULL" : "'$cb1_3'");
		$sql .= ",".((empty($r1_4))? "NULL" : "'$r1_4'");
		$sql .= ",".((empty($cb1_4))? "NULL" : "'$cb1_4'");
		$sql .= ",".((empty($r1_5))? "NULL" : "'$r1_5'");
		$sql .= ",".((empty($cb1_5))? "NULL" : "'$cb1_5'");
		// reason 2
		$sql .= ",".((empty($r2_1))? "NULL" : "'$r2_1'");
		$sql .= ",".((empty($cb2_1))? "NULL" : "'$cb2_1'");
		$sql .= ",".((empty($r2_2))? "NULL" : "'$r2_2'");
		$sql .= ",".((empty($cb2_2))? "NULL" : "'$cb2_2'");
		$sql .= ",".((empty($r2_3))? "NULL" : "'$r2_3'");
		$sql .= ",".((empty($cb2_3))? "NULL" : "'$cb2_3'");
		$sql .= ",".((empty($r2_4))? "NULL" : "'$r2_4'");
		$sql .= ",".((empty($cb2_4))? "NULL" : "'$cb2_4'");
		$sql .= ",".((empty($r2_5))? "NULL" : "'$r2_5'");
		$sql .= ",".((empty($cb2_5))? "NULL" : "'$cb2_5'");
		$sql .= ",".((empty($r2_6))? "NULL" : "'$r2_6'");
		$sql .= ",".((empty($cb2_6))? "NULL" : "'$cb2_6'");
		$sql .= ",".((empty($r2_7))? "NULL" : "'$r2_7'");
		$sql .= ",".((empty($cb2_7))? "NULL" : "'$cb2_7'");
		// reason 3
		$sql .= ",".((empty($r3_1))? "NULL" : "'$r3_1'");
		$sql .= ",".((empty($cb3_1))? "NULL" : "'$cb3_1'");
		$sql .= ",".((empty($r3_2))? "NULL" : "'$r3_2'");
		$sql .= ",".((empty($cb3_2))? "NULL" : "'$cb3_2'");
		$sql .= ",".((empty($r3_3))? "NULL" : "'$r3_3'");
		$sql .= ",".((empty($cb3_3))? "NULL" : "'$cb3_3'");
		$sql .= ",".((empty($r3_4))? "NULL" : "'$r3_4'");
		$sql .= ",".((empty($cb3_4))? "NULL" : "'$cb3_4'");
		$sql .= ",".((empty($r3_5))? "NULL" : "'$r3_5'");
		$sql .= ",".((empty($cb3_5))? "NULL" : "'$cb3_5'");
		$sql .= ",".((empty($r3_6))? "NULL" : "'$r3_6'");
		$sql .= ",".((empty($cb3_6))? "NULL" : "'$cb3_6'");
		$sql .= ",".((empty($r3_7))? "NULL" : "'$r3_7'");
		$sql .= ",".((empty($cb3_7))? "NULL" : "'$cb3_7'");
		$sql .= ",".((empty($r3_8))? "NULL" : "'$r3_8'");
		$sql .= ",".((empty($cb3_8))? "NULL" : "'$cb3_8'");
		$sql .= ",".((empty($r3_9))? "NULL" : "'$r3_9'");
		$sql .= ",".((empty($cb3_9))? "NULL" : "'$cb3_9'");
		$sql .= ",".((empty($r3_10))? "NULL" : "'$r3_10'");
		$sql .= ",".((empty($cb3_10))? "NULL" : "'$cb3_10'");
		$sql .= ",'$c_date','$c_date','$user','$txt_dateyear')";
	}
// ================================ check menu EDIT (update data) ================================ //
} elseif ($menu == "edit") {
	$id = $_POST['inid'];
	// update with type SP
	if ($locate == 1) {
		$sql = "UPDATE data SET
						inspector = '$insid',
						division = '$txtReceiver',
						boss_name = '$txtboss_name',
						inspect_type = '$inspectType',
						inspect_date = '$inspectDate',
						inspect_no = '$inspectNo',
						inspect_doc = '$inspectDoc',
						inspect_doc_date = '$inspectDateDoc',
						personnel1 = '$txtpersonnel1',
						personnel2 = '$txtpersonnel2',
						personnel3 = '$txtpersonnel3',
						personnel4 = '$txtpersonnel4',
						personnel5 = '$txtpersonnel5',
						cm = '$case_CM',
						fc = '$case_FC',
						cc = '$case_CC',
						case53 = '$casechild_53',
						case_f = '$caserecov',
						case132 = '$case132',
						case_sp = '$casedjop'";
						// reason 1
		$sql .= ", r1_1 = ".((empty($r1_1))? "NULL" : "'$r1_1'");
		$sql .= ", cb1_1 = ".((empty($cb1_1))? "NULL" : "'$cb1_1'");
		$sql .= ", r1_2 = ".((empty($r1_2))? "NULL" : "'$r1_2'");
		$sql .= ", cb1_2 = ".((empty($cb1_2))? "NULL" : "'$cb1_2'");
		$sql .= ", r1_3 = ".((empty($r1_3))? "NULL" : "'$r1_3'");
		$sql .= ", cb1_3 = ".((empty($cb1_3))? "NULL" : "'$cb1_3'");
		$sql .= ", r1_4 = ".((empty($r1_4))? "NULL" : "'$r1_4'");
		$sql .= ", cb1_4 = ".((empty($cb1_4))? "NULL" : "'$cb1_4'");
		$sql .= ", r1_5 = ".((empty($r1_5))? "NULL" : "'$r1_5'");
		$sql .= ", cb1_5 = ".((empty($cb1_5))? "NULL" : "'$cb1_5'");
		// reason 2
		$sql .= ", r2_1 = ".((empty($r2_1))? "NULL" : "'$r2_1'");
		$sql .= ", cb2_1 = ".((empty($cb2_1))? "NULL" : "'$cb2_1'");
		$sql .= ", r2_2 = ".((empty($r2_2))? "NULL" : "'$r2_2'");
		$sql .= ", cb2_2 = ".((empty($cb2_2))? "NULL" : "'$cb2_2'");
		$sql .= ", r2_3 = ".((empty($r2_3))? "NULL" : "'$r2_3'");
		$sql .= ", cb2_3 = ".((empty($cb2_3))? "NULL" : "'$cb2_3'");
		$sql .= ", r2_4 = ".((empty($r2_4))? "NULL" : "'$r2_4'");
		$sql .= ", cb2_4 = ".((empty($cb2_4))? "NULL" : "'$cb2_4'");
		$sql .= ", r2_5 = ".((empty($r2_5))? "NULL" : "'$r2_5'");
		$sql .= ", cb2_5 = ".((empty($cb2_5))? "NULL" : "'$cb2_5'");
		$sql .= ", r2_6 = ".((empty($r2_6))? "NULL" : "'$r2_6'");
		$sql .= ", cb2_6 = ".((empty($cb2_6))? "NULL" : "'$cb2_6'");
		// reason 3
		$sql .= ", r3_1 = ".((empty($r3_1))? "NULL" : "'$r3_1'");
		$sql .= ", cb3_1 = ".((empty($cb3_1))? "NULL" : "'$cb3_1'");
		$sql .= ", r3_2 = ".((empty($r3_2))? "NULL" : "'$r3_2'");
		$sql .= ", cb3_2 = ".((empty($cb3_2))? "NULL" : "'$cb3_2'");
		$sql .= ", r3_3 = ".((empty($r3_3))? "NULL" : "'$r3_3'");
		$sql .= ", cb3_3 = ".((empty($cb3_3))? "NULL" : "'$cb3_3'");
		$sql .= ", r3_4 = ".((empty($r3_4))? "NULL" : "'$r3_4'");
		$sql .= ", cb3_4 = ".((empty($cb3_4))? "NULL" : "'$cb3_4'");
		$sql .= ", r3_5 = ".((empty($r3_5))? "NULL" : "'$r3_5'");
		$sql .= ", cb3_5 = ".((empty($cb3_5))? "NULL" : "'$cb3_5'");
		$sql .= ", r3_6 = ".((empty($r3_6))? "NULL" : "'$r3_6'");
		$sql .= ", cb3_6 = ".((empty($cb3_6))? "NULL" : "'$cb3_6'");
		$sql .= ", r3_7 = ".((empty($r3_7))? "NULL" : "'$r3_7'");
		$sql .= ", cb3_7 = ".((empty($cb3_7))? "NULL" : "'$cb3_7'");
		$sql .= ", r3_8 = ".((empty($r3_8))? "NULL" : "'$r3_8'");
		$sql .= ", cb3_8 = ".((empty($cb3_8))? "NULL" : "'$cb3_8'");
		$sql .= ", r3_9 = ".((empty($r3_9))? "NULL" : "'$r3_9'");
		$sql .= ", cb3_9 = ".((empty($cb3_9))? "NULL" : "'$cb3_9'");
		$sql .= ", r3_10 = ".((empty($r3_10))? "NULL" : "'$r3_10'");
		$sql .= ", cb3_10 = ".((empty($cb3_10))? "NULL" : "'$cb3_10'");
		$sql .= ", insert_date = '$c_date',
							 update_by = '$user',
							 budget_year = '$txt_dateyear'";
		$sql .= " WHERE id = '$id'";
	} elseif ($locate == 2) {
	// update with type TR
	$sql = "UPDATE data SET
					inspector = '$insid',
					division = '$txtReceiver',
					boss_name = '$txtboss_name',
					inspect_type = '$inspectType',
					inspect_date = '$inspectDate',
					inspect_no = '$inspectNo',
					inspect_doc = '$inspectDoc',
					inspect_doc_date = '$inspectDateDoc',
					personnel1 = '$txtpersonnel1',
					personnel2 = '$txtpersonnel2',
					personnel3 = '$txtpersonnel3',
					personnel4 = '$txtpersonnel4',
					personnel5 = '$txtpersonnel5',
					tr1 = '$t1',
					tr2 = '$t2',
					tr3 = '$t3',
					tr4 = '$t4',
					tr5 = '$t5',
					tr6 = '$t6',
					tr7 = '$t7',
					tr8 = '$t8'";
					// reason 1
	$sql .= ", r1_1 = ".((empty($r1_1))? "NULL" : "'$r1_1'");
	$sql .= ", cb1_1 = ".((empty($cb1_1))? "NULL" : "'$cb1_1'");
	$sql .= ", r1_2 = ".((empty($r1_2))? "NULL" : "'$r1_2'");
	$sql .= ", cb1_2 = ".((empty($cb1_2))? "NULL" : "'$cb1_2'");
	$sql .= ", r1_3 = ".((empty($r1_3))? "NULL" : "'$r1_3'");
	$sql .= ", cb1_3 = ".((empty($cb1_3))? "NULL" : "'$cb1_3'");
	$sql .= ", r1_4 = ".((empty($r1_4))? "NULL" : "'$r1_4'");
	$sql .= ", cb1_4 = ".((empty($cb1_4))? "NULL" : "'$cb1_4'");
	$sql .= ", r1_5 = ".((empty($r1_5))? "NULL" : "'$r1_5'");
	$sql .= ", cb1_5 = ".((empty($cb1_5))? "NULL" : "'$cb1_5'");
	// reason 2
	$sql .= ", r2_1 = ".((empty($r2_1))? "NULL" : "'$r2_1'");
	$sql .= ", cb2_1 = ".((empty($cb2_1))? "NULL" : "'$cb2_1'");
	$sql .= ", r2_2 = ".((empty($r2_2))? "NULL" : "'$r2_2'");
	$sql .= ", cb2_2 = ".((empty($cb2_2))? "NULL" : "'$cb2_2'");
	$sql .= ", r2_3 = ".((empty($r2_3))? "NULL" : "'$r2_3'");
	$sql .= ", cb2_3 = ".((empty($cb2_3))? "NULL" : "'$cb2_3'");
	$sql .= ", r2_4 = ".((empty($r2_4))? "NULL" : "'$r2_4'");
	$sql .= ", cb2_4 = ".((empty($cb2_4))? "NULL" : "'$cb2_4'");
	$sql .= ", r2_5 = ".((empty($r2_5))? "NULL" : "'$r2_5'");
	$sql .= ", cb2_5 = ".((empty($cb2_5))? "NULL" : "'$cb2_5'");
	$sql .= ", r2_6 = ".((empty($r2_6))? "NULL" : "'$r2_6'");
	$sql .= ", cb2_6 = ".((empty($cb2_6))? "NULL" : "'$cb2_6'");
	$sql .= ", r2_7 = ".((empty($r2_7))? "NULL" : "'$r2_7'");
	$sql .= ", cb2_7 = ".((empty($cb2_7))? "NULL" : "'$cb2_7'");
	// reason 3
	$sql .= ", r3_1 = ".((empty($r3_1))? "NULL" : "'$r3_1'");
	$sql .= ", cb3_1 = ".((empty($cb3_1))? "NULL" : "'$cb3_1'");
	$sql .= ", r3_2 = ".((empty($r3_2))? "NULL" : "'$r3_2'");
	$sql .= ", cb3_2 = ".((empty($cb3_2))? "NULL" : "'$cb3_2'");
	$sql .= ", r3_3 = ".((empty($r3_3))? "NULL" : "'$r3_3'");
	$sql .= ", cb3_3 = ".((empty($cb3_3))? "NULL" : "'$cb3_3'");
	$sql .= ", r3_4 = ".((empty($r3_4))? "NULL" : "'$r3_4'");
	$sql .= ", cb3_4 = ".((empty($cb3_4))? "NULL" : "'$cb3_4'");
	$sql .= ", r3_5 = ".((empty($r3_5))? "NULL" : "'$r3_5'");
	$sql .= ", cb3_5 = ".((empty($cb3_5))? "NULL" : "'$cb3_5'");
	$sql .= ", r3_6 = ".((empty($r3_6))? "NULL" : "'$r3_6'");
	$sql .= ", cb3_6 = ".((empty($cb3_6))? "NULL" : "'$cb3_6'");
	$sql .= ", r3_7 = ".((empty($r3_7))? "NULL" : "'$r3_7'");
	$sql .= ", cb3_7 = ".((empty($cb3_7))? "NULL" : "'$cb3_7'");
	$sql .= ", r3_8 = ".((empty($r3_8))? "NULL" : "'$r3_8'");
	$sql .= ", cb3_8 = ".((empty($cb3_8))? "NULL" : "'$cb3_8'");
	$sql .= ", r3_9 = ".((empty($r3_9))? "NULL" : "'$r3_9'");
	$sql .= ", cb3_9 = ".((empty($cb3_9))? "NULL" : "'$cb3_9'");
	$sql .= ", r3_10 = ".((empty($r3_10))? "NULL" : "'$r3_10'");
	$sql .= ", cb3_10 = ".((empty($cb3_10))? "NULL" : "'$cb3_10'");
	$sql .= ", insert_date = '$c_date',
						 update_by = '$user',
						 budget_year = '$txt_dateyear'";
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
    echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.location.href ='list.php';;</script>";//Save successfully!
  }else{
		echo '<script type="text/javascript">';
		echo 'alert("Error can not save data!");javascript:history.go(-1)';
		echo '</script>';
  }
  mysqli_close($conn);
}
?>
