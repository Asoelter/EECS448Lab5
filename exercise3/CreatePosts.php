<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a671s355", "woo9Aeve", "a671s355");

if ($mysqli->connect_errno) 
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$name = $_POST["userName"];
$text = $_POST["postText"];
$query = "SELECT * FROM Users WHERE user_id = '$name'";

if($result = $mysqli->query($query))
{
	echo "Thank you, come again";
	if ($result->num_rows > 0) 
	{
		$insertion = "INSERT INTO Posts(content, author_id)
					  VALUES('$text', '$name')";

		if($insertion_result = $mysqli->query($insertion))
		{
			echo "Inserted";
			$insertion_result->free();
		}
		else
		{
			echo "error  ";
			echo $mysqli->error;
		}
	}

	$result->free();
}
else
{
	echo "error  ";
	echo $mysqli->error;
}

$mysqli->close();

?>
