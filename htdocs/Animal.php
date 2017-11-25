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
<body onload = "listAnimalTypes();">
      <script language = "javascript" type = "text/javascript">
         <!--
		 	function listAnimalTypes()
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
               
					
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('animalTypeDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
		   
			   
			   ajaxRequest.open("GET", "getAnimalTypes.php", true);
               ajaxRequest.send(null); 
			}
			
            //Browser Support Code
			function listAnimals(){
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
               
					
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('ajaxDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
               
               // Now get the value from user and pass it to
               // server script.
					
               var aType = document.getElementById('animalType').value;
			   aInfo =  "?aInfo=" + aType;
			   ajaxRequest.open("GET", "getAnimalInfo.php" + aInfo, true);
               ajaxRequest.send(null); 
            }
			
			function editAnimal(){
               var fName = document.getElementById('firstName').value;
               var lName = document.getElementById('lastName').value;
				
				var volInfo = fName + "~" + lName;
				volInfo =  "?volInfo=" + volInfo;
				window.location.href = "editVolunteer.php" + volInfo;
			}
			
			function deleteAnimal(){
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
					
				var Name = document.getElementById('name').value;
                var Age = document.getElementById('age').value;
				var Sex = document.getElementById('sex').value;
				
				var aInfo = Name + "," + Age + "," + Sex;
				aInfo =  "?aInfo=" + aInfo;

			   ajaxRequest.open("GET", "deleteAnimal.php" + aInfo, true);
               ajaxRequest.send(null);  
			}
			
            function addAnimal(){
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
					
               var Name = document.getElementById('name').value;
			   var anType = document.getElementById('animalType').value;
               var Sex = document.getElementById('sex').value;
			   var Age = document.getElementById('age').value;
               var Vet = document.getElementById('veterinarian').value;
               var Vol = document.getElementById('volunteer').value;
			   var Med = document.getElementById('medical').value;
			   var Qnt = document.getElementById('quarantine').value;
			   
               var animalInfo = Name + "," + Sex + "," + Age + "," + Vet + "," + Vol + "," + Med + "," + anType + "," + Qnt;
               var queryString =  "?animalInfo=" + animalInfo;

			   ajaxRequest.open("GET", "addAnimal.php" + queryString, true);
               ajaxRequest.send(null); 
            }
         //-->
      </script>
		
      <form name = 'adminForm'>
		 <center><h2>Animals</h2></center><br />
		<div> 
		<center><table style="width:40%; height:20%; margin:0 auto 0 auto;">
			
			<tr>
				<td><label for="name" align = 'right'>Name:</label></td>
				<td align = "right"><input type = 'name' id = 'name' /></td>
			</tr>
			<tr>
				<div id = 'animalTypeDiv'></div>
			</tr>
			<tr>
				<td><label for="sex" align = 'right'>Sex:</label></td>
				<td align = "right">
					<select name = 'sex' id = 'sex'>
						<option value = "F">F</option>
						<option value = "M">M</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="age" align = 'right'>Age:</label></td>
				<td align = "right"><input type = 'text' id = 'age' /></td>
			</tr>
			<tr>
				<td><label for="medical" align = 'right'>Medical Needs:</label></td>
				<td align = "right">
					<select name = 'medical' id = 'medical'>
						<option value = "No">No</option>
						<option value = "Yes">Yes</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="quarantine" align = 'right'>Transport Quarantine:</label></td>
				<td align = "right">
					<select name = 'quarantine' id = 'quarantine'>
						<option value = "No">No</option>
						<option value = "Yes">Yes</option>
					</select>
				</td>
			</tr>
		</table></div><br />
	
		<center>
		<input type = 'button' onclick = 'addAnimal()' value = 'Add'  style="margin-top:10px; margin-left:20px;"/>	
        <input type = 'button' onclick = 'listAnimals()' value = 'List'/>
		<input type = 'button' onclick = 'deleteAnimal()' value = 'Delete'/>
		</center>	
      </form>
      
      <div id = 'ajaxDiv'>Your result will display here</div>
   </body>
