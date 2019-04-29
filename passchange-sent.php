<?php
	require 'dbconnect.php';
	require_once 'password.php';
	error_reporting(E_ALL); 
	ini_set('display_errors', 1);
	
	$username = $_POST["txtUser"];
	$username = htmlspecialchars($username,ENT_QUOTES); 
	$username = mysqli_real_escape_string($conn,$username);
	
	$password = $_POST["txtPass"];
	$password = htmlspecialchars($password,ENT_QUOTES); 
	$password = mysqli_real_escape_string($conn,$password);
	
	$Npassword = $_POST["txtNPass"];
	$Npassword = htmlspecialchars($Npassword,ENT_QUOTES); 
	$Npassword = mysqli_real_escape_string($conn,$Npassword);
	
	$CFpassword = $_POST["txtCFPass"];
	$CFpassword = htmlspecialchars($key,ENT_QUOTES); 
	$CFpassword = mysqli_real_escape_string($conn,$CFpassword);
	
	/**/
	$sql_check = "select * from user where username = '$username'";
	$query_check = mysqli_query($conn,$sql_check);
	$numRows = mysqli_num_rows($query_check);	
	
	$sql_user = "select id from user where username = '$username'";
	$qry_user = mysqli_query($conn,$sql_user);
	$data_user = mysqli_fetch_array($qry_user);
	$userID = $data_user['id'];
			
	if($numRows  == 1){
		$row = mysqli_fetch_assoc($query_check);
		$password_en = password_verify($password,$row['password']);
		if(password_verify($password,$row['password'])){
			
			if($Npassword == $CFpassword){
				$options = array("cost"=>4);
				$hashPassword = password_hash($Npassword,PASSWORD_BCRYPT,$options);						
				$sql = "UPDATE user SET password = '$hashPassword' WHERE id = '$userID'";
				$query = mysqli_query($conn,$sql);
				
				if($query)
				{
					echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.location.href='passchange-page.php';</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('Password and Confirm Password is not match'); javascript:window.location.href='passchange-page.php';</script>";
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Current Password is not Correct'); javascript:window.location.href='passchange-page.php';</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>alert('No User found'); javascript:window.location.href='passchange-page.php';</script>";
	}	
	
	mysqli_close($conn);
?>