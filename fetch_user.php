<?php 
// include database connection
include 'config/config.php';

 header("Access-Control-Allow-Headers: authorization, Content-Type");

$userlist = [];
//$sql = "SELECT ID, FirstName, LastName, Email FROM users WHERE ID=1";
$sql = "SELECT ID, FirstName, LastName, Email FROM users";

if($result = mysqli_query($conn,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $userlist[$i]['ID']    = $row['ID'];
    $userlist[$i]['FirstName'] = $row['FirstName'];
    $userlist[$i]['LastName'] = $row['LastName'];
    $userlist[$i]['Email'] = $row['Email'];
    $i++;

    /*$userlist['ID']    = $row['ID'];
    $userlist['FirstName'] = $row['FirstName'];
    $userlist['LastName'] = $row['LastName'];
    $userlist['Email'] = $row['Email'];*/

  }


 /*$userlist = [
      'Employee No' => 399,
      'Name'  => 'Meena P',
      'WorkEmail' => 'meena.p@optisolbusiness.com',
      'WorkLocation' => 'Chennai',
      'Gender' => 'Female',
      'Designation' => 'WordPress / Software Engineer',
      'Department' => 'WordPress'
  ];*/

  //echo json_encode(array('result'=>'success'));

  /*echo $userlist = [{
    "ID": 1,
    "FirstName": 'Meena',
    "LastName": 'Bala',
    "Email": 'meena@yopmail.com'
  }]*/





  echo json_encode($userlist);
}
else
{
  http_response_code(404);
}


?>