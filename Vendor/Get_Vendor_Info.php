<?php
require '../DBInfo.php';
//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;
$vendorCode= $_GET['vendorCode'];

//}
$sql = "SELECT * FROM vendor WHERE vendorCode='{$vendorCode}'";
//echo $sql;
//echo $sql;

$result= $conn->query($sql);
if($result->num_rows > 0)
{
	$row = mysqli_fetch_array($result);
	echo $row['vendorId'] . '|';
	echo $row['vendorCode'] . '|';
	echo $row['vendorName'] . '|';
	echo $row['address'] . '|';
	echo $row['city'] . '|';
	echo $row['state'] . '|';
	echo $row['zip'] . '|';
	echo $row['contactPersonName'] . '|';
	echo $row['phone'] . '|';
	echo $row['password'];
}
else
{
	header("HTTP/1.0 404 Not Found");
  	exit();
}
$conn->close();

?>
