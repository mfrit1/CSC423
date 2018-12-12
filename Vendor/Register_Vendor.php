<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.

//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
		<div class="row">
			<div class ="col-lg-12">
				
				<h2 align="left">REGISTER A VENDOR</h2>
				
			</div>
		</div>
		<form class="form-horizontal" method="post" id = "myForm" action = "Register_Vendor_Submit.php"   >
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-12">
					<label for="InputVendorCode">Vendor Code</label>
					<input type="text" class="form-control" name="InputVendorCode" id="Code" placeholder="Enter Vendor Code" required>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-12">
					<label for="InputVendorName">Vendor Name</label>
					<input type="text" class="form-control" name="InputVendorName" id="Name" placeholder="Enter Vendor Name" required>
				</div>
			</div>

			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-12">
					<label for="InputVendorAddress">Vendor Address</label>
					<input type="text" class="form-control" name="InputVendorAddress" id="Address" placeholder="Enter Vendor Address" required>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-5">
					<label for="InputVendorCity">Vendor City</label>
					<input type="text" class="form-control" name="InputVendorCity" id="City" placeholder="Enter Vendor City" required>
				</div>
				<div class ="col-lg-2">
					<label for="stateSelect">Vendor State</label>
					<select class="form-control" name="stateSelect" id="State" selected="New York" required>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
				</div>
				<div class ="col-lg-5">
					<label for="InputVendorZip">Vendor Zip Code</label>
					<input type="text" class="form-control" name="InputVendorZip" id="Zip" placeholder="Enter Vendor Zip Code" required>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-6">
					<label for="InputVendorContactName">Contact Person Name</label>
					<input type="text" class="form-control" name="InputVendorContactName" id="PersonName" placeholder="Enter Vendor Contact Name" required>
				</div>
				<div class ="col-lg-6">
					<label for="InputVendorContactNumber">Contact Person Phone Number</label>
					<input type="text" class="form-control" name="InputVendorContactNumber" id="Phone" placeholder="Enter Vendor Contact Number" required>
				</div>
			</div>
			<div style="height: 25px"></div>
			<button type="submit" button name="submit" id="submit" class="btn btn-primary btn-lg btn-block spacing">Submit Vendor Information</button>
		</form>
	</div>';


//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>
