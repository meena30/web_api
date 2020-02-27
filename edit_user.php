<?php

// include database connection
include 'config/config.php';

// Extract, validate and sanitize the id.
$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($con, (int)$_GET['id']) : false;

$edituserlist = [];

if($id)
{
  	// edit user details.
	$sql = "SELECT ID, FirstName, LastName, Email FROM Users WHERE id =$id";

	if($result = mysqli_query($con, $sql))
	{
		while($row = mysqli_fetch_assoc($result))
		{
		    $edituserlist['ID']    = $row['ID'];
		    $edituserlist['FirstName'] = $row['FirstName'];
		    $edituserlist['LastName'] = $row['LastName'];
		    $edituserlist['Email'] = $row['Email'];
		}
	}

	echo json_encode($edituserlist);

}