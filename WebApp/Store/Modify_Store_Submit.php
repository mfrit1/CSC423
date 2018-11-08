<?php

require '../DBInfo.php';

$trid = $_GET['id'];

$storeCode = $_POST["InputStoreCode"];
$storeName = $_POST["InputStoreName"];
$address = $_POST["InputStoreAddress"];
$city = $_POST["InputStoreCity"];
$state = $_POST["stateSelect"];
$zip = $_POST["InputStoreZip"];
$phone = $_POST["InputStoreContactNumber"];
$contactPersonName = $_POST["InputStoreManager"];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	$sql = "UPDATE store SET storeCode='{$storeCode}', storeName='{$storeName}', address='{$address}', city='{$city}', state='{$state}', zip='{$zip}', phone='{$phone}', managerName='{$contactPersonName}' WHERE storeId=$trid";
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
