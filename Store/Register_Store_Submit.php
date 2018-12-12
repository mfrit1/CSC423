<?php

require '../DBInfo.php';

$storeCode = mysqli_escape_string($conn, $_POST["InputStoreCode"]);
$storeName = mysqli_escape_string($conn, $_POST["InputStoreName"]);
$address = mysqli_escape_string($conn, $_POST["InputStoreAddress"]);
$city = mysqli_escape_string($conn, $_POST["InputStoreCity"]);
$state = mysqli_escape_string($conn, $_POST["stateSelect"]);
$zip = mysqli_escape_string($conn, $_POST["InputStoreZip"]);
$phone = mysqli_escape_string($conn, $_POST["InputStoreContactNumber"]);
$contactPersonName = mysqli_escape_string($conn, $_POST["InputStoreManager"]);


	$sql = "SELECT * FROM retailstore WHERE (storeCode='{$storeCode}')";
//echo $sql;
	$result= $conn->query($sql);

if($result->num_rows == 0)
{
	$sql = "INSERT INTO retailstore (storeCode, storeName, address, city, state, zip, phone, managerName) VALUES ('{$storeCode}', '{$storeName}', '{$address}', '{$city}', '{$state}', '{$zip}', '{$phone}', '{$contactPersonName}')";

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

?>
