<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.
$sql = "SELECT vendorId, vendorName FROM vendor ORDER BY vendorName ASC";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);




//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<option value='$data[0]'>$data[1]</option>";
}

?>
