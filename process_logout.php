<?php
	/*This is the php file that will destroy sessions to logout*/
	session_start();
	unset($_SESSION['login']);
	header("Location:admin.php");
?>
