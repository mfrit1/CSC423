<?php

require '../DBInfo.php';

$itemId = $_POST["InputItemID"];
$itemDesc = $_POST["InputItemDescription"];
$size = $_POST["InputItemSize"];
$city = $_POST["InputVendorCity"];
$division = $_POST["InputItemDivision"];
$category = $_POST["InputItemCategory"];
$price = $_POST["InputItemPrice"];
$retailPrice = $_POST["InputRetailPrice"];
$imageFile = $_POST["InputImageFile"];

	$sql = "SELECT * FROM inventoryitem WHERE (itemId='{$itemId}')";
//echo $sql;
	$result= $conn->query($sql);

if($result->num_rows == 0)
{
	$sql = "INSERT INTO inventoryitem (itemId, description, size, division, category, itemCost, itemRetail, imageFileName) VALUES ('{$itemId}','{$itemDesc}','{$size}','{$division}','{$category}','{$price}','{$retailPrice}','{$imageFile}')";

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
