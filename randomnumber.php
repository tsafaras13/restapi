<?php
header("Content-Type:application/json");
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "restapi";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);

function randomDate($sStartDate, $sEndDate, $sFormat = 'H:i:s') {
    // Convert the supplied date to timestamp
    $fMin = strtotime($sStartDate);
    $fMax = strtotime($sEndDate);
    // Generate a random number from the start and end dates
    $fVal = mt_rand($fMin, $fMax);
    // Convert back to the specified date format
    return date($sFormat, $fVal);
}
  
$query = "DELETE  FROM rest";
$result = mysqli_query($con, $query);
$query = "SELECT *  FROM rest";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
				$time_cellout=('00:00:00');
				$time_cellout=strtotime($time_cellout) + 20;
				$time_cellout = date('H:i:s',$time_cellout);
for ($i=1;$i<=500;$i++)
{
$user_id=$i;
$cell_id=rand(1,20);
$time_cell = randomDate('08:30:00',' 14:00:00');
$power=rand(-100,-55);
$anonymous=rand(0,1);

 $query = "INSERT INTO rest(user_id, cell_id, time_cell,time_cellout,power,anonymous) VALUES ('$user_id', '$cell_id', '$time_cell','$time_cellout' ,'$power','$anonymous')";
$result = mysqli_query($con, $query);

}
$response = "status: It is ok!!";
echo json_encode($response);
 exit;

   
    ?>


