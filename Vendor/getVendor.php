<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.
$sql = "SELECT * FROM vendor WHERE status='Active' ORDER BY CHAR_LENGTH(vendorCode), vendorCode";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);




//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td scope='row'><b>$data[1]</b></td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center>$data[4]</td>";
    echo "<td align=center>$data[5]</td>";
    echo "<td align=center>$data[6]</td>";
    echo "<td align=center>$data[7]</td>";
    echo "<td align=center>$data[8]</td>";
    echo "<td align=center><button type='button' class='btn btn-warning' style='padding-right: 10px'><i class='fa fa-pencil'></i></button><div class='divider'></div><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>";
    echo "</tr>";
}

?>
