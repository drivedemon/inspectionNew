<?php 	
	require 'dbconnect.php';	
	date_default_timezone_set('Asia/Bangkok');
	
	/**/
	$date_year = $_POST["txtDate_year"];
	$date_year = htmlspecialchars($date_year,ENT_QUOTES); 
	$date_year = mysqli_real_escape_string($conn,$date_year);	
	
	$number = addslashes(trim($_POST['selectedNumber']));
	$number = htmlspecialchars($number,ENT_QUOTES); 
	$number = mysqli_real_escape_string($conn,$number);
	
	$receiver = addslashes(trim($_POST['txtReceiver']));
	$receiver = htmlspecialchars($receiver,ENT_QUOTES); 
	$receiver = mysqli_real_escape_string($conn,$receiver);
	
	$date_sent = addslashes(trim($_POST['DateSent']));
	$date_sent = htmlspecialchars($date_sent,ENT_QUOTES); 
	$date_sent = mysqli_real_escape_string($conn,$date_sent);
	
	$insert_date = date('Y-m-d H:i:s');
	
	//echo $date_sent;
	
	/**/
	$file = $_FILES['file'];
	$Name = $_FILES['file']['name'];
	$TempName = $_FILES['file']['tmp_name'];
	$Size = $_FILES['file']['size'];
	$Error = $_FILES['file']['error'];
	$type = $_FILES['file']['type'];
	$ext = explode('.',$Name);
	$actualext= strtolower(end($ext));
	$allowed= array('pdf','zip');
	
	if(in_array($actualext,$allowed)) 
	{
		if ($Error === 0) {
			
			if($Size < 20000000) 
			{
				$newname = $ext[0].date('Y').".".$actualext;
			/**/
				$sql_getid = "SELECT * FROM report WHERE file='$newname'";
				$check_uniqe_directory = mysqli_query($conn,$sql_getid) or die(mysqli_error());
				$count = mysqli_num_rows($check_uniqe_directory);		
					
				if($count==0){
					$newname = $ext[0].date('Y').".".$actualext;
				}else if ($count!=0){
					$extend_name = mt_rand(0,9);				
					$newname = $ext[0].date('Y')."_".$extend_name.".".$actualext;
					/*echo $sql_getid;
					echo "<br>";*/
				}
			/**/
				$fileDestination=  'files-report/'.$newname;
				move_uploaded_file($TempName,$fileDestination);
				
				echo "<script type='text/javascript'>alert('Save successfully!'); javascript:window.close();</script>";//Save successfully!
				$sql = "INSERT INTO report (date_year, number,receiver,date_sent,file,insert_date)
						VALUES ('$date_year','$number','$receiver','$date_sent','$newname','$insert_date')";
				$query = mysqli_query($conn,$sql);
				
				//echo $sql;
			}
			else 
			{
				echo "<script type='text/javascript'>alert('Error!! File size is too large');javascript:history.go(-1);</script>";//Error!! File size is too large
			}			
		}
		else 
		{
			echo "<script type='text/javascript'>alert('Error in uploading the file');javascript:history.go(-1);</script>";//Error in uploading the file
		}
	}
	else 
	{
		echo "<script type='text/javascript'>alert('Error!! File Extention not Correct');javascript:history.go(-1);</script>";//Error!! File Extention not Correct
	}	

mysqli_close($conn);	

?>

