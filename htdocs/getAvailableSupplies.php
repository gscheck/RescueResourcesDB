<?php
	$servername = "localhost";
	$username = "root";
	$password = "Admin2017!";

	// Create connection
	$conn = mysqli_connect("127.0.0.1", "dbRead", "db_read", "animal_rescue_resources");

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
   
	$sql = "SELECT DISTINCT name FROM supplies_type_lookup";
   
   //Execute query
   $result = $conn->query($sql);

	if($result)
	{	
	   // Insert a new row in the table for each person returned
	   ?>
	   		<table style="width:50%; margin:0 auto 0 auto;">
			<tr>
				<td><label for="supply" align = 'right'>Supplies:</label></td>
	   <td><select name="supply" id = "supply">
	   <option value="All">All</option>
	   <?php
	   while($row = $row = $result->fetch_assoc()) {
		   ?>
		  <option value="<?=$row["name"];?>"><?=$row["name"];?></option>
		  <?php
	   }
	   ?>
	   </select></td>
	   </tr>
	   </table>
	   <center>
	   	<input type = 'button' onclick = 'addSupply()' value = 'Add'  style="margin-top:10px; margin-left:20px;"/>	
        <input type = 'button' onclick = 'listSupplies()' value = 'List'/>
		<input type = 'button' onclick = 'deleteSupplies()' value = 'Delete'/>
		</center>
	   <?php
	}
	else
	{
		echo "no data";
	}
?>


