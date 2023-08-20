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


for ($i=1;$i<=10;$i++)
{
$user_id=rand(1,100);
$cell_id=rand(1,20);
$time_cell = randomDate('09:30:00' , '13:00:00');
$power=rand(-100,-55);
$anonymous=rand(0,1);
$query = "UPDATE rest  SET   cell_id='$cell_id', time_cell='$time_cell',power='$power',anonymous='$anonymous'
 WHERE user_id='$user_id' "  ;

$result = mysqli_query($con, $query);

} 

{
$date1= randomDate('09:30:00','13:00:00');
}
{
$query = "SELECT MAX(user_id) AS 'user_idmax'FROM rest ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$y= ($row["user_idmax"]);

}

{
$query = "UPDATE rest SET  time_cellout= DATE_ADD(time_cellout,INTERVAL 20 SECOND);";
$result = mysqli_query($con, $query); 
	echo json_encode ($result);
}
 
for ($j=0;$j<=50;$j++)
{
	$date1 = strtotime($date1) + 20;
	$date1 = date('H:i:s', $date1);
	echo json_encode($date1);
	if($date1 < '10:00:00' || $date1 > '12:30:00')
	{
		$delete=rand(5,10);
		$create=rand(1,5);
		for ($i=1;$i<=$delete;$i++)
		{
			$user_id=rand(1,10000);
			$query = "SELECT * FROM rest WHERE user_id=$user_id";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
			if($row == null)
			{
				
				$i--;
				continue;
			}
			else
			{
				
				if ($row['time_cell'] <= $date1)
				{			
					$power1=($row['power']);
					$cell_id1=($row['cell_id']);
					$time_cell1=($row['time_cell']);
					$anonymous1=($row['anonymous']);
					$time_cellout10=($row['time_cellout']);
					echo json_encode ($row['power']);
					echo json_encode ($row['cell_id']);
					echo json_encode ($user_id);
					$query = "INSERT INTO rest2 (user_id, cell_id, time_cell,time_cellout,power,anonymous) VALUES ('$user_id', '$cell_id1', '$time_cell1','$time_cellout10' ,'$power1' ,'$anonymous1' )";
					$result = mysqli_query($con, $query); 
					$query= " DELETE  FROM rest WHERE user_id=$user_id";
					$result = mysqli_query($con, $query);
					$response["status"] = "true";
					$response["message"] = "Visitor deleted";
					echo json_encode($response);
				}
				else
				{
					$i--;
					continue;
				}
			}
		}
	
		for ($i=1;$i<=$create;$i++)
		{
			$user_id=$y++;
			$cell_id=rand(1,20);
			$time_cell = $date1;
			$power=rand(-100,-55);
			$anonymous=rand(0,1);
			$query = "SELECT user_id,time_cellout FROM rest WHERE user_id=$user_id";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if($row == null)
			{	
				$time_cellout1='00:00:20';
				$query = "INSERT INTO rest(user_id, cell_id, time_cell,power,anonymous) VALUES ('$user_id', '$cell_id', '$time_cell', '$time_cellout1','$power','$anonymous')";
				$result = mysqli_query($con, $query);
				$response["status"] = "true";
				$response["message"] = "Visitor created";
				echo json_encode($response);
			}
			else 
			{
				$i--;
				continue;
			}
		}
	}
	else
	{
		$delete=rand(1,5);
		$create=rand(5,10);
		for ($i=1;$i<=$delete;$i++)
		{
			$user_id=rand(1,10000);
			$query = "SELECT * FROM rest WHERE user_id=$user_id";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
			if($row == null)
			{
				$i--;
				continue;
			}
			else 
			{
				if ($row['time_cell'] <= $date1 )
				{	
					$power2=($row['power']);
					$cell_id2=($row['cell_id']);
					$time_cell2=($row['time_cell']);
					$anonymous2=($row['anonymous']);
					$time_cellout3=($row['time_cellout']);
					$query = "INSERT INTO rest2 (user_id, cell_id, time_cell,time_cellout,power,anonymous) VALUES ('$user_id', '$cell_id2', '$time_cell2' , '$time_cellout3','$power2' ,'$anonymous2' )";
					$result = mysqli_query($con, $query); 
					$query = "DELETE  FROM rest WHERE user_id=$user_id";
					$result = mysqli_query($con, $query);
					$response["status"] = "true";
					$response["message"] = "Visitor deleted";
					echo json_encode($response);
				}
			    else
				{
					$i--;
					continue;
				}
			}
		}
		for ($i=1;$i<=$create;$i++)
		{	
			$user_id=$y++;
			$cell_id=rand(1,20);
			$time_cell = $date1;
			$power=rand(-100,-55);
			$anonymous=rand(0,1);
			$query = "SELECT user_id,time_cellout FROM rest WHERE user_id=$user_id";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
			if($row == null)
			{	$time_cellout2='00:00:20';
				$query = "INSERT INTO rest(user_id, cell_id, time_cell,time_cellout,power,anonymous) VALUES ('$user_id', '$cell_id', '$time_cell','$time_cellout2', '$power','$anonymous')";
				$result = mysqli_query($con, $query);
				$response["status"] = "true";
				$response["message"] = "Visitor created";
				echo json_encode($response);
			}
			else 
			{
				$i--;
				continue;
			}
		}
	}
}


	$response = "the update is done!";
	echo json_encode($response);
	exit;
	?>

