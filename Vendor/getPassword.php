<?php
require '../DBInfo.php';
	$sql = "SELECT password FROM vendor WHERE vendorId=(SELECT MAX(vendorId) FROM vendor)";

	$result= $conn->query($sql);
if($result->num_rows > 0)
{
	$row = mysqli_fetch_array($result);
	echo '<table border=2 cellspacing="20">';
		echo '<tr>';
			echo '<td height="150px" width="550px" align="center">';
				echo '<font size="5"><b>Password: <u>' . $row['password'] . '</u></b></font>';
			echo '</td>';
		echo '</tr>';
	echo '</table>';
	
}
$conn->close();
?>
