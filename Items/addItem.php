<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.

//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
    <div class="row">
      <div class ="col-lg-12">
        
        <h2 align="left">ADD AN ITEM</h2>
        
      </div>
    </div>
    <form class="form-horizontal" method="post" id = "myForm" action = "Add_Item_Submit.php"   >
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-3">
          <label for="itemId">Item Number</label>
          <input type="text" class="form-control" name="itemId" id="number" placeholder="Enter Item Number" required>
        </div>
        <div class ="col-lg-9">
          <label for="itemDepartment">Department</label>
          <input type="text" class="form-control" name="itemDepartment" id="itemDepartment" placeholder="Enter Department of Item"  required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="itemSize">Size</label>
          <input type="text" class="form-control" name="itemSize" id="Size" placeholder="Enter Item Size"  required>
        </div>
        <div class ="col-lg-4">
          <label for="itemCost">Item Cost</label>
          <input type="text" class="form-control" name="itemCost" id="itemCost" placeholder="Enter Item Cost"  required>
        </div>
        <div class ="col-lg-4">
          <label for="retailPrice">Retail Price</label>
          <input type="text" class="form-control" name="retailPrice" id="retailPrice" placeholder="Enter Item Retail Price"  required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-12">
          <label for="itemDescription">Description</label>
          <input type="text" class="form-control" name="itemDescription" id="Description" placeholder="Enter Item Description"  required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="divisionDropdown">Division</label>
          <select class="form-control" name="divisionDropdown" id="divisionDropdown" selected="" required>
          <option value="" selected>Select a Division</option>





          </select>
        </div>
        <div class ="col-lg-4">
          <label for="categoryDropdown">Category</label>
          <select class="form-control" name="categoryDropdown" id="categoryDropdown" selected="" required>
          <option value="" selected>Select a Category</option>




          </select>
        </div>
        <div class ="col-lg-4">
          <label for="vendorDropdown">Vendor</label>
          <select class="form-control" name="vendorDropdown" id="vendorDropdown" selected="" required>
          <option value="" selected>Select a Vendor</option>




          </select>
        </div>    
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-8">
          <label for="itemImagePath" style="padding-top: 10%">Image File</label>
          <input type="text" class="form-control" name="itemImagePath" id="itemImagePath" placeholder="Enter Item Image Name" onkeyup="getImage()">
        </div>
        <div class ="col-lg-4">
          <img src="" id="itemImage" class="">
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
      </div>
      <div style="height: 25px"></div>
      <button type="submit" button name="submit" id="submit" class="btn btn-primary btn-lg btn-block spacing">Submit Item Information</button>
    </form>
  </div>';


//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>
