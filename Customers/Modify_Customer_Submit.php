<?php

require '../DBInfo.php';

$customerId = mysqli_escape_string($conn, $_GET["id"]);
$name = mysqli_escape_string($conn, $_POST["customerName"]);
$address = mysqli_escape_string($conn, $_POST["customerAddress"]);
$city = mysqli_escape_string($conn, $_POST["customerCity"]);
$state = mysqli_escape_string($conn, $_POST["customerState"]);
$zip = mysqli_escape_string($conn, $_POST["customerZip"]);
$phone = mysqli_escape_string($conn, $_POST["customerPhone"]);
$email = mysqli_escape_string($conn, $_POST["customerEmail"]);
$trid = 
//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}

	// if($customerId != $trid)
	// {
	// 	$sql = "SELECT * FROM Customer WHERE (customerId='{$customerId}')";
	// 	//echo $sql;
	// 	$result= $conn->query($sql);
	// 	if($result->num_rows == 0)
	// 	{
	// 		$sql = "UPDATE Customer SET name='{$name}', address='{$address}', city='{$city}', state='{$state}', zip='{$zip}', phone='{$phone}', email='{$email}' WHERE customerId=$trid";
	// 		if ($conn->query($sql) === TRUE) {
 //    			$res="Data Inserted Successfully:";
	// 			echo json_encode($res);
	// 		} else {
 //   				$error="Not Inserted, Some Problems Occurred.";
	// 			echo json_encode($error);
	// 		}

	// 		$conn->close();
	// 	}
	// 	else
	// 	{
	// 		header("HTTP/1.0 404 Not Found");
 //  			exit();
	// 	}	
	// }



		$sql = "UPDATE Customer SET name='{$name}', address='{$address}', city='{$city}', state='{$state}', zip='{$zip}', phone='{$phone}', email='{$email}' WHERE customerId=$customerId";

		if ($conn->query($sql) === TRUE) {
    		$res="Data Inserted Successfully:";
			echo json_encode($res);
		} else {
   			$error="Not Inserted, Some Problems Occurred.";
			echo json_encode($error);
		}

		$conn->close();



?>
