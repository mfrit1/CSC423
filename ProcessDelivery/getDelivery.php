<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';


$orderNumber = $_POST['orderNumber'];

//Creating a JSON object to pass to confirmDelivery.php
if(!isset($jsonObject)) $jsonObject = new stdClass();
$jsonObject->orderNumber = $orderNumber;

//SQL statement to get the record.
$sql = "SELECT inventoryitem.description, orderDetail.quantityOrdered, inventoryitem.itemId FROM orderdetail INNER JOIN inventoryitem ON orderdetail.itemId = inventoryitem.itemId WHERE orderdetail.orderId = {$orderNumber}";
//Run the SQL statement and store the returned values in result.
$result1 = $conn->query($sql);

//Grab the store Id
$sqlStoreId = "SELECT storeId FROM orders WHERE orderId = {$orderNumber}";
$resultStoreId = $conn->query($sqlStoreId);
$storeId = mysqli_fetch_row($resultStoreId)[0];

//set up the table
echo '  <div class="col-lg-12" style="text-align: center">
        <div class = "container" style="height: 400px; overflow-y: auto;">
                        <table class="table" id="myTable" style="table-layout: fixed;  word-wrap: break-word; width: 100%;">
                            <thead class="bg-secondary">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Quantity Ordered</th>
                                </tr>
                            </thead>
                        <tbody  id="tBody" style="background-color: white;">';

if(mysqli_num_rows($result1) < 1)
{
    echo "<tr id = 'noResults'>";
    echo "<td colspan=2 align=center>No items associated with that order.</td>";
    echo "</tbody>
            </table>
        </div>";
}
else
{
    //As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
    //For each item, update the store's inventory
    while($data = mysqli_fetch_row($result1))
    {   
        echo "<tr id = '$data[0]'>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "</tr>";

        //If the item already exists in inventory, grab the amount and update it. If not, insert new row
        $sqlCheck = "SELECT quantityInStock FROM inventory WHERE storeId = {$storeId} AND itemId = {$data[2]}";
        $responseCheck = $conn->query($sqlCheck);
        if(mysqli_num_rows($responseCheck) < 1)
        {
            $sqlStatement = "INSERT INTO inventory (storeId, itemId, quantityInStock) VALUES ({$storeId}, {$data[2]}, {$data[1]})";
        }
        else
        {
            $sqlStatement = "UPDATE inventory SET quantityInStock = quantityInStock+{$data[1]} WHERE storeId = {$storeId} AND itemId = {$data[2]}";
        }

        $conn->query($sqlStatement);
    }

    echo '</tbody>
            </table>';

    echo '</div>
        
        <div class="col-lg-4" style="margin:auto;display:block">
        <h3>This order has been delivered</h3>
        </div>
        </div>';

        $updateDateSQL = "UPDATE orders SET dateTimeOfFulfilment = '" . date("m/d/Y") . "', status = 'Delivered' WHERE orderId = {$orderNumber} AND storeId = {$storeId}";
        $conn->query($updateDateSQL);
}
?>