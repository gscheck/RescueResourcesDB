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
	
   
	$sql = "SELECT CONCAT(first_name, ' ', last_name) name 
				FROM volunteer 
			WHERE volunteer_id IN (SELECT volunteer_id FROM perform WHERE activities_id = (SELECT activities_id FROM activities WHERE activities_name = 'transport' ) AND void is NULL);";
   
   //Execute query
   $result = $conn->query($sql);

	if($result)
	{	
	   // Insert a new row in the table for each person returned
	   ?>
	   	<table style="width:40%; margin:0 auto 0 auto;">
			<tr>
				<td><label for="transportVol" align = 'right'>Volunteer:</label></td>
				<td><select name="transportVol" id = "transportVol">
				   <?php
				   while($row = $result->fetch_assoc()) {
					   ?>
					  <option value="<?=$row["name"];?>"><?=$row["name"];?></option>
					  <?php
				   }
				   ?>
				  </select>
				</td>
			</tr>
	   </table>

	   <?php
	}
	else
	{
		echo "no data";
	}
	
		$sql = "SELECT species, size FROM animal_type";
   
   //Execute query
   $result = $conn->query($sql);

	if($result)
	{	
	   // Insert a new row in the table for each person returned
	   ?>
	   <table style="width:40%; margin:0 auto 0 auto;">
	   <tr>
	   <td><label for="animalType" align = 'right'>Animal Type:</label></td>
		<td><select name="animalType" id = "animalType">
		   <?php
		   while($row = $result->fetch_assoc()) {
			   ?>
			  <option value="<?=$row["size"]." ".$row["species"];?>"><?=$row["size"]." ".$row["species"];?></option>
			  <?php
		   }
		   ?>
		</select></td>
	</tr>
	</table>
	   <?php
	}
	else
	{
		echo "no data";
	}
?>


