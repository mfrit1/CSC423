<?php

require '../DBInfo.php';

$vendorCode = $_POST["vendorCode"];
$storeCode = $_POST["storeCode"];
$totalIds = $_POST["idCount"];
$todayDate = $_POST["date"];

$sql = "SELECT vendorId FROM vendor where vendorCode = '{$vendorCode}'";
$result= $conn->query($sql);
$data = mysqli_fetch_row($result);
$vendorId = $data[0];

$sql = "SELECT storeId FROM retailstore where storeCode = '{$storeCode}'";
$result= $conn->query($sql);
$data = mysqli_fetch_row($result);
$storeId = $data[0];



$sql = "INSERT INTO orders (vendorId, storeId, dateTimeOfOrder) VALUES ('{$vendorId}','{$storeId}','{$todayDate}')";

if ($conn->query($sql) === TRUE) {
    $res="Data Inserted Successfully:";
	echo json_encode($res);
} else {
   	$error="Not Inserted, Some Problems Occurred.";
	echo json_encode($error);
}

$sql = "SELECT MAX(orderId) FROM orders";
$result= $conn->query($sql);
$data = mysqli_fetch_row($result);
$orderId = $data[0];

for($i = 1; $i <= $totalIds; $i++){
	$item = $_POST["ID" . $i];
	$quantity = $_POST["Quant" . $i];
	$sql = "INSERT INTO orderdetail (orderId, itemId, quantityOrdered) VALUES ('{$orderId}','{$item}','{$quantity}')";
	
	if ($conn->query($sql) === TRUE) {
		$res="Data Inserted Successfully:";
		echo json_encode($res);
		} else {
		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}
	
	
}







	$conn->close();

