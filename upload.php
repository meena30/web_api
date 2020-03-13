<?php 
// include database connection
include 'config/config.php';

$response = array();
$upload_dir = 'image/';
$server_url = 'http://localhost/web_api';

// Extract, validate and sanitize the id.
$id = ($_GET['id'] !== null && (int)$_GET['id'] > 0)? mysqli_real_escape_string($con, (int)$_GET['id']) : false;


//if($_FILES['avatar'])

/*$image = $_POST['file'];

if($image){

    $response = [
        "status" => "enter",
        "message" => "base64 image"
    ];

}*/

if($id){

$sql = "SELECT ID, FirstName, LastName, Email, Image FROM Users WHERE id =1";

    if($result = mysqli_query($con, $sql))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $response['ID']    = $row['ID'];
            $response['FirstName'] = $row['FirstName'];
            $response['LastName'] = $row['LastName'];
            $response['Email'] = $row['Email'];
            $response['url'] = $row['Image'];
            $response['status'] = "success";
        }
    }
}    
//if($_FILES['avatar'])
else
{
    
    $avatar_name = $_FILES["avatar"]["name"];
    $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
    $error = $_FILES["avatar"]["error"];

    $random_name = rand(1000,1000000)."-".$avatar_name;
    $upload_name = $upload_dir.strtolower($random_name);
    $upload_name = preg_replace('/\s+/', '-', $upload_name);
    
        if(move_uploaded_file($avatar_tmp_name , $upload_name)) {

            $response = [
              "status" => "success",
               "message" => "File uploaded successfully",
                "imagename" => $avatar_name,
                "url" => $server_url."/".$upload_name
            ];

        }
}


/*else{
    $response = [
        "status" => "error",
        "message" => "No file was sent!"
    ];
}*/

echo json_encode($response);

// Close connection
mysqli_close($con);

?>