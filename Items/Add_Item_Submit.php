<?php

require '../DBInfo.php';

$itemId = mysqli_escape_string($conn, $_POST["itemId"]);
$itemDescription = mysqli_escape_string($conn, $_POST["itemDescription"]);
$itemSize = mysqli_escape_string($conn, $_POST["itemSize"]);
$itemCost = mysqli_escape_string($conn, $_POST["itemCost"]);
$retailPrice = mysqli_escape_string($conn, $_POST["retailPrice"]);
$divisionDropdown = $_POST["divisionDropdown"];
$categoryDropdown = $_POST["categoryDropdown"];
$vendorDropdown = $_POST["vendorDropdown"];
$itemImagePath = $_POST["itemImagePath"];
$itemDepartment = mysqli_escape_string($conn, $_POST["itemDepartment"]);

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	$sql = "SELECT * FROM inventoryitem WHERE (itemId='{$itemId}')";
//echo $sql;
	$result= $conn->query($sql);

if($result->num_rows == 0)
{
	$sql = "INSERT INTO inventoryitem (itemId, description, size, division, department, category, itemCost, itemRetail, imageFileName, vendorId) VALUES ('{$itemId}','{$itemDescription}','{$itemSize}','{$divisionDropdown}','{$itemDepartment}','{$categoryDropdown}','{$itemCost}','{$retailPrice}','{$itemImagePath}','{$vendorDropdown}')";

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
