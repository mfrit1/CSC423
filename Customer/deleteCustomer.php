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
        
        <h2 align="left">DELETE AN CUSTOMER</h2>
        
      </div>
    </div>
    <form class="form-horizontal" method="post" id = "myForm" action = "Delete_Customer_Submit.php?id=' .  $data[0]  .'" >
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-3">
          <label for="customerId">Customer Number</label>
          <input readonly type="text" class="form-control" name="customerId" id="number" value="' . $data[0] . '">
        </div>
        <div class ="col-lg-9">
          <label for="customerDepartment">Department</label>
          <input readonly type="text" class="form-control" name="customerDepartment" id="customerDepartment" value="' . $data[4] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="customerSize">Size</label>
          <input readonly type="text" class="form-control" name="customerSize" id="Size" value="' . $data[2] . '">
        </div>
        <div class ="col-lg-4">
          <label for="customerCost">Customer Cost</label>
          <input readonly type="text" class="form-control" name="customerCost" id="customerCost" value="'  . $data[6] .  '">
        </div>
        <div class ="col-lg-4">
          <label for="retailPrice">Retail Price</label>
          <input readonly type="text" class="form-control" name="retailPrice" id="retailPrice" value="' . $data[7] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-12">
          <label for="customerDescription">Description</label>
          <input readonly type="text" class="form-control" name="customerDescription" id="Description" value="' . $data[1] . '">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="divisionDropdown">Division</label>
          <select disabled="disabled" class="form-control" name="divisionDropdown" id="' . $data[3] . '">
          <option value="" selected>Select a Division</option>





          </select>
        </div>
        <div class ="col-lg-4">
          <label for="categoryDropdown">Category</label>
          <select disabled="disabled" class="form-control" name="categoryDropdown" id="' . $data[5] . '">
          <option value="" selected>Select a Category</option>




          </select>
        </div>
        <div class ="col-lg-4">
          <label for="vendorDropdown">Vendor</label>
          <select disabled="disabled" class="form-control" name="vendorDropdown" id="'  . $data[9] . '">
          <option value="" selected>Select a Vendor</option>




          </select>
        </div>    
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-8">
          <label for="customerImagePath" style="padding-top: 10%">Image File</label>
          <input readonly type="text" class="form-control" name="customerImagePath" id="customerImagePath" value="' . $data[8] . '" onkeyup="getImage()">
        </div>
        <div class ="col-lg-4">
          <img src="../FD Images/' . $data[8] . '" id="customerImage">
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
