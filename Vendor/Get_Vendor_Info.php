<?php
require '../DBInfo.php';
//function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
 // $data = htmlspecialchars($data);
//  return $data;


//}
$sql = "SELECT * FROM vendor WHERE vendorCode='{$vendorCode}'";
echo $sql;
//echo $sql;

$result= $conn->query($sql);
if($result->num_rows > 0)
{
	$row = mysqli_fetch_array($result);
	echo implode($row);
}
else
{
	header("HTTP/1.0 404 Not Found");
  	exit();
}
$conn->close();

?>
