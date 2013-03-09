<?php
	require_once"process_check_if_logged_in.php";
	require_once"header.php";
	require_once"sql_connect.php";
	$type_array=mysql_query("SELECT * FROM type;");
	$type=array();
	while($type_info=mysql_fetch_array($type_array)){
		$type[]=$type_info;
	}
?>
	<script>
		var hidden_td=document.getElementById('hidden_td1');
		var showed_td=document.getElementsById('showed_td1');
		hidden_td.style.display='none';
		
		function add_type(){
			hidden_td.style.display='block';
			hidden_td.style.display='none';
		}
	</script>
	<div class="log3">
	<table class = "loginBottom"> 
	<form name = "add" method = "POST" action = "process_add_service.php" enctype="multipart/form-data">
		
		<tr>
			<div class = "signup">
				Add Service
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
			<td class = "loginBottom1">Service Name: </td> 
			<td><input class = "form" type="text" name="service_name" value="" size="35"   required="required" onchange = "toUpper(this)" pattern= "[a-zA-Z0-9 ]*[a-zA-Z0-9 ]*[a-zA-Z0-9 ]"/></td>
		</tr>
		<tr>
			<td class = "loginBottom1">Rate:</td>
			<td><input class = "form"type="text" name="rate" value="" size="35" required="required" pattern = "[0-9]*[0-9]*[0-9]"/></td>
		</tr>
		<!--tr>
			<td class = "loginBottom1">Type:</td>
			<td><input class = "form" type="text" name="type" value="" size="35"   required="required" onchange = "toUpper(this)" pattern= "[a-zA-Z0-9 ]*[a-zA-Z0-9 ]*[a-zA-Z0-9 ]"/>
			</td>
		</tr-->
		
		<tr id='stage'>
			<td class = "loginBottom1" id='showed_td1'>Type:</td>
			<td id='showed_td2'>
				<select name="type">
					<?php
						for ($i=0;$i<count($type);$i++){
							echo "<option value='{$type[$i]['type_id']}'>
							{$type[$i]['type_name']}</option>";
						}
					?>
				</select>
			</td>
			<td class = 'loginBottom1' id='hidden_td1'>Type:</td>
			<td id ='hidden_td2'>
				<table>
				<tr>
					<td class = 'loginBottom1'>Type Name</td>
					<td><input class = 'form' type='text' name='new_type' value='' size='35'   onchange = 'toUpper(this)' pattern='[a-zA-Z0-9 ]*[a-zA-Z0-9 ]*[a-zA-Z0-9 ]'/></td>
				</tr>
				<tr>
					<td class = 'loginBottom1'>Image</td>
					<td><input class = 'form' type='file' name='item_img' value=''   /></td>
				</tr>
				<tr>
					<td class = 'loginBottom1'>Classification</td>
					<td><input class = 'form' type='text' name='classification' value=''   /></td>
				</tr>
				</table>
			</td>

			<input type="button" onclick="add_type()" value="Add type" /></td>
		</tr>
		<!--tr>
			<td class = "loginBottom1">Classification:</td>
			<td>
				<select name="classification">
					<option value="ROOM">ROOM</option>
					<option value="FACILITY">FACILITY</option>
					<option value="SERVICE">SERVICE</option>
				</select>
			</td>
		</tr-->
		<tr>
			<td class = "loginBottom1">Article:</td>
			<td><textarea rows="4" cols="25" name="article" value=""  required="required"></textarea>
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
<?php
	require_once("footer.php");
	require_once("sql_disconnect.php");
?>