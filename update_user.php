<?php


// include database connection
include 'config/config.php';

$upload_dir = 'image/';
$server_url = 'http://localhost/web_api';

//print_r($_FILES);

//print_r($_POST);

$id = $_POST['id'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];


$avatar_name = $_FILES["image"]["name"];
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];

    $random_name = rand(1000,1000000)."-".$avatar_name;
    $upload_name = $upload_dir.strtolower($random_name);
    $upload_name = preg_replace('/\s+/', '-', $upload_name);
    $url = $server_url."/".$upload_name;
    
        if(move_uploaded_file($avatar_tmp_name , $upload_name)) {

            //$sql = "UPDATE users SET Image = '$url' WHERE ID = $id";
            $sql = "UPDATE users SET FirstName = '$fname', LastName = '$lname', Email='$email', Image = '$url',Password=md5('$password') WHERE ID = $id";
            mysqli_query($conn, $sql);

            /*$response = [
              "status" => "success",
               "message" => "File uploaded successfully",
                "imagename" => $avatar_name,
                "url" => $url
            ];*/

        }

        $response = [
          'status' => 200,
          'message' => 'User updated successfully'
        ];
echo json_encode($response);
exit;



// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  /*print_r($request);

  print_r($_FILES);*/

 // Escape user inputs for security
$id = mysqli_real_escape_string($conn, trim($request->id));
$fname = mysqli_real_escape_string($conn, trim($request->firstName));
$lname = mysqli_real_escape_string($conn, trim($request->lastName));
$email = mysqli_real_escape_string($conn, trim($request->email));
$password = mysqli_real_escape_string($conn, trim($request->password));


  // user update.
  $sql = "UPDATE users SET FirstName = '$fname', LastName = '$lname', Email='$email', Password=md5('$password') WHERE ID = $id";

  if(mysqli_query($conn, $sql)){
      
      $response = [
      'status' => 200,
      'message' => 'User updated successfully'
    ];
    echo json_encode($response);

  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }

  


}

// Close connection
mysqli_close($conn);









?>
