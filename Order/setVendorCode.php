<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';
$id = $_POST['id'];
//SQL statement to get the record.
$sql = "SELECT vendorCode FROM vendor WHERE vendorId = '{$id}'";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);

//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "$data[0]";
}

?>
