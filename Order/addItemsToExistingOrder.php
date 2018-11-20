<?php
//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';
//SQL statement to get the record.
//Run the SQL statement and store the returned values in result.
//Create the header of the table.


$orderId = $_POST['id'];

$sql = "SELECT orders.orderId, vendor.vendorCode, vendor.vendorName, retailstore.storeCode, retailstore.storeName, orders.dateTimeOfOrder FROM orders, retailstore, vendor WHERE ((orders.orderId='{$orderId}') AND (orders.storeId = retailstore.storeId) AND (orders.vendorId = vendor.vendorId))";

$result= $conn->query($sql);

$data = mysqli_fetch_row($result);

$orderId = htmlspecialchars($data[0]);
$vendorCode = htmlspecialchars($data[1]);
$vendorName = htmlspecialchars($data[2]);
$storeCode = htmlspecialchars($data[3]);
$storeName = htmlspecialchars($data[4]);
$dateOfOrder = htmlspecialchars($data[5]);

$sql = "SELECT inventoryitem.itemId, inventoryitem.description, inventoryitem.itemCost FROM inventoryitem, vendor where ((vendor.vendorCode='{$vendorCode}') AND (inventoryitem.vendorId = vendor.vendorId) AND (inventoryitem.status = 'Active'))";


$result= $conn->query($sql);

$htmlString = "";

//echo '<option value="" disabled selected hidden>Items...</option>"';
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
	$id = htmlspecialchars($data[0]);
	$price = htmlspecialchars($data[2]);
	$value = htmlspecialchars($data[1]);
    $htmlString = $htmlString."<option value='$id' id='$id' price='$price'>$value</option>";
}


$sql = "SELECT * FROM orderdetail WHERE orderId='$orderId' ORDER BY ItemId";

$htmlString2 = "";

$sql = "SELECT orderdetail.orderId, orderdetail.itemId, inventoryitem.description, orderdetail.quantityOrdered, inventoryitem.itemCost FROM orderdetail, inventoryitem WHERE ((orderdetail.orderId='{$orderId}') AND (inventoryitem.itemId = orderdetail.itemId)) ORDER BY ItemId";

$result= $conn->query($sql);

$itemIndex = 0;

while($data = mysqli_fetch_row($result))
{   
    $htmlString2 = $htmlString2.'<tr><td name="itemDescTd">'.htmlspecialchars($data[2]).'</td><td id="Id'.$itemIndex.'">'.htmlspecialchars($data[1]).'</td><td id="Quant'.$itemIndex.'">'.htmlspecialchars($data[3]).'</td><td id="Price'.$itemIndex.'">$'.htmlspecialchars(($data[4]*$data[3])).'</td><td><input type="button" class="ibtnDel btn btn-md btn-danger " onclick="deleteRow()" value="Delete"></td></tr>';
	$itemIndex++; 
}

echo '<div class = "container">
		<div class="row">
			<div class ="col-lg-12">
				<h2 align="left">ADD ITEMS TO ORDER WHERE ID: '.$orderId.'</h2>
			</div>
		</div>
		<form class="form-horizontal">
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-5">
					<label for="vendorSelect">Vendor Name</label>
						<input type="text" class="form-control" name="vendorSelect" id="vendorName" onchange="setVendorName()" placeholder="Enter Vendor Code"  value= "'.$vendorName.'" disabled>
				</div>
				
				<div class ="col-lg-4">
					<label for="InputVendorCode">Vendor Code</label>
					<input type="text" class="form-control" name="InputVendorCode" id="vendorCode" onchange="setVendorName()" placeholder="Enter Vendor Code"  value= "'.$vendorCode.'" disabled>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
			<div class ="col-lg-5">
					<label for="storeSelect">Store Name</label>
					<input type="text" class="form-control" name="storeSelect" id="storeName" onchange="setStoreName()" placeholder="Enter Store Code"  value= "'.$storeName.'"  disabled>
				</div>
				<div class ="col-lg-4">
					<label for="InputStoreCode">Store Code</label>
					<input type="text" class="form-control" name="InputStoreCode" id="storeCode" onchange="setStoreName()" placeholder="Enter Store Code" value= "'.$storeCode.'"  disabled>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
			<div class ="col-lg-2">
					<label for="itemDescription">Item Description</label>
					<select class="form-control" name="itemDescription" id="itemDesc" onchange="setItemId()" >
						<option value="" disabled selected hidden>Items...</option>"
						'.$htmlString.'
					</select>
				</div>
			
				<div class ="col-lg-6">
					<label for="itemId">Item Id</label>
					<input type="text" class="form-control" name="itemId" id="itemId" onchange="setItemDesc()" placeholder="Enter Item ID" >
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-5">
					<label for="quanitiyOrdered">Quantity Ordered</label>
					<input type="text" class="form-control" name="quanitiyOrdered" id="qOrdered" placeholder="Enter Item quantity" >
				</div>
				
				<div class ="col-lg-2">
					<label for="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<button type="button" class="btn btn-success" name="button" onclick = "addItem()">Add Item to Order</button>
				</div>
			</div>
			<div style="height: 25px"></div>
			<div class="form-group row">
				<div class ="col-lg-8">
					<div class = "container" style="height: 200px; overflow-y: auto;">
						<table class="table" id="myTable" style="table-layout: fixed;  word-wrap: break-word; width: 100%;">
							<thead class="bg-secondary">
								<tr>
									<th scope="col">Item Desc</th>
									<th scope="col">Item ID</th>
									<th scope="col">Quantity</th>
									<th scope="col" id="totalPrice">Price:</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
						<tbody  id="tBody" style="background-color: white;">
						'.$htmlString2.'
							
						</tbody>
						</table>
					</div>
				</div>
				<div class ="col-lg-4">
					<button  type="button" onclick="sendToPHP()" name="button" class="btn btn-primary btn-lg btn-block spacing">Submit Order Information</button>
				</div>
			</div>
		</form>
		<div id="getIndexFromPhp" currentIndex= "'.$itemIndex.'" dateOfTheOrder="'.$dateOfOrder.'" orderId= "'.$orderId.'"></div>
	</div>';
//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
?>