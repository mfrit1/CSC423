<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';


$orderNumber = $_POST['orderNumber'];

//SQL statement to get the record.
$sql = "SELECT inventoryitem.description, orderDetail.quantityOrdered FROM orderdetail INNER JOIN inventoryitem ON orderdetail.itemId = inventoryitem.itemId WHERE orderdetail.orderId = {$orderNumber}";
//Run the SQL statement and store the returned values in result.
$result = $conn->query($sql);

//set up the table
echo '<div class = "container" style="height: 400px; overflow-y: auto;">
                        <table class="table" id="myTable" style="table-layout: fixed;  word-wrap: break-word; width: 100%;">
                            <thead class="bg-secondary">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Quantity Ordered</th>
                                </tr>
                            </thead>
                        <tbody  id="tBody" style="background-color: white;">';

//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr id = '$data[0]'>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "</tr>";
}

echo '</tbody>
        </table>
    </div>';
?>

<!-- 
SELECT inventoryitem.description, orderdetail.quantityOrdered FROM orderdetail, orders, inventory, inventoryitem WHERE ((orderdetail.orderId = '1') AND (inventoryitem.itemId = orderdetail.itemId)) -->