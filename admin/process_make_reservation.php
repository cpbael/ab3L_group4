<?php
  session_start();
	require_once"sql_connect.php";

		$service_id=$_GET['service_id'];
		$start_date=$_POST['start_date']." 11:00:00";
		$end_date=$_POST['end_date']." 11:00:00";
		$start=new DateTime($start_date);
		$end=new DateTime($end_date);
		
		if($start>$end){
			$temp=$start_date;
			$start_date=$end_date;
			$end_date=$temp;
		}
		
		$start_time=strtotime($start_date);
		$end_time=strtotime($end_date);
		$diff_hour=floor(($end_time-$start_time)/(60*60*24));
		
		
		
		// echo "Service id".$service_id."<br/>";
		// echo $start_date;
		// echo "<br/>".$end_date."<br/>";
		// $diff= $start->diff($end);
		// printf('%d days, %d hours, %d minutes', $diff->d, $diff->h, $diff->i);
		
		
		if ($res=mysql_fetch_array(mysql_query("SELECT * FROM reservation WHERE service_id=$service_id AND '$start_date' < end_date AND '$end_date' > start_date;"))){
			$_SESSION['ERROR']=true;
			$_SESSION['MSG']="SERVICE already reserved from {$res['start_date']} to {$res['end_date']}";
			echo $_SESSION['MSG'];
		}else{
			//check if the guest is already registered
			if($regd=mysql_fetch_array(mysql_query("SELECT guest_id from guest where UPPER(fullname)=UPPER('{$_POST['name']}');"))){
				$reserver_id=$regd[0];
			}else{
				$query_add_guest="INSERT INTO guest(fullname,contactno) VALUES ('{$_POST['name']}','{$_POST['contact_num']}');";
				if(mysql_query($query_add_guest)){
					$guest=mysql_fetch_array(mysql_query("SELECT guest_id from guest where UPPER(fullname)=UPPER('{$_POST['name']}');"));
					$reserver_id=$guest[guest_id];
				}
			}
			
			$rate=mysql_fetch_array((mysql_query("SELECT rate from service where service_id='$service_id';")));
			$price= $diff_hour * $rate[0];
			$query_insert_reservation="INSERT INTO reservation(service_id,start_date,end_date,is_Member,member_id,price,is_Paid,status) VALUES($service_id,'$start_date','{$end_date}',0,{$reserver_id},{$price},0,-1);";
			if(mysql_query($query_insert_reservation)){
				$_SESSION['ERROR']=false;
				$_SESSION['MSG']="Service succesfully reserved from<br/><strong>$start_date to $end_date</strong><br/>Price: $price";
			}else{
				die('Could not add reservation: ' . mysql_error());
			}
		}

	require_once("sql_disconnect.php");

	header("LOCATION:make_reservation.php?service_id=$service_id"); 
?>