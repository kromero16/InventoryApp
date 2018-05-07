<!DOCTYPE html>
<html>
<head>
	<title>PC Inventory</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Input your information</h2>
	<form method="post">
		<h3>Location</h3>
		<label for="state">State</label>
		<input type="text" name="state" id="state"><br>
		<label for="Office">Office</label>
		<input type="text" name="office" id="office"><br>
		<label for="id">Label ID</label>
		<input type="text" name="id" id="id"><br>
		<label for="first_name">First Name</label>
		<input type="text" name="first_name" id="first_name"><br>
		<label for="last_name">Last Name</label>
		<input type="text" name="last_name" id="last_name"><br>
		<label for="pcname">PC Name</label>
		<input type="text" name="pcname" id="pcname"><br>
		<label for="isencrypted">Encrypted?</label>
		<input type="text" name="isencrypted" id="isencrypted"><br>
		<label for="os">Operating System</label>
		<input type="text" name="os" id="os"><br>
		<label for="av">Antivirus</label>
		<input type="text" name="av" id="av"><br>
		<label for="ip">IP Address</label>
		<input type="text" name="ip" id="ip"><br>
		<label for="specs">Hardware Specs.</label>
		<input type="text" name="specs" id="specs"><br>
		<label for="comments">Comments</label>
		<input type="text" size="55" name="comments" id="comments">
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
<?php

//variables
$st = $_POST['state'];
$off = $_POST['office'];
$id = $_POST['id'];
$fn = $_POST['first_name'];
$ln = $_POST['last_name'];
$pc = $_POST['pcname'];
$enc = $_POST['isencrypted'];
$os = $_POST['os'];
$av = $_POST['av'];
$ip = $_POST['ip'];
$specs = $_POST['specs'];
$comm = $_POST['comments'];

//connect to DB
echo "<h3>This Page Establishes a SQL Database Connection</h3>";
echo '<p>Today\'s Date: ' . date('l, F jS, Y') . '</p>';

$host = 'localhost';
$us = 'kevin';
$pd = 'pass';
$db = 'kevin';

$conn = new mysqli($host,$us,$pd,$db);

	if($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}echo "Connected Successfully <br>";


//build sql statement 0
$sql0 = "INSERT INTO location (State,Office,ID)
			VALUES ('$st','$off','$id')";

//run sql query 0
if($conn->query($sql0)===TRUE){
	echo "Query 1 ran successfully<br>";
}else{
	echo "Error: " . $sql0 . "<br>" . $conn->error;
}

//build sql statement 1
$sql1 = "INSERT INTO user (first_name,last_name,ID)
			VALUES ('$fn','$ln','$id')";

//run sql query 1
if($conn->query($sql1)===TRUE){
	echo "Query 2 ran successfully<br>";
}else{
	echo "Error: " . $sql1 . "<br>" . $conn->error;
}

//build sql statement 2
$sql2 = "INSERT INTO computer (pcname,isencrypted,os,av,ip,specs,comments,ID)
			VALUES ('$pc','$enc','$os','$av','$ip','$specs','$comm','$id')";

//run sql query 2
if($conn->query($sql2)===TRUE){
	echo "Query 3 ran successfully<br>";
}else{
	echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();

?>

</html>
