<?php

require '../DBInfo.php';

$trid = $_GET['id'];

$storeCode = mysqli_escape_string($conn, $_POST["InputStoreCode"]);
$storeName = mysqli_escape_string($conn, $_POST["InputStoreName"]);
$address = mysqli_escape_string($conn, $_POST["InputStoreAddress"]);
$city = mysqli_escape_string($conn, $_POST["InputStoreCity"]);
$state = $_POST["stateSelect"];
$zip = mysqli_escape_string($conn, $_POST["InputStoreZip"]);
$phone = mysqli_escape_string($conn, $_POST["InputStoreContactNumber"]);
$contactPersonName = mysqli_escape_string($conn, $_POST["InputStoreManager"]);

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	$sql = "UPDATE retailstore SET storeCode='{$storeCode}', storeName='{$storeName}', address='{$address}', city='{$city}', state='{$state}', zip='{$zip}', phone='{$phone}', managerName='{$contactPersonName}' WHERE storeId=$trid";
	echo $sql;
//echo $sql;

	if ($conn->query($sql) === TRUE) {
    	$res="Data Inserted Successfully:";
		echo json_encode($res);
	} else {
   		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}

	$conn->close();


?>
