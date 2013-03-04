<?php
	require_once("sql_connect.php");
	session_start();
	
	$service_name=$_POST['service_name'];
	$rate=$_POST['rate'];
	//$type=$_POST['type'];
	//$image=$_POST['image'];
	$classification=$_POST['classification'];
	$article=$_POST['article'];
	echo $_GET['image'];
	if(empty($_FILES['item_img']['tmp_name'])){
		$image=$_GET['image'];		
	}else{
		echo "papaltan";
		$type=$_FILES['item_img']['type'];
		$type=str_replace("image/",".",$type);
		$image=htmlspecialchars($service_name.$type);
		echo $image;
		unlink("images/{$_GET['image']}");		
		move_uploaded_file($_FILES['item_img']['tmp_name'],"images/{$image}");
	}	
	
	if(mysql_query("update service set service_name='{$service_name}',article='{$article}',
					rate={$rate},classification='{$classification}',image='{$image}' where service_id={$_GET['service_id']};")){
		$_SESSION['ERROR']=false;
		$_SESSION['MSG']="SERVICE UPDATED SUCCESSFULLY!";
	}else{
			die('Could not add service: ' . mysql_error());
	}	
	require_once("sql_disconnect.php");
	header("LOCATION:edit_service.php?service_id={$_GET['service_id']}");
?>
