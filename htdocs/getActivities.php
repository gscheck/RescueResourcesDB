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
	
   
   // Retrieve data from Query String
   $fQuery = $_GET['fQuery'];
echo $fQuery;
   if($fQuery != "")
   {
	   $queryParts = explode(";", $fQuery);
	   $zipCode = $queryParts[0];
	   $activity = $queryParts[1];
	   $postQuery = "";
	   
	   if($zipCode != "")
			$postQuery = "AND a.zipcode = '".$zipCode."' ";
		
	   if($activity != "" && $activity != "All")
			$postQuery .= "AND s.name = '".$activity."'";
	   
	   $postQuery .= ";";

	   //build query
	   $sql = "SELECT s.name as description, CONCAT(first_name, ' ', last_name) as name, email, phone FROM perform p, activities s, volunteer v, address a WHERE p.volunteer_id = v.volunteer_id AND v.address_id = a.address_id AND p.activities_id = s.activities_id ".$postQuery;
   }
   else{  
	   $sql = "SELECT s.name as description, CONCAT(first_name, ' ', last_name) as name, email, phone FROM perform p, activities s, volunteer v, address a WHERE p.volunteer_id = v.volunteer_id AND p.activities_id = s.activities_id AND v.address_id = a.address_id;";
   }
   
   //Execute query
   $result = $conn->query($sql);;

	if($result)
	{	
	   //Build Result String
	   $display_string = "<table width = 800 style=\"margin-top:10px; margin-left:20px;\">";
	   $display_string .= "<tr>";
	   $display_string .= "<th align=\"left\">activity</th>";
	   $display_string .= "<th align=\"left\">contact</th>";
	   $display_string .= "<th align=\"left\">phone</th>";
	   $display_string .= "<th align=\"left\">email</th>";
	   $display_string .= "</tr>";
	   
	   // Insert a new row in the table for each person returned
	   while($row = $row = $result->fetch_assoc()) {
		  $display_string .= "<tr>";
		  $display_string .= "<td>$row[description]</td>";
		  $display_string .= "<td>$row[name]</td>";
		  $display_string .= "<td>$row[phone]</td>";
		  $display_string .= "<td>$row[email]</td>";
		  $display_string .= "</tr>";
	   }
	   
	   $display_string .= "</table><br />";
	   $display_string .= "<input type = \"button\" onclick = \"editVolunteers()\" value = \"Edit\"/>";
	   echo $display_string;
	}
	else
	{
		echo "no data";
	}
?>


