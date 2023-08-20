<?php
header("Content-Type:application/json");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "restapi";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);

 
if (isset($_GET['user_id']) && $_GET['user_id']<="100") 
{ 
 $user_id = $_GET['user_id'];
 $query = "DELETE  FROM rest WHERE user_id=$user_id";
 $result = mysqli_query($con, $query);
 $response["status"] = "true";
 $response["message"] = "Visitor deleted";
}

else 
{
 $response["status"] = "false";
 $response["message"] = "This user number does not exist";
}

echo json_encode($response); exit;
?>

