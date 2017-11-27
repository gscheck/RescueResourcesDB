<?php
	#$servername = "localhost";
	#$username = "root";
	#$password = "Admin2017!";

	// Create connection
	$conn = mysqli_connect("127.0.0.1", "dbRead", "db_read", "animal_rescue_resources");

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
   
   // Retrieve data from Query String
   $fQuery = $_GET['fQuery'];

   if($fQuery != "")
   {
	   $queryParts = explode(",", $fQuery);
	   $zipCode = $queryParts[0];
	   $size = $queryParts[1];
	   $type = $queryParts[2];
	   $postQuery = "";

	   if($zipCode != "")
		   //build query
		   $sql = "SELECT *
				FROM transport t
				JOIN volunteer v ON t.volunteer_id = v.volunteer_id
				JOIN address a ON v.address_id = a.address_id
				WHERE v.volunteer_id IN (SELECT volunteer_id FROM perform WHERE activities_id = (SELECT activities_id FROM activities WHERE activities_name = 'transport'))
				AND v.address_id IN (SELECT address_id FROM address WHERE zipcode = '$zipCode');";
		else
			$sql = "SELECT *
				FROM transport t
				JOIN volunteer v ON t.volunteer_id = v.volunteer_id
				JOIN address a ON v.address_id = a.address_id
				WHERE v.volunteer_id IN (SELECT volunteer_id FROM perform WHERE activities_id = (SELECT activities_id FROM activities WHERE activities_name = 'transport'));";
   
   }
   else{  
	   	   $sql = "SELECT *
				FROM transport t
				JOIN volunteer v ON t.volunteer_id = v.volunteer_id
				WHERE v.volunteer_id IN (SELECT volunteer_id FROM perform WHERE activities_id = (SELECT activities_id FROM activities WHERE activities_name = 'transport'));";
   }
   
   //Execute query
   $result = $conn->query($sql);;

	if($result)
	{	
	   //Build Result String
	   $display_string = "<table width = 800 style=\"margin-top:10px; margin-left:20px;\">";
	   $display_string .= "<tr>";
	   $display_string .= "<th align=\"left\">Name</th>";
	   $display_string .= "<th align=\"left\">phone</th>";
	   $display_string .= "<th align=\"left\">email</th>";
	   $display_string .= "</tr>";
	   
	   // Insert a new row in the table for each person returned
	   while($row = $row = $result->fetch_assoc()) {
		  $display_string .= "<tr>";
		  $display_string .= "<td>$row[first_name]</td>";
		  $display_string .= "<td>$row[phone]</td>";
		  $display_string .= "<td>$row[email]</td>";
		  $display_string .= "</tr>";
	   }
	   
	   $display_string .= "</table><br />";

	   echo $display_string;
	}
	else
	{
		echo "no data";
	}
?>


