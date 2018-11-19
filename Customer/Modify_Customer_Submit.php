<?php

require '../DBInfo.php';

$customerId = $_POST["customerId"];
$name = $_POST["customerName"];
$address = $_POST["customerAddress"];
$city = $_POST["customerCity"];
$state = $_POST["customerState"];
$zip = $_POST["customerZip"];
$phone = $_POST["customerPhone"];
$email = $_POST["customerEmail"];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}

	if($customerId != $trid)
	{
		$sql = "SELECT * FROM Customer WHERE (customerId='{$customerId}')";
		//echo $sql;
		$result= $conn->query($sql);
		if($result->num_rows == 0)
		{
			$sql = "UPDATE Customer SET name='{$name}', address='{$address}', city='{$city}', state='{$state}', zip='{$zip}', phone='{$phone}', email='{$email}' WHERE customerId=$trid";
			if ($conn->query($sql) === TRUE) {
    			$res="Data Inserted Successfully:";
				echo json_encode($res);
			} else {
   				$error="Not Inserted, Some Problems Occurred.";
				echo json_encode($error);
			}

			$conn->close();
		}
		else
		{
			header("HTTP/1.0 404 Not Found");
  			exit();
		}	
	}
	else{
		$sql = "UPDATE Customer SET name='{$name}', address='{$address}', city='{$city}', state='{$state}', zip='{$zip}', phone='{$phone}', email='{$email}' WHERE customerId=$customerId";
		if ($conn->query($sql) === TRUE) {
    		$res="Data Inserted Successfully:";
			echo json_encode($res);
		} else {
   			$error="Not Inserted, Some Problems Occurred.";
			echo json_encode($error);
		}

		$conn->close();
	}



?>
