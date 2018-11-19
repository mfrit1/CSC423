<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

$trid = $_GET['orderId'];

//SQL statement to get the record.
$sql = "SELECT orders.orderId, inventoryitem.itemId, inventoryitem.description, inventoryitem.imageFileName, orderdetail.quantityOrdered
		FROM orders
        INNER JOIN orderdetail ON orders.orderId = orderdetail.orderId
        INNER JOIN inventoryitem ON orderdetail.itemId = inventoryitem.itemId
		WHERE orders.orderId = $trid
		ORDER BY orders.orderId";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);

echo '
<div class="col-lg-1">
      </div>
    <div class="col-lg-10" style="text-align: center">
          <div style="text-align: center; overflow-y:auto; max-height: 750px;" >
            <table class="table table-bordered" style="max-width: 100% " align="center" >
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">Item ID</th>
                  <th scope="col">Item Description</th>
                  <th scope="col">Item Image</th>
                  <th scope="col">Quantity</th>
                </tr>
              </thead>
              <tbody id = "itemTable" style="background-color: white;">';

//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr id='$data[0]' height='130px'>";
    echo "<td scope='row' style='padding-top: 50px'><b>$data[0]</b></td>";
    echo "<td align=center  style='padding-top: 50px'>$data[1]</td>";
    echo "<td align=center  style='padding-top: 50px'>$data[2]</td>";
    echo "<td align=center><img src='../FD Images/$data[3]' height='125px' width='125px' class='zoom'></td>";
    echo "<td align=center  style='padding-top: 50px'>$data[4]</td>";
    echo "</tr>";
}

echo '
</tbody>
            </table>

          </div>
      <!-- <div class="col-lg-1"></div> -->
      </div>
      <div class="col-lg-1">
      </div>
      </div>
      ';

?>
