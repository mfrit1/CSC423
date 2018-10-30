<?php

require '../DBInfo.php';

$storeCode = $_POST["InputStoreCode"];
$storeName = $_POST["InputStoreName"];
$address = $_POST["InputStoreAddress"];
$city = $_POST["InputStoreCity"];
$state = $_POST["stateSelect"];
$zip = $_POST["InputStoreZip"];
$phone = $_POST["InputManagerNumber"];
$managerName = $_POST["InputManagerName"];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
$sql = "SELECT * FROM retailstore WHERE (storeCode='{$storeCode}')";


$result= $conn->query($sql);

if($result->num_rows == 0)
{
	$sql = "INSERT INTO retailstore (storeCode, storeName, address, city, state, zip, phone, managerName) VALUES ('{$storeCode}','{$storeName}','{$address}','{$city}','{$state}','{$zip}','{$phone}','{$managerName}')";
	echo $sql;
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
