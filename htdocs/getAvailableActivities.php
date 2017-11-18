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
	
   
	$sql = "SELECT name FROM activities_type_lookup";
   
   //Execute query
   $result = $conn->query($sql);

	if($result)
	{	
	   // Insert a new row in the table for each person returned
	   ?>
	   		<table width = 250 style="margin-top:10px; margin-left:20px;">
			<tr>
				<td><label for="activity" align = 'right'>Activity:</label></td>
	   <td><select name="activity" id = "activity">
	   <option value="All">All</option>
	   <?php
	   while($row = $result->fetch_assoc()) {
		   ?>
		  <option value="<?=$row["name"];?>"><?=$row["name"];?></option>
		  <?php
	   }
	   ?>
	   </select></td>
	   </tr>
	   </table>
	   	<input type = 'button' onclick = 'addActivity()' value = 'Add'  style="margin-top:10px; margin-left:20px;"/>	
        <input type = 'button' onclick = 'listActivities()' value = 'List'/>
	   <?php
	}
	else
	{
		echo "no data";
	}
?>


