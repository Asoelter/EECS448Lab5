<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "a671s355", "woo9Aeve", "a671s355");

if ($mysqli->connect_errno) 
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$checks = $_POST["check_list"];
$query = "SELECT * FROM Posts WHERE author_id = '$name'";

$global_success = true;

foreach($checks as $check)
{
	$id = $check.value;
	$name_query = "SELECT author_id FROM POSTS WHERE post_id = '$id'";
	$delete_query = "DELETE FROM Posts WHERE post_id = '$id'";

	if($success = $mysqli->query($delete_query))
	{
		if(!$success)
		{
			$global_success = false;
		}

		if(!$name_success = $mysqli->query($name_query))
		{
			$mysqli->("DELETE FROM Users WHERE user_id = $name");
		}
	}
	else
	{
		echo "<br></br>";
		echo "No posts by " . $name;
	}
}

if($global_success)
{
	echo"<br></br>";
	echo "All entries deleted successfully";
}
else
{
	echo"<br></br>";
	echo "One or more value was not deleted successfully";
}
?>
