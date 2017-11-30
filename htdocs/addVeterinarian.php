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
	   
	   if(strlen($zipCode) == 5)
	   {
	   
		   if(strlen($state) == 2)
		   {
	   
			   //build query
			   
			   $sql = "SELECT address_id FROM address WHERE phone = '$phone' AND state = '$state' AND zipcode = '$zipCode';";
			   
			   $result = $conn->query($sql);
			   
			   $notFound = true;
			   
			   if($result)
			   {
				   $row = $result->fetch_assoc();
				   $address_id = $row["address_id"];
				   if($address_id != '')
					   $notFound = false;
			   }
			   
			   if($notFound)
			   {
				   $sql = "INSERT INTO address (address_line_1, phone, state, zipCode) VALUES ('$address', '$phone', '$state', $zipCode);";
				   $result = $conn->query($sql);
			   }
			   
			   $sql = "SELECT * FROM veterinarian WHERE first_name = '$fName' AND last_name = '$lName' AND void is NULL;";
			
			   $result = $conn->query($sql);
			   
			   $notFound = true;
			   
			   if($result)
			   {
				   $row = $result->fetch_assoc();
				   $fsName = $row["first_name"];
				   if($fsName != '')
					  $notFound = false;
				  
				   if($notFound == false)
				   {   
						echo "Veterinarian exists.";
				   }
			   }
			   
			   if($notFound == true)
			   {
				   $sql = "SELECT address_id FROM address WHERE phone = '$phone' AND state = '$state' AND zipcode = $zipCode;";
				   $result = $conn->query($sql);
				   $row = $result->fetch_assoc();
				   $address_id = $row["address_id"];
				   
				   $sql = "INSERT INTO veterinarian (address_id, first_name, last_name, email) VALUES ('$address_id', '$fName', '$lName', '$email');";
				   
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
			   }
			  
		   }
		   else{
				echo "State can only be two characters.";
		   }
	   }
	   else{
			echo "Zip code should be five characters.";
	   }
	   mysqli_close($conn);
   }
 
   //Execute query
   

?>


