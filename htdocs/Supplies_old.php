<form name = 'adminForm' id='adminForm'>
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
	
?>

	<label for="volunteer">volunteer:  </label><select name="volunteers" id = "volunteers" onChange="myFunction()"><br>

<?php
	$sql = "SELECT first_name, last_name FROM volunteer";
	$result = $conn->query($sql);
	if($result)
	{	
		while ($row = $result->fetch_assoc()) {
			?>
	
			<option value="<?=$row["first_name"]." ".$row["last_name"];?>"><?=$row["first_name"]." ".$row["last_name"];?></option>
			<?php
		}
	}
?>
	</select>
		<P>Email: <input type="text" value="email"><br></P>

		
	<label for="supplies">supplies:  </label><select name="resource_types">
	
<?php
	$sql = "SELECT supplies_id, name FROM supplies";
	$result = $conn->query($sql);
	if($result)
	{	
		while ($row = $result->fetch_assoc()) {
			?>

			<option value="<?=$row["name"];?>"><?=$row["name"];?></option>
			<?php
		}
	}
?>

</select> 
		
	<script>
	function myFunction() {
		var e = document.getElementById("volunteers");
		var strVol = e.options[e.selectedIndex].value;

		document.forms["adminForm"].submit();
	}
	</script>

<?php
	if( isset($_POST['adminForm']) )
	{

		$vName = $_GET['volunteers'];
		$nameArr = explode(" ", $vName);
		$fName= $nameArr[0];
		$lName = $nameArr[1];

		//echo "Selected volunteer : ".$_GET['volunteers']."<br>";

		$sql = "SELECT phone, email FROM volunteer WHERE first_name = '".$fName."' AND last_name = '".$lName."'" ;
		//echo $sql;
		$result = $conn->query($sql);
		if($result)
		{	
			$row = $result->fetch_assoc();
			
			echo "<label for=\"phone\">phone:  </label><input name=\"phone\" type=\"text\" size=\"15\" value=\"" . $row["phone"]. "\">";
			
		}
	}
?>
	
<?php
	mysqli_close($conn);
?> 


