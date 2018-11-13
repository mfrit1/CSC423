<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.
$sql = "SELECT DISTINCT division FROM inventoryitem WHERE division!='' ORDER BY division";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);


//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
echo '<option value="" selected>Select a Division</option>';
while($data = mysqli_fetch_row($result))
{   
    echo "<option value='$data[0]'>$data[0]</option>";
}

?>
