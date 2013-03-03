<?php 
	require_once "process_check_if_logged_in.php";
	require_once "sql_connect.php";
	require_once"header.php";
	//require_once "do_check_login.php";
?>

<?php
	$account_info=mysql_fetch_array(mysql_query("select * from member where member_id={$_SESSION['member_id']};"));
	//echo "<pre>".var_dump($account_info)."</pre>";
	$reservations=mysql_query("select * from reservation where member_id={$_SESSION['member_id']}");
	

	while($reservation_info=mysql_fetch_array($reservations)){
		$reservation[]=$reservation_info;
	}
	$i=0;
	$col=1;
	echo "<table>";
		while($i<count($reservation)){
			if($col==4){
				echo "<tr>";	
				$col=1;
			}
			$j=0;
			$query="SELECT service_name from service where service_id={$reservation[$i]['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			echo "<td><table id='reservation'>";
				//echo "<tr><td>{$reservation[$i]['service_id']}</td></tr>";
				echo "<tr><td>",$service_name[0], "</td></tr>";
				echo "<tr><td>{$reservation[$i]['reservation_id']}</td></tr>";
				echo "<tr><td>{$reservation[$i]['start_date']}</td></tr>";
				echo "<tr><td>{$reservation[$i]['end_date']}</td></tr>";
				echo "<tr><td>{$reservation[$i]['price']}</td></tr>";
				
				
			echo "</table></td>";
			if($col==4){
				echo "</tr>";	
				$col=1;
			}
			$i++;$col++;
		}
	echo "</table>";

?>


<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>