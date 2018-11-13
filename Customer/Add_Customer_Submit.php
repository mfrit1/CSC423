<?php

require '../DBInfo.php';

$customerId = $_POST["customerId"];
$name = $_POST["name"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];
$email = $_POST["email"];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	$sql = "SELECT * FROM inventorycustomer WHERE (customerId='{$customerId}')";
//echo $sql;
	$result= $conn->query($sql);

if($result->num_rows == 0)
{
	$sql = "INSERT INTO Customer (customerId, name, address, city, state, zip, phone, email) VALUES ('{$customerId}','{$name}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$email}')";

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
