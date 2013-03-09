<?php 
	require_once "process_check_if_logged_in.php";
	require_once "sql_connect.php";
	require_once"header.php";
?>

<?php
	$reservations=mysql_query("select * from reservation ORDER BY status ASC, ABS(DATEDIFF(start_date, NOW())) ASC");
	while($reservation_info=mysql_fetch_array($reservations)){
		$reservation[]=$reservation_info;
	}
?>
	<a href='view_log.php'>Log</a> <a href='view_current.php'>Checked-in</a> <a href='view_reserved.php'>Reservations</a>  <a href='view_all_reservations.php'>All</a>
	<table>
	<tr>
		<th>Name</th>
		<th>RESERVATION ID</th>
		<th>SERVICE NAME</th>
		<th>START DATE</th>
		<th>END DATE</th>
		<th>PRICE</th>
		<th>STATUS</th>
	</tr>
<?php
		for($i=0;isset($reservation) and $i<count($reservation);$i++){
				
			$query="SELECT service_name from service where service_id={$reservation[$i]['service_id']};";
			$service_name= mysql_fetch_array(mysql_query($query));			///get service_name
			if($reservation[$i]['is_Member']==1){
				$res=mysql_fetch_array(mysql_query("SELECT fullname from member where member_id='{$reservation[$i]['member_id']}';"));
				$reserver=$res[0];
			}else{
				$res=mysql_fetch_array(mysql_query("SELECT fullname from guest where guest_id='{$reservation[$i]['member_id']}' ;"));
				$reserver=$res[0];
			}
			//echo "<tr><td>{$reservation[$i]['service_id']}</td></tr>";
			echo "<tr>";
			echo "<td>{$reserver}</td>";
			echo "<td>",$reservation[$i]['reservation_id'], "</td>";
			echo "<td>",$service_name[0], "</td>";
			echo "<td>{$reservation[$i]['start_date']}</td>";
			echo "<td>{$reservation[$i]['end_date']}</td>";
			echo "<td>{$reservation[$i]['price']}</td>";
			if($reservation[$i]['status']==-1){
				echo "<td>RESERVED</td>";
			}else if ($reservation[$i]['status']==0){
				echo "<td>CHECKED-IN</td>";
			}else if($reservation[$i]['status']==1){
				echo "<td>CHECKED-OUT</td>";
			}
			if($reservation[$i]['status']==-1){
				echo "<td><a href='edit_reservation.php?reservation_id={$reservation[$i]['reservation_id']}'>Edit</a></td>";
			}
			if($reservation[$i]['status']==-1){
				echo "<td><a href='process_check_in.php?id={$reservation[$i]['reservation_id']}'>Check-in</a></td>";
			}
			if($reservation[$i]['status']==0){
				echo "<td><a href='process_check_out.php?id={$reservation[$i]['reservation_id']}'>Check-out</a></td>";
			}
			echo "</tr>";	
		}//end-while
?>
	</table>


<?php require_once"sql_disconnect.php";?>
<?php require_once"footer.php";?>