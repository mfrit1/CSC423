<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';


$orderInfo = JSON.parse($_POST['dataNeeded']);

echo $orderInfo;

// //SQL statement to get the record.
// $sql = "SELECT inventoryitem.description, orderDetail.quantityOrdered, inventoryitem.itemId FROM orderdetail INNER JOIN inventoryitem ON orderdetail.itemId = inventoryitem.itemId WHERE orderdetail.orderId = {$orderNumber}";
// //Run the SQL statement and store the returned values in result.
// $result = $conn->query($sql);


// //set up the table
// echo '  <div class="col-lg-12" style="text-align: center">
//         <div class = "container" style="height: 400px; overflow-y: auto;">
//                         <table class="table" id="myTable" style="table-layout: fixed;  word-wrap: break-word; width: 100%;">
//                             <thead class="bg-secondary">
//                                 <tr>
//                                     <th scope="col">Item</th>
//                                     <th scope="col">Quantity Ordered</th>
//                                 </tr>
//                             </thead>
//                         <tbody  id="tBody" style="background-color: white;">';

// if(mysqli_num_rows($result) < 1)
// {
//     echo "<tr id = 'noResults'>";
//     echo "<td colspan=2 align=center>No items associated with that order.</td>";
//     echo "</tbody>
//             </table>
//         </div>";
// }
// else
// {
//     //As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
//     while($data = mysqli_fetch_row($result))
//     {   
//         echo "<tr id = '$data[0]'>";
//         echo "<td align=center>$data[0]</td>";
//         echo "<td align=center>$data[1]</td>";
//         echo "</tr>";
//     }

//     echo '</tbody>
//             </table>
//         </div>
        
//         <div class="col-lg-2" style="margin:auto;display:block">
//         <button type="button" name="button" onclick="createReturnStart2('+json_encode($jsonObject)+')" class="btn btn-primary btn-lg btn-block spacing">Confirm Delivery</button>
//         </div>
//         </div>';
// }
?>