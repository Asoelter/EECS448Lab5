<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a671s355", "woo9Aeve", "a671s355");

if ($mysqli->connect_errno) 
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT * from Users";

if($result = $mysqli->query($query))
{
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "Name: " . $row["user_id"] . "<br>";
		}
	}
}
else
{
	echo "error  ";
	echo $mysqli->error;
}
?>
