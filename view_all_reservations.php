<?php 
	require_once "process_check_if_logged_in.php";
	require_once "sql_connect.php";
	require_once"header.php";
?>

<?php
	$reservations=mysql_query("select * from reservation");
	while($reservation_info=mysql_fetch_array($reservations)){
		$reservation[]=$reservation_info;
	}
?>
	<table>
	<tr>
		<th>Name</th>
		<th>RESERVATION ID</th>
		<th>SERVICE NAME</th>
		<th>START DATE</th>
		<th>END DATE</th>
		<th>PRICE</th>
	</tr>
<?php
		for($i=0;$i<count($reservation);$i++){
			echo "<tr>";	
			$query="SELECT service_name from service where service_id={$reservation[$i]['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			if($reservation[$i]['is_Member']==1){
				$res=mysql_fetch_array(mysql_query("SELECT fullname from member where member_id='{$reservation[$i]['member_id']}';"));
				$reserver=$res[0];
			}else{
				$res=mysql_fetch_array(mysql_query("SELECT first_name from guest where guest_id='{$reservation[$i]['member_id']}';"));
				$reserver=$res[0];
				$res=mysql_fetch_array(mysql_query("SELECT last_name from guest where guest_id='{$reservation[$i]['member_id']}';"));
				$reserver=$reserver." ".$res[0];
			}
			//echo "<tr><td>{$reservation[$i]['service_id']}</td></tr>";
			echo "<td>{$reserver}</td>";
			echo "<td>",$reservation[$i]['reservation_id'], "</td>";
			echo "<td>",$service_name[0], "</td>";
			echo "<td>{$reservation[$i]['start_date']}</td>";
			echo "<td>{$reservation[$i]['end_date']}</td>";
			echo "<td>{$reservation[$i]['price']}</td>";
			echo "<td><a href='edit_reservation.php?reservation_id={$reservation[$i]['reservation_id']}'>Edit</a></td>";
			echo "</tr>";	
		}//end-while
?>
	</table>


<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>