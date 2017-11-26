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
	   
	   $elements = explode(",",$volInfo);
	   $VolName = $elements[0];
	   $vType = $elements[1];
	   $vSize = $elements[2];  
	   $maxDist = $elements[3];
	   $avail = $elements[4];
	   $AnType = $elements[5];
	   
	   
	   $sql = "SELECT volunteer_id FROM volunteer WHERE CONCAT(first_name, ' ', last_name) = '$VolName';";
	   $result = $conn->query($sql);

	   if($result)
	   {
		   $row = $result->fetch_assoc();
		   $volID = $row["volunteer_id"];
	   }
	   $sql = "SELECT animal_type_id FROM animal_type WHERE CONCAT(size, ' ', species) = '$AnType';";
	   
	   $result = $conn->query($sql);
	   
	   if($result)
	   {
		   $row = $result->fetch_assoc();
		   $typeID = $row["animal_type_id"];
	   }
	   
	   $sql = "INSERT INTO transport (volunteer_id, animal_type_id, distance_miles, vehicle_type, vehicle_size) VALUES (".$volID.", ".$typeID.", '".$maxDist."', '".$vType."', '".$vSize."');";

	   
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


