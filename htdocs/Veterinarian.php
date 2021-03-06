<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="background2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 
<?php
include_once('navbar.php');
?>
<body>
      <script language = "javascript" type = "text/javascript">
         <!--
            //Browser Support Code
			function listVeterinarians(){
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
               
               // Now get the value from user and pass it to
               // server script.
					
               var fName = document.getElementById('firstName').value;
               var lName = document.getElementById('lastName').value;
               var fullName = fName + " " + lName;
			   var zipCode = document.getElementById('zipCode').value;
               var queryString =  "?fQuery=" + fullName + ";" + zipCode;

			   ajaxRequest.open("GET", "getVetInfo.php" + queryString, true);
               ajaxRequest.send(null); 
            }
			
			function editVeterinarian(){
               var fName = document.getElementById('firstName').value;
               var lName = document.getElementById('lastName').value;
				
				var vetInfo = fName + "~" + lName;
				vetInfo =  "?volInfo=" + vetInfo;
				window.location.href = "editVeterinarian.php" + vetInfo;
			}
		
			function deleteVeterinarian(){
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
               
               // Now get the value from user and pass it to
               // server script.
					
				var fName = document.getElementById('firstName').value;
                var lName = document.getElementById('lastName').value;
				
				var volInfo = fName + "~" + lName;
				volInfo =  "?volInfo=" + volInfo;

			   ajaxRequest.open("GET", "deleteVeterinarian.php" + volInfo, true);
               ajaxRequest.send(null);  
			}
		
            function addVeterinarian(){
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
               
               // Now get the value from user and pass it to
               // server script.
					
               var fName = document.getElementById('firstName').value;
               var lName = document.getElementById('lastName').value;
			   var phoneNum = document.getElementById('phoneNum').value;
               var emailAddr = document.getElementById('emailAddr').value;
			   var address = document.getElementById('address').value;
			   var state = document.getElementById('state').value;
               var zipCode = document.getElementById('zipCode').value;
			   
               var volInfo = fName + "~" + lName + "," + phoneNum + "," + emailAddr + "," + address + "," + state + "," + zipCode;
               var queryString =  "?volInfo=" + volInfo;

			   ajaxRequest.open("GET", "addVeterinarian.php" + queryString, true);
               ajaxRequest.send(null); 
            }
         //-->
      </script>
		
      <form name = 'adminForm'>
		 <center><h2>Veterinarians</h2></center><br />
		 
		<table style="width:50%; height:50%; margin:0 auto 0 auto;">
			<tr>
				<td><label for="firstName" align = 'right'>First Name:</label></td>
				<td><input type = 'text' id = 'firstName' /></td>
			</tr>
			<tr>
				<td><label for="lastName" align = 'right'>Last Name:</label></td>
				<td><input type = 'text' id = 'lastName' /></td>
			</tr>
			<tr>
				<td><label for="emailAddr" align = 'right'>Email:</label></td>
				<td><input type = 'text' id = 'emailAddr' /></td>
			</tr>
			<tr>
				<td><label for="phoneNum" align = 'right'>Phone:</label></td>
				<td><input type = 'text' id = 'phoneNum' /></td>
			</tr>
			<tr>
				<td><label for="address" align = 'right'>Address:</label></td>
				<td><input type = 'text' id = 'address' /></td>
			</tr>
			<tr>
				<td><label for="state" align = 'right'>State:</label></td>
				<td><input type = 'text' id = 'state' /></td>
			</tr>
			<tr>
				<td><label for="zipCode" align = 'right'>Zip Code:</label></td>
				<td><input type = 'text' id = 'zipCode' /></td>
			</tr>
		</table><br />
	
		<center>
		<input type = 'button' onclick = 'addVeterinarian()' value = 'Add'  style="margin-top:10px; margin-left:20px;"/>	
        <input type = 'button' onclick = 'listVeterinarians()' value = 'List'/>
		<input type = 'button' onclick = 'editVeterinarian()' value = 'Edit'/>	
		<input type = 'button' onclick = 'deleteVeterinarian()' value = 'Delete'/>
		</center>
      </form>
      
      <div id = 'ajaxDiv'>Your result will display here</div>
   </body>
