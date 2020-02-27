<?php

// include database connection
include 'config/config.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

 // Escape user inputs for security
$fname = mysqli_real_escape_string($con, trim($request->firstName));
$lname = mysqli_real_escape_string($con, trim($request->lastName));
$email = mysqli_real_escape_string($con, trim($request->email));
$password = mysqli_real_escape_string($con, trim($request->password));


  // Create.
  	$sql = "INSERT INTO Users (FirstName, LastName, Email, Password) VALUES ('$fname', '$lname', '$email', md5('$password'))";

	if(mysqli_query($con, $sql)){
	    //echo "Records added successfully.";

	   $response = [
      'fname' => $fname,
      'lname' => $lname,
      'email'    => $email
    ];
    echo json_encode($response);

	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	}

  /*if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $response = [
      'fname' => $fname,
      'lname' => $lname,
      'email'    => $email
    ];
    echo json_encode($response);
  }
  else
  {
    http_response_code(422);
  }*/


}

// Close connection
mysqli_close($con);
?>
