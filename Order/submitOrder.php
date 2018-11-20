<?php

require '../DBInfo.php';

$orderId = mysqli_escape_string($conn, $_POST["orderId"]);
$vendorCode = mysqli_escape_string($conn, $_POST["vendorCode"]);
$storeCode = mysqli_escape_string($conn, $_POST["storeCode"]);
$totalIds = mysqli_escape_string($conn, $_POST["idCount"]);
$todayDate = mysqli_escape_string($conn, $_POST["date"]);


if(isset($_POST["orderId"]))
{
	$sql = "DELETE FROM orderdetail WHERE orderId = '{$orderId}'";
	$result= $conn->query($sql);
	
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
}
else{

	$sql = "SELECT vendorId FROM vendor where vendorCode = '{$vendorCode}'";
	$result= $conn->query($sql);
	$data = mysqli_fetch_row($result);
	$vendorId = mysqli_escape_string($conn, $data[0]);

	$sql = "SELECT storeId FROM retailstore where storeCode = '{$storeCode}'";
	$result= $conn->query($sql);
	$data = mysqli_fetch_row($result);
	$storeId = mysqli_escape_string($conn, $data[0]);



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
	$orderId = mysqli_escape_string($conn, $data[0]);

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
}
$conn->close();

?>