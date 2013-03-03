<?php
	require_once"process_check_if_logged_in.php";
	require_once"header.php";
	require_once"sql_connect.php";	
	$info=mysql_fetch_array(mysql_query("SELECT * FROM reservation WHERE reservation_id={$_GET['reservation_id']}"));
	$info2=mysql_fetch_array(mysql_query("SELECT * FROM service where service_id={$info['service_id']}"));
?>
	<div class="log3">
	<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_edit_reservation.php?service_id=<?php echo $_GET['service_id'];?>">
		<tr>
			<div class = "signup">
				<?php echo $info2['service_name']; ?>
			</div>
		</tr>
		<br />
		<br />
		<br />
		<br />
		<br />
		<tr>
			<td colspan = "2"><hr><td>
		</tr>
		<tr>
			<td class = "loginBottom1">
			</td>
			<td>
				<img id='itemImg' src="images/<?php echo $info2['image'];?>"/>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Rate per Day:</td>
			<td>
				<?php echo $info2['rate'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Classification:</td>
			<td>
				<?php echo $info2['classification'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Article:</td>
			<td>
				<?php echo $info2['article'];?>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1"> First Name:</td>
			<td>
				<input type="text" name="first_name" required value="<?php echo ?>">
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1"> Last Name:</td>
			<td>
				<input type="text" name="last_name" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Contact Number:</td>
			<td>
				<input type="text" name="contact_num" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">Start date:</td>
			<td>
				<input type="date" name="start_date" value="" min="<?php echo date('Y-m-d')?>" required>
			</td>
		</tr>
		<tr>
			<td class = "loginBottom1">End date:</td>
			<td>
				<input type="date" name="end_date" value="" min="<?php echo date('Y-m-d')?>" required>
			</td>
		</tr>
		<tr>
			<td colspan = "2" class = "loginBottom1">
			<input id="mysubmit" type="submit" value="Submit" name = "sub" />
			</td>
		</tr>

		<tr>
			<td colspan = "2" class = "loginBottom3">
				<span class = "errorMsg"><br />
				<?php
					if(!empty($_SESSION['MSG']))
							echo $_SESSION['MSG'];
					unset($_SESSION['MSG']);
				?>
				</span>
			</td>
		</tr>

	
</table>
</form>	
</div>
<?php require_once"footer.php";?>