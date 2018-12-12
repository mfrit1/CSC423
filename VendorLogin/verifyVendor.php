<?php

require '../DBInfo.php';

$vendorCode = $_POST["vendorCode"];
$password = $_POST["password"];

//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
//}
	$sql = "SELECT * FROM vendor WHERE (vendorCode='{$vendorCode}' AND password='{$password}' AND status='Active')";

//echo $sql;
	$result= $conn->query($sql);

	if($result->num_rows == 1)
	{
		$conn->close();
	}

	else
	{
		header("HTTP/1.0 404 Not Found");
  		exit();
	}

?>
