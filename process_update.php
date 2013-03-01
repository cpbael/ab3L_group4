<?php
	require_once("sql_connect.php");
	session_start();
	
	$name=$_POST['firstname'];
	$eadd=$_POST['eadd'];
	$uname=$_POST['username'];
	$contact=$_POST['contact'];
	
	if(mysql_query("update member set uname='{$uname}',
					eadd='{$eadd}',contactno='{$contact}',fullname='{$name}' where member_id={$_SESSION['member_id']};")){
		$_SESSION['ERROR']=false;
		$_SESSION['MSG']="Account updated!";
		echo $_SESSION['MSG'];
	}else{
		$_SESSION['ERROR']=false;
		$_SESSION['MSG']="Fail to update account!";
		echo $_SESSION['MSG'];
	}
	
	require_once("sql_disconnect.php");
	header("LOCATION:edit_account.php");
?>
