<?php
/*
Ina-Update yung reservation table kung may hindi pa mga dumadating sa check-in day nila..
*/

  require_once "sql_connect.php";

?>

<?php
	$result = mysql_query("SELECT * FROM reservation");
	$date = date("Y-m-d");
	while($row1 = mysql_fetch_array($result)){
		if($row1['end_date'] < $date){
		mysql_query("update reservation set flag='2'");
		}
	}
	
	require_once("sql_disconnect.php");
?>