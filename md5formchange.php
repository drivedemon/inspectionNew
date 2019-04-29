<?php
	require 'dbconnect.php';
	
	$pass_arr = array('');
	
	for($i=0;$i<count($pass_arr);$i++){
		echo md5(md5(md5($pass_arr[$i])));
		echo "</br>";
	}
	mysqli_close($conn);
?>