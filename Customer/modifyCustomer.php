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
        
        <h2 align="left">MODIFY A CUSTOMER</h2>
        
      </div>
    </div>
    <form class="form-horizontal" method="post" id="myForm" action="Modify_Customer_Submit.php?id=' .  $data[0]  .'" >
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-3">
          <label for="customerId">Customer Number</label>
          <input type="text" class="form-control" name="customerId" id="number" value="' . $data[0] . '">
        </div>
        <div class ="col-lg-9">
          <label for="state">State</label>
        <select class="form-control" name="State" id="' . $data[4] . '">
          <option value="" selected>Select a State</option>





          </select>
        </div>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" value="' . $data[2] . '">
        </div>
        <div class ="col-lg-4">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" name="phone" id="phone" value="'  . $data[6] .  '">
        </div>
        <div class ="col-lg-4">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" value="' . $data[7] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-12">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" value="' . $data[1] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-6">
          <label for="city">city</label>
          <input type="text" class="form-control" name="city" id="city" value="' . $data[3] . '">
        </div>
        <div class ="col-lg-6">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" name="zip" id="zip" value="' . $data[5] . '">
        </div>    
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
      </div>
      <div style="height: 25px"></div>
      <button type="submit" button name="submit" id="submit" class="btn btn-primary btn-lg btn-block spacing">Submit Customer Information</button>
    </form>
  </div>';


//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>
