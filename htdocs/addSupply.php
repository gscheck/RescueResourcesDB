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
	   
	   $description = $elements[1]; 
	   
	   //build query
	   $sql = "INSERT INTO supplies (volunteer_id, description, storage_available__num) VALUES ((SELECT volunteer_id FROM volunteer WHERE first_name = '$fName' AND last_name = '$lName'),'$description', 1);";

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


