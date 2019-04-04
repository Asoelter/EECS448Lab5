<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a671s355", "woo9Aeve", "a671s355");

if ($mysqli->connect_errno) 
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$name = $_POST["userName"];
$query = "INSERT INTO Users(user_id) VALUES('$name')";

if ($result = $mysqli->query($query)) 
{
	echo "Thank you, come again";
	$result->free();
}
else
{
	echo "error  ";
	echo $mysqli->error;
}

$mysqli->close();

?>
