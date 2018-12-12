<?php

require '../DBInfo.php';

$trid = $_GET['id'];

$vendorCode = mysqli_escape_string($conn, $_POST["InputVendorCode"]);
$vendorName = mysqli_escape_string($conn, $_POST["InputVendorName"]);
$address = mysqli_escape_string($conn, $_POST["InputVendorAddress"]);
$city = mysqli_escape_string($conn, $_POST["InputVendorCity"]);
$state = $_POST["stateSelect"];
$zip = mysqli_escape_string($conn, $_POST["InputVendorZip"]);
$phone = mysqli_escape_string($conn, $_POST["InputVendorContactNumber"]);
$contactPersonName = mysqli_escape_string($conn, $_POST["InputVendorContactName"]);

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
