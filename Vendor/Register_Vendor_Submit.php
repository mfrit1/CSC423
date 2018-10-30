<?php

require '../DBInfo.php';

$vendorCode = $_POST["InputVendorCode"];
$vendorName = $_POST["InputVendorName"];
$address = $_POST["InputVendorAddress"];
$city = $_POST["InputVendorCity"];
$state = $_POST["stateSelect"];
$zip = $_POST["InputVendorZip"];
$phone = $_POST["InputVendorContactNumber"];
$contactPersonName = $_POST["InputVendorContactName"];
$password = randomPassword();

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
$sql = "SELECT * FROM vendor WHERE (vendorCode='{$vendorCode}')";
//echo $sql;
//echo $sql;

echo $sql;

$result= $conn->query($sql);

if($result->num_rows == 0)
{
	$sql = "INSERT INTO vendor (vendorCode, vendorName, address, city, state, zip, phone, contactPersonName, password) VALUES ('{$vendorCode}','{$vendorName}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$contactPersonName}','{$password}')";

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



//Function for making a password for the Vendor.
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    	$pass = array(); //remember to declare $pass as an array
    	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    	for ($i = 0; $i < 15; $i++) {
        	$n = rand(0, $alphaLength);
        	$pass[] = $alphabet[$n];
    	}
    	return implode($pass); //turn the array into a string
	}

?>
