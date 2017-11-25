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
   $aType = $_GET['aInfo'];
   $fName = "";

   if($aType != "")
   {
	   //build query
	   $sql = "SELECT name, sex, age, transport_quarantine, medical_needs FROM animal WHERE  (void is null || void = false) AND animal_type_id = (SELECT animal_type_id FROM animal_type WHERE CONCAT(size, ' ', species) = '$aType' );";
   }
   else{
	   $sql = "SELECT * FROM animal WHERE void is null || void = false;";
   }
   
   //Execute query
   $result = $conn->query($sql);

	if($result)
	{	
	   //Build Result String
	   $display_string = "<table name = \"volunteerTable\" width = 800 style=\"margin-top:10px; margin-left:20px;\">";
	   $display_string .= "<tr>";
	   $display_string .= "<th align=\"left\">name</th>";
	   $display_string .= "<th align=\"left\">type</th>";
	   $display_string .= "<th align=\"left\">sex</th>";
	   $display_string .= "<th align=\"left\">age</th>";
	   $display_string .= "<th align=\"left\">quaranteen</th>";
	   $display_string .= "<th align=\"left\">medical needs</th>";	   
		   
	   $display_string .= "</tr>";
	   
	   // Insert a new row in the table for each person returned
	   while($row = $row = $result->fetch_assoc()) {
		  $display_string .= "<tr>";
		  $display_string .= "<td>$row[name]</td>";
		  $display_string .= "<td>$aType</td>";
		  $display_string .= "<td>$row[sex]</td>";
		  $display_string .= "<td>$row[age]</td>";
		  $display_string .= "<td>$row[transport_quarantine]</td>";
		  $display_string .= "<td>$row[medical_needs]</td>";		  
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


