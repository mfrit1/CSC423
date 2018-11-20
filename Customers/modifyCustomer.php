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
    <form class="form-horizontal" method="post" id="myForm" action="Modify_Customer_Submit.php?id=' .  $data[0]  .'" required>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-8">
          <label for="customerName">Customer Name</label>
          <input type="text" class="form-control" name="customerName" id="customerName" value="' . $data[1] . '" required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="customerAddress">Address</label>
          <input type="text" class="form-control" name="customerAddress" id="customerAddress" value="' . $data[2] . '" required>
        </div>
        <div class ="col-lg-4">
          <label for="customerCity">City</label>
          <input type="text" class="form-control" name="customerCity" id="customerCity" value="' . $data[3] . '" required>
        </div>
        <div class ="col-lg-2">
          <label for="customerState">State</label>
          <select class="form-control" name="customerState" id="'. $data[4] .'" selected="" required>
          <option value="AL">AL</option>
          <option value="AK">AK</option>
          <option value="AR">AR</option>  
          <option value="AZ">AZ</option>
          <option value="CA">CA</option>
          <option value="CO">CO</option>
          <option value="CT">CT</option>
          <option value="DC">DC</option>
          <option value="DE">DE</option>
          <option value="FL">FL</option>
          <option value="GA">GA</option>
          <option value="HI">HI</option>
          <option value="IA">IA</option>  
          <option value="ID">ID</option>
          <option value="IL">IL</option>
          <option value="IN">IN</option>
          <option value="KS">KS</option>
          <option value="KY">KY</option>
          <option value="LA">LA</option>
          <option value="MA">MA</option>
          <option value="MD">MD</option>
          <option value="ME">ME</option>
          <option value="MI">MI</option>
          <option value="MN">MN</option>
          <option value="MO">MO</option>  
          <option value="MS">MS</option>
          <option value="MT">MT</option>
          <option value="NC">NC</option>  
          <option value="NE">NE</option>
          <option value="NH">NH</option>
          <option value="NJ">NJ</option>
          <option value="NM">NM</option>      
          <option value="NV">NV</option>
          <option value="NY">NY</option>
          <option value="ND">ND</option>
          <option value="OH">OH</option>
          <option value="OK">OK</option>
          <option value="OR">OR</option>
          <option value="PA">PA</option>
          <option value="RI">RI</option>
          <option value="SC">SC</option>
          <option value="SD">SD</option>
          <option value="TN">TN</option>
          <option value="TX">TX</option>
          <option value="UT">UT</option>
          <option value="VT">VT</option>
          <option value="VA">VA</option>
          <option value="WA">WA</option>
          <option value="WI">WI</option>  
          <option value="WV">WV</option>
          <option value="WY">WY</option>
          </select>
        </div>
        <div class ="col-lg-2">
            <label for="customerZip">Zip</label>
            <input type="text" class="form-control" name="customerZip" id="customerZip" value="' . $data[5] . '" required>
        </div>
      </div>
      <div style="height: 25px"></div>
      <div class="form-group row">
        <div class ="col-lg-4">
          <label for="customerDescription">Phone</label>
          <input type="text" class="form-control" name="customerPhone" id="customerPhone" value="' . $data[6] . '" required>
        </div>
        <div class ="col-lg-8">
          <label for="customerDescription">Email</label>
          <input type="text" class="form-control" name="customerEmail" id="customerEmail" value="' . $data[7] . '" required>
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
