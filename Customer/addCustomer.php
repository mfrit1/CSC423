<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.

//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
    <div class="row">
      <div class ="col-lg-12">
        
        <h2 align="left">ADD A CUSTOMER</h2>
        
      </div>
    </div>
    <form class="form-horizontal" method="post" id = "myForm" action = "Add_Customer_Submit.php"   >
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-3">
          <label for="customerId">Customer Number</label>
          <input type="text" class="form-control" name="customerId" id="number" placeholder="Enter Customer Number">
        </div>
        <div class ="col-lg-9">
          <label for="customerDepartment">Department</label>
          <input type="text" class="form-control" name="customerDepartment" id="customerDepartment" placeholder="Enter Department of Customer">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="customerSize">Size</label>
          <input type="text" class="form-control" name="customerSize" id="Size" placeholder="Enter Customer Size">
        </div>
        <div class ="col-lg-4">
          <label for="customerCost">Customer Cost</label>
          <input type="text" class="form-control" name="customerCost" id="customerCost" placeholder="Enter Customer Cost">
        </div>
        <div class ="col-lg-4">
          <label for="retailPrice">Retail Price</label>
          <input type="text" class="form-control" name="retailPrice" id="retailPrice" placeholder="Enter Customer Retail Price">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-12">
          <label for="customerDescription">Description</label>
          <input type="text" class="form-control" name="customerDescription" id="Description" placeholder="Enter Customer Description">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="divisionDropdown">Division</label>
          <select class="form-control" name="divisionDropdown" id="divisionDropdown" selected="">
          <option value="" selected>Select a Division</option>





          </select>
        </div>
        <div class ="col-lg-4">
          <label for="categoryDropdown">Category</label>
          <select class="form-control" name="categoryDropdown" id="categoryDropdown" selected="">
          <option value="" selected>Select a Category</option>




          </select>
        </div>
        <div class ="col-lg-4">
          <label for="vendorDropdown">Vendor</label>
          <select class="form-control" name="vendorDropdown" id="vendorDropdown" selected="">
          <option value="" selected>Select a Vendor</option>




          </select>
        </div>    
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-8">
          <label for="customerImagePath" style="padding-top: 10%">Image File</label>
          <input type="text" class="form-control" name="customerImagePath" id="customerImagePath" placeholder="Enter Customer Image Name" onkeyup="getImage()">
        </div>
        <div class ="col-lg-4">
          <img src="" id="customerImage" class="">
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
