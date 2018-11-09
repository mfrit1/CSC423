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
				<div class ="col-lg-2">
					<label for="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<button type="button" class="btn btn-info" name="button" onclick = "setFields()">Lock/Unlock Vendor</button>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
			<div class ="col-lg-2">
					<label for="storeSelect">Store Name</label>
					<select class="form-control" name="storeSelect" id="storeName" onchange="setStoreCode()" disabled>
						
					</select>
				</div>
				<div class ="col-lg-6">
					<label for="InputStoreCode">Store Code</label>
					<input type="text" class="form-control" name="InputStoreCode" id="storeCode" onchange="setStoreName()" placeholder="Enter Store Code" disabled>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
			<div class ="col-lg-2">
					<label for="itemDescription">Item Description</label>
					<select class="form-control" name="itemDescription" id="itemDesc" onchange="setItemId()" disabled>
						
					</select>
				</div>
			
				<div class ="col-lg-6">
					<label for="itemId">Item Id</label>
					<input type="text" class="form-control" name="itemId" id="itemId" onchange="setItemDesc()" placeholder="Enter Item ID" disabled>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-5">
					<label for="quanitiyOrdered">Quantity Ordered</label>
					<input type="text" class="form-control" name="quanitiyOrdered" id="qOrdered" placeholder="Enter Item quantity" disabled>
				</div>
				
				<div class ="col-lg-2">
					<label for="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<button type="button" class="btn btn-success" name="button" onclick = "addItem()">Add Item to Order</button>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-6">
					<div class = "container" style="height: 200px; overflow-y: auto;">
						<table class="table" id="myTable" style="table-layout: fixed;  word-wrap: break-word; width: 100%;">
							<thead class="bg-secondary">
								<tr>
									<th scope="col">Item Desc</th>
									<th scope="col">Item ID</th>
									<th scope="col">Quantity</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
						<tbody  id="tBody" style="background-color: white;">
						
							
						</tbody>
						</table>
					</div>
				</div>
				<div class ="col-lg-6">
					<button type="submit" button name="submit" id="submit" class="btn btn-primary btn-lg btn-block spacing">Create New Order</button>
				</div>
			</div>
		</form>
	</div>';
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>