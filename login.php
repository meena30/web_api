<?php


/*header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json; charset=utf-8');*/

//echo "test";
// include database connection
include 'config/config.php';



header("Access-Control-Allow-Origin: *");
    header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
    header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');
     //header("Access-Control-Allow-Headers: authorization, Content-Type");

    $formdata = json_decode(file_get_contents('php://input'), true);

    //print_r($formdata);

     $username = $formdata['username'];
    $password = $formdata['password'];



// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

// Escape user inputs for security
//$email = mysqli_real_escape_string($conn, trim($request->email));
//$password = mysqli_real_escape_string($conn, trim($request->password));

/*$response = [
      'id' =>1,
      'email'  => $email,
      'role' => 'Superadmin',
      'token' => 'eyJpc3MiOiJ0b3B0YWwuY29tIiwiZXhwIjoxNDI2NDIwODAwLCJodHRwOi8vdG9wdGFsLmNvbS9qd3RfY2xhaW1zL2lzX2FkbWluIjp0cnVlLCJjb21wYW55IjoiVG9wdGFsIiwiYXdlc29tZSI6dHJ1ZX0'
    ];*/

    $response = array(
            'user_id' => 1,
            'first_name' => 'Meena',
            'last_name' => 'Bala',
            //'role' => 'Admin',
            'role' => 'User',
            'token' => 'eyJpc3MiOiJ0b3B0YWwuY29tIiwiZXhwIjoxNDI2NDIwODAwLCJodHRwOi8vdG9wdGFsLmNvbS9qd3RfY2xhaW1zL2lzX2FkbWluIjp0cnVlLCJjb21wYW55IjoiVG9wdGFsIiwiYXdlc29tZSI6dHJ1ZX0'
        );

echo json_encode($response);

}

// Close connection
mysqli_close($conn);
?>
