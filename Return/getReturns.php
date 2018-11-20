<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';
//SQL statement to get the record.
$sql = "SELECT returntovendor.returnToVendorId, vendor.vendorCode, vendor.vendorName, retailstore.storeCode, retailstore.storeName, returntovendor.dateTimeOfReturn FROM returntovendor, vendor, retailstore WHERE ((retuntovendor.vendorId = vendor.vendorId) AND (returntovendor.storeId = retailstore.storeId)) ORDER BY returntovendor.returntovendorId DESC";
//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr id = '$data[0]' status = '$data[6]'>";
    echo "<td scope='row'><b>$data[0]</b></td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center>$data[4]</td>";
    echo "<td align=center>$data[5]</td>";
    echo "<td align=center>$data[6]</td>";
	 echo "<td align=center>$data[7]</td>";
    echo "<td align=center><button type='button' class='btn btn-warning' onclick='modifyReturn($(this))' style='padding-right: 10px'><i class='fa fa-pencil'></i></button><div class='divider'></div></td>";
    echo "</tr>";
}
?>