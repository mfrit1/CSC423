<?php

require '../DBInfo.php';

$name = $_POST["InputStoreName"];
$address = $_POST["InputStoreAddress"];
$city = $_POST["InputStoreCity"];
$state = $_POST["stateSelect"];
$zip = $_POST["InputStoreZip"];
$phone = $_POST["InputCustomerPhone"];
$email = $_POST["InputCustomerEmail"];


$sql = "INSERT INTO customer (name, address, city, state, zip, phone, email) VALUES ('{$customerCode}','{$name}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$email}')";

if ($conn->query($sql) === TRUE) {
	$res="Data Inserted Successfully:";
	echo json_encode($res);
} else {
		$error="Not Inserted, Some Problems Occurred.";
	echo json_encode($error);
}

$conn->close();

else
{
	header("HTTP/1.0 404 Not Found");
  	exit();
}

?>
