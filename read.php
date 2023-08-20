<?php
header("Content-Type:application/json");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "restapi";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);

$sql = "SELECT * FROM rest";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $results = " user_id: " . $row["user_id"].   " cell_id: ". $row["cell_id" ]. " time_cell: " . $row["time_cell"].  " power: " .$row["power"]. " anonymous: " .$row["anonymous"]. "" ;
  echo json_encode($results)."\n\n";
  }
} else {
	$false["status"] = "false";
echo json_encode($false)."";
}
 exit;
?>

