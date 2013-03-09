<?php
	require_once"header.php";
	require_once"sql_connect.php";
	
	$services_array=mysql_query("select * from service");
	$services=array();
	while($service_info=mysql_fetch_array($services_array)){
		$services[]=$service_info;
	}
	$i=0;
	$col=1;
	echo "<table>";
		while($i<count($services)){
			if($col==4){
				echo "<tr>";	
				$col=1;
			}
			$j=0;
?>			<td><table id='service'>
<?php
			$type=mysql_fetch_array(mysql_query("SELECT * from type where type_id={$services[$i]['type_id']};"));
			echo "<tr><td><img id='itemImg' src='images/{$type['image']}'/></td></tr>";
			echo "<tr><td>Name:</td><td>{$services[$i]['service_name']}</td></tr>";
			echo "<tr><td>Rate:</td><td>{$services[$i]['rate']}</td></tr>";
			echo "<tr><td>Type:</td><td>{$type['type_name']}</td></tr>";
			echo "<tr><td>Classification:</td><td>{$type['classification']}</td></tr>";
			echo "<tr><td>Article:</td><td>{$services[$i]['article']}</td></tr>";
			echo "<tr><td><a href='make_reservation.php?service_id={$services[$i]['service_id']}'>Admin_Make reservation</a></td></tr>";
			echo "<tr><td><a href='add_reservation.php?service_id={$services[$i]['service_id']}'>Add reservation</a></td></tr>";
			echo "</table></td>";
			if($col==4){
				echo "</tr>";	
				$col=1;
			}
			$i++;$col++;
		}
?>
	</table>
<?php
	require_once"footer.php";
	require_once"sql_disconnect.php";
?>