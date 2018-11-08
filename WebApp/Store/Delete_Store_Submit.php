<?php

require '../DBInfo.php';

$trid = $_GET['id'];

	//$sql = "UPDATE inventoryitem SET status='Inactive' WHERE storeId=$trid";
	
	if ($conn->query($sql) === TRUE) {
    	$res="Data Deleted Successfully:";
		echo json_encode($res);
	} else {
   		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}

	$sql = "UPDATE retailstore SET status='Inactive' WHERE storeId=$trid";
	echo $sql;
//echo $sql;

	if ($conn->query($sql) === TRUE) {
    	$res="Data Deleted Successfully:";
		echo json_encode($res);
	} else {
   		$error="Not Inserted, Some Problems Occurred.";
		echo json_encode($error);
	}

	$conn->close();


?>
