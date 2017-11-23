<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="background2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 
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
   $volInfo = $_GET['volInfo'];
 
   if($volInfo != "")
   {
	   $nameParts = explode("~", $volInfo);
	   $fName = $nameParts[0];
	   $lName = $nameParts[1];
	   $postQuery = "";
	   if($fName != "")
	      $postQuery .=  "WHERE first_name = '".$fName."' AND last_name = '".$lName."' ";
	   
	   $postQuery .= ";";
	   
	   
	   //build query
	   $sql = "SELECT CONCAT(first_name, ' ', last_name) as name, phone, address_line_1, zipCode, email, state FROM veterinarian v INNER JOIN address addr ON addr.address_id = v.address_id ".$postQuery;

		//Execute query
		$result = $conn->query($sql);
		if($result)
		{
		  $row = $result->fetch_assoc();
		  $Email = $row['email'];
		  $Phone = $row['phone'];
		  $Address = $row['address_line_1'];
		  $ZipCode = $row['zipCode'];
		  $State = $row['state'];
		}
	   }
?>

<body>
 
     <script language = "javascript" type = "text/javascript">	
			function submitChanges(){
							   var ajaxRequest;  // The variable that makes Ajax possible!
               
               try {
                  // Opera 8.0+, Firefox, Safari
                  ajaxRequest = new XMLHttpRequest();
               }catch (e) {
                  // Internet Explorer Browsers
                  try {
                     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  }catch (e) {
                     try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                     }
                  }
               }
               
               // Create a function that will receive data 
               // sent from the server and will update
               // div section in the same page.
					
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('ajaxDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
			   
               var fName = document.getElementById('firstName').value;
               var lName = document.getElementById('lastName').value;
			   var phoneNum = document.getElementById('phoneNum').value;
               var emailAddr = document.getElementById('emailAddr').value;
			   var address = document.getElementById('address').value;
			   var state = document.getElementById('state').value;
               var zipCode = document.getElementById('zipCode').value;
			   
               var volInfo = fName + "~" + lName + "," + phoneNum + "," + emailAddr + "," + address + "," + state + "," + zipCode;
               var queryString =  "?volInfo=" + volInfo;
				volInfo =  "?volInfo=" + volInfo;
	
			   ajaxRequest.open("GET", "submitVetChanges.php" + volInfo, true);
               ajaxRequest.send(null); 
			}
     </script>			
      <form name = 'adminForm'>
		 <h2>Edit Volunteer Information</h2><br />
		 
		<table style="margin-top:10px; margin-left:20px;">
			<tr>
				<td><label for="firstName" align = 'right'>First Name:</label></td>
				<td><input type = 'text' id = 'firstName' value = "<?=$fName;?>"/></td>
			</tr>
			<tr>
				<td><label for="lastName" align = 'right'>Last Name:</label></td>
				<td><input type = 'text' id = 'lastName' value = "<?=$lName;?>"/></td>
			</tr>
			<tr>
				<td><label for="emailAddr" align = 'right'>Email:</label></td>
				<td><input type = 'text' id = 'emailAddr'  value = "<?=$Email;?>"/></td>
			</tr>
			<tr>
				<td><label for="phoneNum" align = 'right'>Phone:</label></td>
				<td><input type = 'text' id = 'phoneNum'  value = "<?=$Phone;?>"/></td>
			</tr>
			<tr>
				<td><label for="address" align = 'right'>Address:</label></td>
				<td><input type = 'text' id = 'address'  value = "<?=$Address;?>"/></td>
			</tr>
			<tr>
				<td><label for="state" align = 'right'>State:</label></td>
				<td><input type = 'text' id = 'state'  value = "<?=$State;?>"/></td>
			</tr>
			<tr>
				<td><label for="zipCode" align = 'right'>Zip Code:</label></td>
				<td><input type = 'text' id = 'zipCode'  value = "<?=$ZipCode;?>"/></td>
			</tr>
		</table><br />
	
 
		<input type = 'button' onclick = 'submitChanges()' value = 'Submit'  style="margin-top:10px; margin-left:20px;"/>	
 
			
      </form>
      <div id = 'ajaxDiv'>Your result will display here</div>

   </body>
