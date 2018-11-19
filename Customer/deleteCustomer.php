<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

$trid = $_GET['id'];

$sql = "SELECT * FROM Customer WHERE customerId=$trid";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);
$data = mysqli_fetch_row($result);

//SQL statement to get the record.

//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
    <div class="row">
      <div class ="col-lg-12">
        
        <h2 align="left">DELETE A CUSTOMER</h2>
        
      </div>
    </div>
    <form class="form-horizontal" method="post" id = "myForm" action = "Delete_Customer_Submit.php?id=' .  $data[0]  .'" >
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-8">
          <label for="customerName">Customer Name</label>
          <input readonly type="text" class="form-control" name="customerName" id="customerName" value="' . $data[1] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="customerAddress">Address</label>
          <input readonly type="text" class="form-control" name="customerAddress" id="customerAddress" value="' . $data[2] . '">
        </div>
        <div class ="col-lg-4">
          <label for="customerCity">City</label>
          <input readonly type="text" class="form-control" name="customerCity" id="customerCity" value="' . $data[3] . '">
        </div>
        <div class ="col-lg-2">
          <label for="customerState">State</label>
          <input readonly type="text" class="form-control" name="customerState" id="customerState" value="' . $data[4] . '">
        </div>
        <div class ="col-lg-2">
            <label for="customerZip">Zip</label>
            <input readonly type="text" class="form-control" name="customerZip" id="customerZip" value="' . $data[5] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="customerDescription">Phone</label>
          <input readonly type="text" class="form-control" name="customerPhone" id="customerPhone" value="' . $data[6] . '">
        </div>
        <div class ="col-lg-8">
          <label for="customerDescription">Email</label>
          <input readonly type="text" class="form-control" name="customerEmail" id="customerEmail" value="' . $data[7] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
      </div>
      <div style="height: 25px"></div>
      <button type="submit" button name="submit" id="submit" class="btn btn-danger btn-lg btn-block spacing">Delete Customer</button>
    </form>
  </div>';


//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>
