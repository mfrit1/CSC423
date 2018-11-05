<?php

require '../DBInfo.php';

$trid = $_GET['id'];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	$sql = "UPDATE vendor SET status='Inactive' WHERE vendorId=$trid";
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
