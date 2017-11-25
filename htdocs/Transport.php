<html>
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
<body onload = "listAvailableTransports();">
      <script language = "javascript" type = "text/javascript">
         <!--
            //Browser Support Code
			
			function listAvailableTransports()
			{
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
                     var ajaxDisplay = document.getElementById('transportDivDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
		   
			   
			   ajaxRequest.open("GET", "getAvailableTransports.php", true);
               ajaxRequest.send(null); 
			}
			
			function listActivities(){
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
               var Activity = document.getElementById('activity').value;

               var queryString =  "?fQuery=" + zipCode + ";" + Activity;			   
			   
			   ajaxRequest.open("GET", "getActivities.php" + queryString, true);
               ajaxRequest.send(null); 
            }
			
            function addActivity(){	   
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
			   var activity = document.getElementById('activity').value;
			   
			   var volInfo = fName + "~" + lName + "," + activity;
			   var queryString =  "?volInfo=" + volInfo;

			   ajaxRequest.open("GET", "addActivity.php" + queryString, true);
			   ajaxRequest.send(null); 
            }
         //-->
      </script>
		
      <form name = 'activityForm'>
		 <center><h2>Transport</h2></center><br />
		 
		<table style="width:50%; margin:0 auto 0 auto;">
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
			<tr>
				<td><label for="vehicleType" align = 'right'>Vehicle Type:</label></td>
				<td><input type = 'text' id = 'vehicleType' /></td>
			</tr>
			<tr>
				<td><label for="vehicleSize" align = 'right'>Vehicle Size:</label></td>
			<td><input type = 'text' id = 'vehicleSize' /></td>
			<tr>
				<td><label for="maxDistance" align = 'right'>Max Distance (miles):</label></td>
				<td><input type = 'text' id = 'maxDistance' /></td>
			</tr>
			<tr>
				<td><label for="availability" align = 'right'>Availability:</label></td>
			<td><input type = 'text' id = 'availability' /></td>			
			
		</table><br />

      </form>
      
	  <div id = 'transportDiv'></div>
      <div id = 'ajaxDiv'>Your result will display here</div>
   </body>
</html>