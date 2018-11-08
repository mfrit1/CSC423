<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

$vendorCode = $_POST['vendorCode'];


//SQL statement to get the record.
$sql = "SELECT inventoryitem.itemId, inventoryitem.description FROM inventoryitem, vendor where ((vendor.vendorCode='{$vendorCode}') AND (inventoryitem.vendorId = vendor.vendorId))";


$result= $conn->query($sql);




//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<option value='$data[0]'>$data[1]</option>";
}

?>

?>