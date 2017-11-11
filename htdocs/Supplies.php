<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
			function listSupplies(){
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
					
               var zipCode = document.getElementById('zipCode').value;

               var queryString =  "?fZipCode=" + zipCode;

			   ajaxRequest.open("GET", "getSupplies.php" + queryString, true);
               ajaxRequest.send(null); 
            }
			
            function addSupply(){
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
			   var state = document.getElementById('state').value;
               var zipCode = document.getElementById('zipCode').value;
			   
               var volInfo = fName + " " + lName + "," + phoneNum + "," + emailAddr + "," + state + "," + zipCode;
               var queryString =  "?volInfo=" + volInfo;

               //ajaxRequest.open("GET", "getVolunteerInfo.php" + queryString, true);
			   ajaxRequest.open("GET", "addSupply.php" + queryString, true);
               ajaxRequest.send(null); 
            }
         //-->
      </script>
		
      <form name = 'supplyForm'>
		 <h2>Supplies</h2><br />
		 
		<table>
			<tr>
				<td><label for="firstName" align = 'right'>First Name:</label></td>
				<td><input type = 'text' id = 'firstName' /></td>
			</tr>
			<tr>
				<td><label for="lastName" align = 'right'>Last Name:</label></td>
				<td><input type = 'text' id = 'lastName' /></td>
			</tr>
			<tr>
				<td><label for="zipCode" align = 'right'>Zip Code:</label></td>
			<td><input type = 'text' id = 'zipCode' /></td>
			</tr>
			<tr>
				<td><label for="description" align = 'right'>Description:</label></td>
				<td><input type = 'text' id = 'description' /></td>
			</tr>
		</table><br />
	
 
		<input type = 'button' onclick = 'addSupply()' value = 'Add'/>	
        <input type = 'button' onclick = 'listSupplies()' value = 'List'/>
			
      </form>
      
      <div id = 'ajaxDiv'>Your result will display here</div>
   </body>
</html>