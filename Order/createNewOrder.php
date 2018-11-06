<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';
//SQL statement to get the record.
//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
		<div class="row">
			<div class ="col-lg-12">
				
				<h2 align="left">CREATE AN ORDER</h2>
				
			</div>
		</div>
		<form class="form-horizontal" method="post" id = "myForm" action = "Create_Order_Submit.php"   >
			<div style="height: 25px"></div>
			<div class="form-group row">
			<div class ="col-lg-2">
					<label for="vendorSelect">Vendor Name</label>
					<select class="form-control" name="vendorSelect" id="vendorName"  onchange="setVendorCode()">
						
					</select>
				</div>
			
				<div class ="col-lg-6">
					<label for="InputVendorCode">Vendor Code</label>
					<input type="text" class="form-control" name="InputVendorCode" id="vendorCode" onchange="setVendorName()" placeholder="Enter Vendor Code">
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
			<div class ="col-lg-2">
					<label for="storeSelect">Store Name</label>
					<select class="form-control" name="storeSelect" id="storeName" onchange="setStoreCode()">
						
					</select>
				</div>
				<div class ="col-lg-6">
					<label for="InputStoreCode">Store Code</label>
					<input type="text" class="form-control" name="InputStoreCode" id="storeCode" onchange="setStoreName()" placeholder="Enter Store Code">
				</div>
				<div class ="col-lg-2">
					<label for="button">&nbsp;</label>
					<button type="button" class="btn btn-info" name="button" onclick = "setFields()">Lock in Store/Vendor</button>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
			<div class ="col-lg-2">
					<label for="itemDescription">Item Description</label>
					<select class="form-control" name="itemDescription" id="itemDesc" selected="New York" disabled>
						
					</select>
				</div>
			
				<div class ="col-lg-6">
					<label for="itemId">Item Id</label>
					<input type="text" class="form-control" name="itemId" id="itemId" placeholder="Enter Vendor Code" disabled>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-5">
					<label for="quanitiyOrdered">Quantity Ordered</label>
					<input type="text" class="form-control" name="quanitiyOrdered" id="qOrdered" placeholder="Enter Vendor City" disabled>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-6">
					<table class="table">
					<thead>
						<tr>
						<th scope="col">Item Name</th>
						<th scope="col">Item ID</th>
						<th scope="col">Quantity</th>
						<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					</table>
				</div>
			</div>
			<div style="height: 25px"></div>
			<button type="submit" button name="submit" id="submit" class="btn btn-primary btn-lg btn-block spacing">Create New Order</button>
		</form>
	</div>';
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>