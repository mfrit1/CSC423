<?php

require 'DBInfo.php';

$vendorId = test_input($_POST["InputVendorID"]);
$vendorCode = test_input($_POST["InputVendorCode"]);
$vendorName = test_input($_POST["InputVendorName"]);
$address = test_input($_POST["InputVendorAddress"]);
$city = test_input($_POST["InputVendorCity"]);
$state = test_input($_POST["stateSelect"]);
$zip = test_input($_POST["InputVendorZip"]);
$phone = test_input($_POST["InputVendorContactNumber"]);
$contactPersonName = test_input($_POST["InputVendorContactName"]);
$password = test_input($_POST["InputVendorPassword"]);

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "INSERT INTO vendor (vendorId, vendorCode, vendorName, address, city, state, zip, phone, contactPersonName, password) VALUES ('{$vendorId}','{$vendorCode}','{$vendorName}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$contactPersonName}','{$password}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>