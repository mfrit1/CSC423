<?php

require '../DBInfo.php';

$storeCode = $_POST["storeCode"];
$customerCode = $_POST["customerId"];
$itemCode = $_POST["itemId"];
$totalItems = $_POST["itemCount"];
$todayDate = $_POST["date"];

//$sql = "SELECT vendorId FROM vendor where vendorCode = '{$vendorCode}'";
//$result= $conn->query($sql);
//$data = mysqli_fetch_row($result);
//$vendorId = $data[0];

$sql = "SELECT storeId FROM retailstore where storeCode = '{$storeCode}'";
$result= $conn->query($sql);
$data = mysqli_fetch_row($result);
$storeId = $data[0];



$sql = "INSERT INTO customerpurchase (customerId, itemId, storeId, quantityPurchased, dateTimeOfPurchase) VALUES ('{$customerCode}','{$itemCode}','{$storeId}','{$totalItems}','{$todayDate}')";

if ($conn->query($sql) === TRUE) {
	$res="Data Inserted Successfully:";
	echo json_encode($res);
} else {
	$error="Not Inserted, Some Problems Occurred.";
	echo json_encode($error);
}

$updatedStock = $_POST["newStock"];

$sql = "UPDATE inventory SET quantityInStock='{$updatedStock}' WHERE (storeId = '{$storeCode}' AND itemId = '{$itemCode}')";

if ($conn->query($sql) === TRUE) {
    	$res="Data Inserted Successfully:";
		echo json_encode($res);
	} else {
   		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}

	
$conn->close();

?>