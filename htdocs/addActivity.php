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
	   $sql = "INSERT INTO perform (volunteer_id, activities_id) VALUES ((SELECT volunteer_id FROM volunteer WHERE first_name = '$fName' AND last_name = '$lName'),(SELECT activities_id FROM activities WHERE activities_name = '$description'));";
   
	   $result = $conn->query($sql);
	   echo mysqli_error($conn);
	   if($result)
		{
			echo "Success!";
		}
		else
		{
			die(mysqli_error($conn));
		}
	   mysqli_close($conn);
   }
 
   //Execute query
   

?>


