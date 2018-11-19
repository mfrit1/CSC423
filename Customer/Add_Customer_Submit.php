<?php

require '../DBInfo.php';

$name = $_POST["customerName"];
$address = $_POST["customerAddress"];
$city = $_POST["customerCity"];
$state = $_POST["customerState"];
$zip = $_POST["customerZip"];
$phone = $_POST["customerPhone"];
$email = $_POST["customerEmail"];


	// $sql = "SELECT * FROM customer WHERE (customerId='{$customerId}')";

	// $result= $conn->query($sql);

// if($result->num_rows == 0)
// {
	$sql = "INSERT INTO Customer (name, address, city, state, zip, phone, email) VALUES ('{$name}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$email}')";

	if ($conn->query($sql) === TRUE) {
    	$res="Data Inserted Successfully:";
		echo json_encode($res);
	} else {
   		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}

	$conn->close();
// }

// else
// {
// 	header("HTTP/1.0 404 Not Found");
//   	exit();
// }

?>
