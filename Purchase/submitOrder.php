<?php

require '../DBInfo.php';

$storeCode = $_POST["storeCode"];
$customerCode = $_POST["customerCode"];
$itemCode = $_POST["itemCode"];
$totalItems = $_POST["totalItems"];
$todayDate = $_POST["date"];
echo "<script type='text/javascript'>alert(\"WE MADE IT\");</script>";

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

//$sql = "SELECT MAX(orderId) FROM orders";
//$result= $conn->query($sql);
//$data = mysqli_fetch_row($result);
//$orderId = $data[0];
//for($i = 1; $i <= $totalIds; $i++){
//	$item = $_POST["ID" . $i];
//	$quantity = $_POST["Quant" . $i];
//	$sql = "INSERT INTO orderdetail (orderId, itemId, quantityOrdered) VALUES ('{$orderId}','{$item}','{$quantity}')";
//	
//	if ($conn->query($sql) === TRUE) {
//		$res="Data Inserted Successfully:";
//		echo json_encode($res);
//	} else {
//		$error="Not Inserted, Some Problems Occurred.";
//		echo json_encode($error);
//	}
//}
	
$conn->close();

?>