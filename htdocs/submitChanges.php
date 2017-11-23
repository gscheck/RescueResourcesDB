<?php
	$servername = "localhost";
	$username = "dbWrite";
	$password = "Admin2017!";

	// Create connection
	$conn = mysqli_connect("127.0.0.1", $username, $password, "animal_rescue_resources");

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	
   
   // Retrieve data from Query String
   $volInfo = $_GET['volInfo'];

   if($volInfo != "")
   {
	   
	   $volInfo = mysqli_real_escape_string($conn, $volInfo);
	   $nameParts = explode("~",$volInfo);
	   $fName = $nameParts[0];
	   
	   $elements = explode(",",$nameParts[1]);
	   $lName = $elements[0];
	   
	   $phone = $elements[1];
	   $email = $elements[2];  
	   $address = $elements[3];
	   $state = $elements[4];
	   $zipCode = $elements[5]; 
	   
	   // Escape User Input to help prevent SQL Injection
	   //$fName = mysql_real_escape_string($fName);
	   //$lName = mysql_real_escape_string($lName);
	   
	   //build query
	   
	   $sql = "UPDATE address 
		SET 
			phone = '$phone', 
			address_line_1 = '$address',			
			state = '$state',
			zipcode = '$zipCode'
		WHERE 
			address_id = (SELECT address_id FROM volunteer WHERE first_name = '$fName' AND last_name = '$lName')";
	   
	   $result = $conn->query($sql);
	   
	   	$sql = "UPDATE volunteer 
		SET 
			email = '$email'
		WHERE 
			first_name = '$fName' AND last_name = '$lName'";
	   
	   $result = $conn->query($sql);
	   
	   
	   echo mysqli_error($conn);
	   if($result)
		{
			echo "Success!";
		}
		else
		{
			die(mysqli_error($conn));    // Thanks to Pekka for pointing this out.
		}
	   mysqli_close($conn);
   }
 
   //Execute query
   

?>


