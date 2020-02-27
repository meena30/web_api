<?php 
// include database connection
include 'config/config.php';

$userlist = [];
$sql = "SELECT ID, FirstName, LastName, Email FROM Users";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $userlist[$i]['ID']    = $row['ID'];
    $userlist[$i]['FirstName'] = $row['FirstName'];
    $userlist[$i]['LastName'] = $row['LastName'];
    $userlist[$i]['Email'] = $row['Email'];
    $i++;
  }

  echo json_encode($userlist);
}
else
{
  http_response_code(404);
}


?>