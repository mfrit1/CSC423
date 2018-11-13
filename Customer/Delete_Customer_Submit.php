<?php

require '../DBInfo.php';

$trid = $_GET['id'];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	echo $trid;
	$sql = "UPDATE Customer SET status='Inactive' WHERE customerId=$trid";
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
