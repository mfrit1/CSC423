<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

$trid = $_GET['id'];

$sql = "SELECT * FROM inventoryitem WHERE itemId=$trid";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);
$data = mysqli_fetch_row($result);

//SQL statement to get the record.

//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
    <div class="row">
      <div class ="col-lg-12">
        
        <h2 align="left">MODIFY AN ITEM</h2>
        
      </div>
    </div>
    <form class="form-horizontal" method="post" id = "myForm" action = "Modify_Item_Submit.php?id=' .  $data[0]  .'">
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-3">
          <label for="itemId">Item Number</label>
          <input type="text" class="form-control" name="itemId" id="number" value="' . $data[0] . '" required>
        </div>
        <div class ="col-lg-9">
          <label for="itemDepartment">Department</label>
          <input type="text" class="form-control" name="itemDepartment" id="itemDepartment" value="' . $data[4] . '" required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="itemSize">Size</label>
          <input type="text" class="form-control" name="itemSize" id="Size" value="' . $data[2] . '" required>
        </div>
        <div class ="col-lg-4">
          <label for="itemCost">Item Cost</label>
          <input type="text" class="form-control" name="itemCost" id="itemCost" value="'  . $data[6] .  '" required>
        </div>
        <div class ="col-lg-4">
          <label for="retailPrice">Retail Price</label>
          <input type="text" class="form-control" name="retailPrice" id="retailPrice" value="' . $data[7] . '" required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-12">
          <label for="itemDescription">Description</label>
          <input type="text" class="form-control" name="itemDescription" id="Description" value="' . $data[1] . '" required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="divisionDropdown">Division</label>
          <select class="form-control" name="divisionDropdown" id="' . $data[3] . '" required>
          <option value="" selected>Select a Division</option>





          </select>
        </div>
        <div class ="col-lg-4">
          <label for="categoryDropdown">Category</label>
          <select class="form-control" name="categoryDropdown" id="' . $data[5] . '" required>
          <option value="" selected>Select a Category</option>




          </select>
        </div>
        <div class ="col-lg-4">
          <label for="vendorDropdown">Vendor</label>
          <select class="form-control" name="vendorDropdown" id="'  . $data[9] . '" required>
          <option value="" selected>Select a Vendor</option>




          </select>
        </div>    
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-8">
          <label for="itemImagePath" style="padding-top: 10%">Image File</label>
          <input type="text" class="form-control" name="itemImagePath" id="itemImagePath" value="' . $data[8] . '" onkeyup="getImage()" required>
        </div>
        <div class ="col-lg-4">
          <img src="../FD Images/' . $data[8] . '" id="itemImage">
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
