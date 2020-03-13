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
$email = mysqli_real_escape_string($con, trim($request->email));
$password = mysqli_real_escape_string($con, trim($request->password));

$response = [
      'id' =>1,
      'email'  => $email,
      'role' => 'Superadmin',
      'token' => 'eyJpc3MiOiJ0b3B0YWwuY29tIiwiZXhwIjoxNDI2NDIwODAwLCJodHRwOi8vdG9wdGFsLmNvbS9qd3RfY2xhaW1zL2lzX2FkbWluIjp0cnVlLCJjb21wYW55IjoiVG9wdGFsIiwiYXdlc29tZSI6dHJ1ZX0'
    ];

echo json_encode($response);

}

// Close connection
mysqli_close($con);
?>
