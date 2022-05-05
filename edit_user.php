<?php

// include database connection
include 'config/config.php';
header("Access-Control-Allow-Headers: authorization, Content-Type");

// Extract, validate and sanitize the id.
$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($conn, (int)$_GET['id']) : false;

$edituserlist = [];

if($id)
{
  	// edit user details.
	$sql = "SELECT ID, FirstName, LastName, Email, Image FROM users WHERE ID =$id";

	if($result = mysqli_query($conn, $sql))
	{
		while($row = mysqli_fetch_assoc($result))
		{
		    $edituserlist['ID']    = $row['ID'];
		    $edituserlist['FirstName'] = $row['FirstName'];
		    $edituserlist['LastName'] = $row['LastName'];
		    $edituserlist['Email'] = $row['Email'];
		    $edituserlist['Image'] = $row['Image'];
		    $edituserlist['is_featured'] = '0';

		}
	}

	//echo json_encode($edituserlist);

	$response = [
      'status' => 200,
      'message' => 'User retrieved',
      'result' => $edituserlist
    ];

    echo json_encode($response);


}