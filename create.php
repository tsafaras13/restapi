<?php
header("Content-Type:application/json");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "restapi";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
$_POST = json_decode(file_get_contents('php://input'), true);


if (isset($_POST['user_id']) && $_POST['user_id']!="") 
{
 
 $user_id = $_POST['user_id'];
 if (isset($_POST['cell_id']) && $_POST['cell_id']!="") 
  {
 
 $cell_id = $_POST['cell_id'];
  if (isset($_POST['time_cell']) && $_POST['time_cell']!="") 
   {
 
    $time_cell = $_POST['time_cell'];

   if (isset($_POST['power']) && $_POST['power']!="") 
     {
 
     $power = $_POST['power'];
 
 
     if (isset($_POST['anonymous']) && $_POST['anonymous']!="") 
      {
 
 $anonymous = $_POST['anonymous'];

      }
     }
    }
   }

$query = "INSERT INTO rest(user_id, cell_id, time_cell,power,anonymous) VALUES('$user_id', '$cell_id', '$time_cell', '$power','$anonymous')";
$result = mysqli_query($con, $query);
$response["status"] = "true";
$response["message"] = "Visitor created";
}


 else 
{
 $response["status"] = "false";
 $response["message"] = "No created!";
}

echo json_encode($response); 
 exit;
?>

 


