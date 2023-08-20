<?php
header("Content-Type:application/json");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "restapi";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);

 
if (isset($_GET['user_id']) && $_GET['user_id']!="") {
 
 $user_id = $_GET['user_id'];
 $query = "SELECT * FROM rest WHERE user_id=$user_id ";
 $result = mysqli_query($con, $query);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
 $Data['user_id'] = $row['user_id'];
 $Data['cell_id'] = $row['cell_id'];
 $Data['time_cell'] = $row['time_cell'];
 $Data['power'] = $row['power'];
 $Data['anonymous'] = $row['anonymous'];

if($Data['anonymous'] == 1)
        {  
         $response["status"] = "true";
         $response["message"] = "Τhe user is eponymos";
         $response["visitor"] = $Data;
        }  
        
        
        else
        {  $response["status"] = "False";
           $response["message"] = "Τhe user is anonymous!!!";
        } 
           

                                                         }


echo json_encode($response); exit;
?>




