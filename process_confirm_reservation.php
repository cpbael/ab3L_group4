<?php 
	require_once("sql_connect.php");
	require_once("config_email.php");
	session_start();
	$member_id=$_SESSION['member_id'];
	
		$message="Good day! We would like to thank you for confirming you reservation for:";
	
		$query="SELECT * from reservation where member_id={$member_id} and is_Paid='0';";
		$result=mysql_query($query);
		$total=0;
		if($result){
			while($row = mysql_fetch_array($result)){
				$query="SELECT service_name from service where service_id={$row['service_id']};";
				$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
				$message=$message."\n";
				$message=$message."\n\t".$service_name[0];
				$message=$message."\n\t".$row['start_date'];
				$message=$message. "\n\t".$row['end_date'];
				$message=$message."\n\t".$row['price'];					

				$total+=$row['price'];	
			}
		}
	$message=$message."\n\rFor a total of: Php{$total}";

	$query="UPDATE reservation SET is_Paid=1 where member_id={$member_id};";				
	$result=mysql_query($query);

	if(smtpmailer('claudinebael@gmail.com', 'hoteljuantoate@gmail.com', 'Hotel 128', 'Payment for Reservation', $message)){
		echo "Success";
	}
	if (!empty($error)) echo $error;
	
	$_SESSION['CONFIRMED']=true;
	$_SESSION['TOTAL']=$_POST['total_reservation'];
	 require_once("sql_disconnect.php");
	header("LOCATION:confirm_reservation.php");

?>