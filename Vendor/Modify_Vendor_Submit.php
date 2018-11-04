<?php

require '../DBInfo.php';

$trid = $_GET['id'];

$vendorCode = $_POST["InputVendorCode"];
$vendorName = $_POST["InputVendorName"];
$address = $_POST["InputVendorAddress"];
$city = $_POST["InputVendorCity"];
$state = $_POST["stateSelect"];
$zip = $_POST["InputVendorZip"];
$phone = $_POST["InputVendorContactNumber"];
$contactPersonName = $_POST["InputVendorContactName"];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	$sql = "UPDATE vendor SET vendorCode='{$vendorCode}', vendorName='{$vendorName}', address='{$address}', city='{$city}', state='{$state}', zip='{$zip}', phone='{$phone}', contactPersonName='{$contactPersonName}' WHERE vendorId=$trid";
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
