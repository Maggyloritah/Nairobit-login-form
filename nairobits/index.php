<?php
$servername ="localhost";
$username ="root";
$password ="";
$database ="nairobits_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if(!$conn){die("Connection failed: ". mysqli_connect_error());
}
echo "Connected successfully";
?>
<!DOCTYPE html>
<html>
<head>
	<title>nairobits student database</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form>
  First name:<br>
  <input type="text" name="firstname">
  <br>
  Last name:<br>
  <input type="text" name="lastname"><br><br>
  <input type="submit" value="Submit">
</form>










</body>
</html>