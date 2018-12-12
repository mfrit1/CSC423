<?php

require '../DBInfo.php';

$name = mysqli_escape_string($conn, $_POST["customerName"]);
$address = mysqli_escape_string($conn, $_POST["customerAddress"]);
$city = mysqli_escape_string($conn, $_POST["customerCity"]);
$state = mysqli_escape_string($conn, $_POST["customerState"]);
$zip = mysqli_escape_string($conn, $_POST["customerZip"]);
$phone = mysqli_escape_string($conn, $_POST["customerPhone"]);
$email = mysqli_escape_string($conn, $_POST["customerEmail"]);


	// $sql = "SELECT * FROM customer WHERE (customerId='{$customerId}')";

	// $result= $conn->query($sql);

// if($result->num_rows == 0)
// {
	$sql = "INSERT INTO customer (name, address, city, state, zip, phone, email) VALUES ('{$name}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$email}')";

	echo $sql;

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
