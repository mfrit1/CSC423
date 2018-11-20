<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';
//SQL statement to get the record.
$sql = "SELECT orders.orderId, vendor.vendorCode, vendor.vendorName, retailstore.storeCode, retailstore.storeName, orders.dateTimeOfOrder, orders.status, orders.dateTimeOfFulfilment FROM orders, vendor, retailstore WHERE ((orders.vendorId = vendor.vendorId) AND (orders.storeId = retailstore.storeId)) ORDER BY orders.orderId DESC";
//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
	$field0 = htmlspecialchars($data[0]);
	$field1 = htmlspecialchars($data[1]);
	$field2 = htmlspecialchars($data[2]);
	$field3 = htmlspecialchars($data[3]);
	$field4 = htmlspecialchars($data[4]);
	$field5 = htmlspecialchars($data[5]);
	$field6 = htmlspecialchars($data[6]);
	$field7 = htmlspecialchars($data[7]);
    echo "<tr id = '$field0' status = '$field6'>";
    echo "<td scope='row'><b>$field0</b></td>";
    echo "<td align=center>$field1</td>";
    echo "<td align=center>$field2</td>";
    echo "<td align=center>$field3</td>";
    echo "<td align=center>$field4</td>";
    echo "<td align=center>$field5</td>";
    echo "<td align=center>$field6</td>";
	 echo "<td align=center>$field7</td>";
    echo "<td align=center><button type='button' class='btn btn-warning' onclick='modifyOrder($(this))' style='padding-right: 10px'><i class='fa fa-pencil'></i></button><div class='divider'></div></td>";
    echo "</tr>";
}

$conn->close();
?>