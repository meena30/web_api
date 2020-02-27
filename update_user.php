<?php


// include database connection
include 'config/config.php';

// check if form was submitted
if($_POST){

  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

   /*$response = [
      'status' => 'enter',
      'id' => $id,
      'fname' => $fname
    ];
    echo json_encode($response);*/

    // user update.
  $sql = "UPDATE Users SET FirstName = '$fname', LastName = '$lname', Email='$email', Password=md5('$password') WHERE id = $id";

  if(mysqli_query($con, $sql)){
      $response = [
      'status' => 'true',
      'message' => 'user date was updated successfully'
    ];
      echo json_encode($response);
   } 

  }

// Close connection
mysqli_close($con);
?>
