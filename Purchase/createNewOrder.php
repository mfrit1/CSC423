<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';
//SQL statement to get the record.
//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
		<div class="row">
			<div class ="col-lg-12">
				<h2 align="left">LOG A PURCHASE</h2>
			</div>
		</div>
		<form class="form-horizontal">
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-3">
					<label for="storeSelect">Store Name</label>
					<select class="form-control" name="storeSelect" id="storeName"  onchange="setStoreCode()">
					</select>
				</div>
				<div class ="col-lg-7">
					<label for="InputStoreCode">Store Code</label>
					<input type="text" class="form-control" name="InputStoreCode" id="storeCode" onchange="setStoreName()" placeholder="Enter Store Code">
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-10">
					<label for="InputCustomerCode">Customer ID</label>
					<input type="text" class="form-control" name="InputCustomerCode" id="customerId" placeholder="Enter Customer ID">
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-5">
					<label for="itemSelect">Item ID</label>
					<input type="text" class="form-control" name="itemSelect" id="itemId" placeholder="Enter Item ID">
				</div>
				<div class ="col-lg-5">
					<label for="quanitiyOrdered">Quantity Purchased</label>
					<input type="text" class="form-control" name="quanitiyOrdered" id="qOrdered" placeholder="Enter Item quantity">
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-4">
					<button  type="button" onclick="sendToPHP()" name="button" class="btn btn-primary btn-lg btn-block spacing">Submit Order Information</button>
				</div>
			</div>
		</form>
	</div>';
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>