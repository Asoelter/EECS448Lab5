<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a671s355", "woo9Aeve", "a671s355");

if ($mysqli->connect_errno) 
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$name = $_POST["selection"];
echo "\nName : " . $name;
$query = "SELECT * FROM Posts WHERE author_id = '$name'";

if($result = $mysqli->query($query))
{
	if($result->num_rows > 0)
	{
		while($posts = $result->fetch_assoc())
		{
			echo"<br></br>";
			echo $posts["content"];
		}
	}
	else
	{
		echo "<br></br>";
		echo "No posts by " . $name;
	}
}
else
{
	echo "error  ";
	echo $mysqli->error;
}
?>
