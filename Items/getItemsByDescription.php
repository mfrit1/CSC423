<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.
$sql = "SELECT * FROM inventoryitem WHERE status='Active' ORDER BY description";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);




//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr id='$data[0]' height='130px'>";
    echo "<td scope='row' style='padding-top: 50px'><b>$data[0]</b></td>";
    echo "<td align=center  style='padding-top: 50px'>$data[1]</td>";
    echo "<td align=center style='padding-top: 50px'><a>$data[2]</a></td>";
    echo "<td align=center style='padding-top: 50px'>$data[3]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[4]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[5]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[6]</td>";
    echo "<td align=center style='padding-top: 50px'>$data[7]</td>";
    echo "<td align=center><img src='../$data[8]' height='125px' width='125px' class='zoom'></td>";
    echo "<td align=center style='padding-top: 45px'><button type='button' class='btn btn-warning' style='padding-right: 10px' onclick='modifyItem($(this))'><i class='fa fa-pencil'></i></button><div class='divider'></div><button type='button' class='btn btn-danger' onclick='deleteItem($(this))'><i class='fa fa-trash'></i></button></td>";
    echo "</tr>";
}

?>
