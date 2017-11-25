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
   $aInfo = $_GET['aInfo'];

   if($aInfo != "")
   {
	   
	   $volInfo = mysqli_real_escape_string($conn, $aInfo);
	   $elements = explode(",",$aInfo);
	  
	   $Name = $elements[0];
	   $Age = $elements[1];
	   $Sex = $elements[2];
	   
	   
	   $sql = "UPDATE animal 
		SET 
			void = true
		WHERE 
			name = '$Name' AND age = '$Age' AND sex = '$Sex';";
	   
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


