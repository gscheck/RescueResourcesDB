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
   $fullName = $_GET['fName'];

   //$lName = $_GET['lName'];
   if($fullName != "")
   {
	   $nameParts = explode(" ",$fullName);
	   $fName = $nameParts[0];
	   $lName = $nameParts[1];
	   
	   // Escape User Input to help prevent SQL Injection
	   //$fName = mysql_real_escape_string($fName);
	   //$lName = mysql_real_escape_string($lName);
	   
	   //build query
	   $sql = "SELECT CONCAT(first_name, ' ', last_name) as name, phone, email FROM volunteer WHERE first_name = '".$fName."' AND last_name = '".$lName."'";
   }
   else{
	   $sql = "SELECT CONCAT(first_name, ' ', last_name) as name, phone, email FROM volunteer";
   }
   //Execute query
   $result = $conn->query($sql);;

	if($result)
	{	
	   //Build Result String
	   $display_string = "<table>";
	   $display_string .= "<tr>";
	   $display_string .= "<th align=\"left\">sel</th>";
	   $display_string .= "<th align=\"left\">name</th>";
	   $display_string .= "<th align=\"left\">phone</th>";
	   $display_string .= "<th align=\"left\">email</th>";
	   $display_string .= "</tr>";
	   
	   // Insert a new row in the table for each person returned
	   while($row = $row = $result->fetch_assoc()) {
		  $display_string .= "<tr>";
		  $display_string .= "<td><input type=\"checkbox\" name=\"volSel\" value=\"checked\" /></td>";
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


