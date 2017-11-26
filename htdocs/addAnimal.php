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
   $animalInfo = $_GET['animalInfo'];

   if($animalInfo != "")
   {
	   $animalInfo = mysqli_real_escape_string($conn, $animalInfo);
	   
	   $elements = explode(",",$animalInfo);
	   $Name = $elements[0];
	   $Sex = $elements[1];
	   $Age = $elements[2];  
	   $Vet = $elements[3];
	   $Vol = $elements[4];
	   $Med = $elements[5]; 
	   $AnType = $elements[6]; 
	   $Qnt = $elements[7]; 
	   
	   $sql = "SELECT animal_type_id FROM animal_type WHERE CONCAT(size, ' ', species) = '$AnType';";
	   
	   $result = $conn->query($sql);
	   
	   if($result)
	   {
		   $row = $result->fetch_assoc();
		   $typeID = $row["animal_type_id"];
	   }
	   
	   $sql = "SELECT veterinarian_id FROM veterinarian WHERE CONCAT(first_name, ' ', last_name) = '$Vet';";
	   
	   $result = $conn->query($sql);
	   
	   $vetNotFound = true;
	   
	   if($result)
	   {
		   $row = $result->fetch_assoc();
		   $vetID = $row["veterinarian_id"];
		   if($vetID != '')
			   $vetNotFound = false;
	   }
	   
	   $sql = "SELECT volunteer_id FROM volunteer WHERE CONCAT(first_name, ' ', last_name) = '$Vol';";
	   $result = $conn->query($sql);

	   
	   $volNotFound = true;
	   
	   if($result)
	   {
		   $row = $result->fetch_assoc();
		   $volID = $row["volunteer_id"];
		   if($volID != '')
			   $volNotFound = false;
		   else
			   echo("volunteer not found");
	   }
	   
		$sql = "INSERT INTO animal (name, sex, age, animal_type_id, volunteer_id, veterinarian_id, medical_needs, transport_quarantine, litters) VALUES ('$Name', '$Sex', '$Age', $typeID, $volID, $vetID, '$Med', '$Qnt', 0);";

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


