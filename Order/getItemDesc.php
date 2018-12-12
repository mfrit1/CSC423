<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

$vendorCode =  mysqli_escape_string($conn, $_POST['vendorCode']);


//SQL statement to get the record.
$sql = "SELECT inventoryitem.itemId, inventoryitem.description, inventoryitem.itemCost FROM inventoryitem, vendor where ((vendor.vendorCode='{$vendorCode}') AND (inventoryitem.vendorId = vendor.vendorId) AND (inventoryitem.status = 'Active'))";


$result= $conn->query($sql);



echo '<option value="" disabled selected hidden>Items...</option>"';
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
	$id = htmlspecialchars($data[0]);
	$price = htmlspecialchars($data[2]);
	$value = htmlspecialchars($data[1]);
    echo "<option value='$id' id='$id' price='$price'>$value</option>";
}

$conn->close();

?>