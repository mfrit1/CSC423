<?php

require '../DBInfo.php';

$vendorId = $_POST["InputVendorID"];
$vendorCode = $_POST["InputVendorCode"];
$vendorName = $_POST["InputVendorName"];
$address = $_POST["InputVendorAddress"];
$city = $_POST["InputVendorCity"];
$state = $_POST["stateSelect"];
$zip = $_POST["InputVendorZip"];
$phone = $_POST["InputVendorContactNumber"];
$contactPersonName = $_POST["InputVendorContactName"];
$password = $_POST["InputVendorPassword"];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}

$sql = "INSERT INTO vendor (vendorId, vendorCode, vendorName, address, city, state, zip, phone, contactPersonName, password) VALUES ('{$vendorId}','{$vendorCode}','{$vendorName}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$contactPersonName}','{$password}')";

if ($conn->query($sql) === TRUE) {
    $res="Data Inserted Successfully:";
	echo json_encode($res);
} else {
   $error="Not Inserted,Some Problem occur.";
	echo json_encode($error);
}

$conn->close();

?>
