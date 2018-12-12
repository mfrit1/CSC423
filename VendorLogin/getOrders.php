<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

$trid = $_GET['vendorCode'];
$sql = "SELECT vendorId FROM vendor WHERE vendorCode=$trid";
$result= $conn->query($sql);
$data = mysqli_fetch_row($result);

//SQL statement to get the record.
$sql = "SELECT orders.orderId, orders.dateTimeOfOrder, retailstore.storeName, orders.status, orders.dateTimeOfFulfilment
		FROM orders
		INNER JOIN retailstore ON orders.storeId = retailstore.storeId
		WHERE orders.vendorId = $data[0]
		ORDER BY orders.status, orders.dateTimeOfOrder";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);


//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr id='$data[0]' height=''>";
    echo "<td scope='row' style=''><b>$data[0]</b></td>";
    echo "<td align=center  style=''>$data[1]</td>";
    echo "<td align=center style=''; ma'><a>$data[2]</a></td>";
    echo "<td align=center style=''>$data[3]</td>";
    echo "<td align=center style=''>$data[4]</td>";
    echo "<td align=center style=''><button type='button' class='btn btn-primary' style='padding-right: 10px' onclick='getOrderInfo($(this))'><i class='fa fa-info-circle'></i></button></td>";
    echo "</tr>";
}

?>
