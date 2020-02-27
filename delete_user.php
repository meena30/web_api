<?php

// include database connection
include 'config/config.php';

// Extract, validate and sanitize the id.
$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($con, (int)$_GET['id']) : false;

if($id)
{
  	// Delete.
	$sql = "DELETE FROM Users WHERE id =$id";

	if(mysqli_query($con, $sql))
	{
	  //http_response_code(204);
	$response = [
      'status' => true,
      'message' => 'User was deleted successfully'
    ];
   
	}
	else
	{
		$response = [
	      'status' => false,
	      'message' => 'User id not found'
	    ];
	}

	 echo json_encode($response);

}