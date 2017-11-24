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
   $fName = "";

   if($fQuery != "")
   {
	   $queryParts = explode(";", $fQuery);
	   $fullName = $queryParts[0];
	   $nameParts = explode(" ", $fullName);
	   $fName = $nameParts[0];
	   $lName = $nameParts[1];
	   $zipCode = $queryParts[1];
	   $postQuery = "";
	   
	   $postQuery .=  "WHERE (void IS NULL || void != true) ";
	   
	   if($fName != "")
	      $postQuery .=  "AND first_name = '".$fName."' AND last_name = '".$lName."' ";
	   
	   if($zipCode != "")
		  $postQuery .= "AND zipcode = '".$zipCode."' ";
	   
	   $postQuery .= ";";
	   
	   
	   //build query
	   $sql = "SELECT CONCAT(first_name, ' ', last_name) as name, email, phone FROM veterinarian v INNER JOIN address addr ON addr.address_id = v.address_id ".$postQuery;
   }
   else{
	   $sql = "SELECT CONCAT(first_name, ' ', last_name) as name, email, phone FROM veterinarian v INNER JOIN address addr ON addr.address_id = v.address_id";
   }
   
   //Execute query
   $result = $conn->query($sql);

	if($result)
	{	
	   //Build Result String
	   $display_string = "<table width = 800 style=\"margin-top:10px; margin-left:20px;\">";
	   $display_string .= "<tr>";
	   $display_string .= "<th align=\"left\">name</th>";
	   $display_string .= "<th align=\"left\">phone</th>";
	   $display_string .= "<th align=\"left\">email</th>";
	   $display_string .= "</tr>";
	   
	   // Insert a new row in the table for each person returned
	   while($row = $row = $result->fetch_assoc()) {
		  $display_string .= "<tr>";
		  $display_string .= "<td>$row[name]</td>";
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


