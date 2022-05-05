<?php


// include database connection
include 'config/config.php';

// Extract, validate and sanitize the id.
$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($conn, (int)$_GET['id']) : false;

if($id)
{
  	// Delete.
	 $sql = "DELETE FROM users WHERE ID =$id";

	if(mysqli_query($conn,$sql))
	{
	  //http_response_code(204);
	$response = [
      'status' => 200,
      'message' => 'User was deleted successfully'
    ];
   
	}
	else
	{
		$response = [
	      'status' => 404,
	      'message' => 'User id not found'
	    ];
	}

	 echo json_encode($response);

}