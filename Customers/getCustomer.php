<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.
$sql = "SELECT * FROM Customer WHERE status='Active' ORDER BY customerId";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);




//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr id='$data[0]' height='130px'>";
    echo "<td scope='row' style='padding-top: 50px'><b>$data[0]</b></td>";
    echo "<td align=center style='padding-top: 50px'>$data[1]</td>";
    echo "<td align=center style='padding-top: 50px; ma'><a>$data[2]</a></td>";
    echo "<td align=center style='padding-top: 50px'>$data[3]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[4]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[5]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[6]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[7]</td>";
    echo "<td align=center style='padding-top: 45px'><button type='button' class='btn btn-warning' style='padding-right: 10px' onclick='modifyCustomer($(this))'><i class='fa fa-pencil'></i></button><div class='divider'></div><button type='button' class='btn btn-danger' onclick='deleteCustomer($(this))'><i class='fa fa-trash'></i></button></td>";
    echo "</tr>";
}

?>
