<?php

require '../DBInfo.php';

//$returnToVendorId = $_POST["returnToVendorId"];
$vendorCode = $_POST["vendorCode"];
$storeCode = $_POST["storeCode"];
$totalIds = $_POST["idCount"];
$todayDate = $_POST["date"];
$itemId = $_POST["itemId"];
$qReturned = $_POST["qReturned"];
$updatedStock = $_POST["newStock"];

// if(isset($_POST["returnToVendorId"]))
// {
// 	$sql = "DELETE FROM returntovendordetail WHERE returnToVendorId = '{$returnToVendorId}'";
// 	$result= $conn->query($sql);
	
// 	for($i = 1; $i <= $totalIds; $i++){
// 		$item = $_POST["ID" . $i];
// 		$quantity = $_POST["Quant" . $i];
// 		$sql = "INSERT INTO returntovendordetail (returnToVendorId, itemId, quantityReturned) VALUES ('{$returnToVendorId}','{$item}','{$quantity}')";
		
// 		if ($conn->query($sql) === TRUE) {
// 			$res="Data Inserted Successfully:";
// 			echo json_encode($res);
// 			} else {
// 			$error="Not Inserted, Some Problems Occurred.";
// 			echo json_encode($error);
// 		}
		
// 	}
//}
//else{

	$sql = "SELECT vendorId FROM vendor where vendorCode = '{$vendorCode}'";
	$result= $conn->query($sql);
	$data = mysqli_fetch_row($result);
	$vendorId = $data[0];

	$sql = "SELECT storeId FROM retailstore where storeCode = '{$storeCode}'";
	$result= $conn->query($sql);
	$data = mysqli_fetch_row($result);
	$storeId = $data[0];


	$sql = "INSERT INTO returntovendor (vendorId, storeId, dateTimeOfReturn) VALUES ('{$vendorId}','{$storeId}','{$todayDate}')";

	if ($conn->query($sql) === TRUE) {
		$res="Data Inserted Successfully:";
		echo json_encode($res);
	} else {
		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}

	$sql = "SELECT MAX(returnToVendorId) FROM returntovendor";
	$result= $conn->query($sql);
	$data = mysqli_fetch_row($result);
	$returnToVendorId = $data[0];

	//for($i = 1; $i <= $totalIds; $i++){
	
		$sql = "INSERT INTO returntovendordetail (returnToVendorId, itemId, quantityReturned) VALUES ('{$returnToVendorId}','{$itemId}','{$qReturned}')";
		
		echo($sql);

		if ($conn->query($sql) === TRUE) {
			$res="Data Inserted Successfully:";
			echo json_encode($res);
			} else {
			$error="Not Inserted, Some Problems Occurred.";
			echo json_encode($error);
		}
		
		
	//


$sql = "UPDATE inventory SET quantityInStock ='{$updatedStock}' WHERE storeId = '{$storeId}' AND itemId = '{$itemCode}'";

if ($conn->query($sql) === TRUE) {
    	$res="Data Inserted Successfully:";
		echo json_encode($res);
	} else {
   		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}
//}
$conn->close();

?>
