<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../../DBInfo.php';

//SQL statement to get the record.
$startDate = mysqli_escape_string($conn, $_POST['startDate']);
$endDate = mysqli_escape_string($conn, $_POST['endDate']);

if(isset(($_POST["id"]))) {

	$id = mysqli_escape_string($conn, $_POST["id"]);

	$sqlQuery2 = "SELECT DISTINCT itemId, description, size, division, department, category, itemCost, itemRetail, imageFileName, vendorId, 
	SUM(returnedQuantity) AS returned
	FROM(SELECT inventoryitem.itemId, inventoryitem.description, inventoryitem.size, inventoryitem.division, inventoryitem.department, 
	inventoryitem.category, inventoryitem.itemCost, inventoryitem.itemRetail, inventoryitem.imageFileName, inventoryitem.vendorId, 
	returntovendordetail.quantityReturned AS returnedQuantity,
	returntovendordetail.returnToVendorId
	FROM inventoryitem, inventory, retailstore, returntovendor, returntovendordetail
	WHERE (inventoryitem.status='Active')
	AND (inventory.itemId = inventoryitem.itemId)
	AND (retailstore.storeCode = '{$id}')
	AND (retailstore.storeId = inventory.storeId)
	AND (returntovendor.dateTimeOfReturn BETWEEN '{$startDate}' AND '{$endDate}')
	AND (returntovendor.storeId = '{$id}')
	AND (inventory.itemId = returntovendordetail.itemId)
	AND (returntovendor.returnToVendorId = returntovendordetail.returnToVendorDetailId)
	GROUP BY returntovendordetail.returnToVendorId
	ORDER BY quantityReturned) AS table1
	GROUP BY itemId
	ORDER BY returned DESC
	LIMIT 10";
	
	if(isset($_POST["check"]))
	{
		
		$sql;
		

			$sql = "SELECT DISTINCT itemId, description, size, division, department, category, itemCost, itemRetail, imageFileName, 
	SUM(returnedQuantity) AS returned
	FROM(SELECT inventoryitem.itemId, inventoryitem.description, inventoryitem.size, inventoryitem.division, inventoryitem.department, 
	inventoryitem.category, inventoryitem.itemCost, inventoryitem.itemRetail, inventoryitem.imageFileName, inventoryitem.vendorId, 
	returntovendordetail.quantityReturned AS returnedQuantity,
	returntovendordetail.returnToVendorId
	FROM inventoryitem, inventory, retailstore, returntovendor, returntovendordetail
	WHERE (inventoryitem.status='Active')
	AND (inventory.itemId = inventoryitem.itemId)
	AND (retailstore.storeCode = '{$id}')
	AND (retailstore.storeId = inventory.storeId)
	AND (returntovendor.dateTimeOfReturn BETWEEN '{$startDate}' AND '{$endDate}')
	AND (returntovendor.storeId = '{$id}')
	AND (inventory.itemId = returntovendordetail.itemId)
	AND (returntovendor.returnToVendorId = returntovendordetail.returnToVendorDetailId)
	GROUP BY returntovendordetail.returnToVendorId
	ORDER BY quantityReturned) AS table1
	GROUP BY itemId
	ORDER BY returned DESC
	LIMIT 10";

		//echo $sql;
		$result= $conn->query($sql);
		$exp_table = "CSV/ListAllInventoryItems"; // Table to export
			// Create and open new csv file
			$csv  = $exp_table . "-" . date('d-m-Y-his') . '.csv';
			$file = fopen($csv, 'w');
			// Get the table
			if (!$result)
				printf("Error: %s\n", $conn->error);
				// Get column names 
				while ($column = mysqli_fetch_field($result)) {
					$column_names[] = $column->name;
				}
				
				// Write column names in csv file
				if (!fputcsv($file, $column_names))
					die('Can\'t write column names in csv file');
				
				// Get table rows
				while ($row = mysqli_fetch_row($result)) {
					// Write table rows in csv files
					if (!fputcsv($file, $row))
						die('Can\'t write rows in csv file');
				}

			fclose($file);
				echo '<button type="button" class="btn btn-success" onclick= "window.location.href=\''.$csv.'\'">Download</button>'; 
	}
	
	else
{

		$sql = "SELECT DISTINCT itemId, description, size, division, department, category, itemCost, itemRetail, imageFileName, vendorId, 
	SUM(returnedQuantity) AS returned
	FROM(SELECT inventoryitem.itemId, inventoryitem.description, inventoryitem.size, inventoryitem.division, inventoryitem.department, 
	inventoryitem.category, inventoryitem.itemCost, inventoryitem.itemRetail, inventoryitem.imageFileName, inventoryitem.vendorId, 
	returntovendordetail.quantityReturned AS returnedQuantity,
	returntovendordetail.returnToVendorId
	FROM inventoryitem, inventory, retailstore, returntovendor, returntovendordetail
	WHERE (inventoryitem.status='Active')
	AND (inventory.itemId = inventoryitem.itemId)
	AND (retailstore.storeCode = '{$id}')
	AND (retailstore.storeId = inventory.storeId)
	AND (returntovendor.dateTimeOfReturn BETWEEN '{$startDate}' AND '{$endDate}')
	AND (returntovendor.storeId = '{$id}')
	AND (inventory.itemId = returntovendordetail.itemId)
	AND (returntovendor.returnToVendorId = returntovendordetail.returnToVendorDetailId)
	GROUP BY returntovendordetail.returnToVendorId
	ORDER BY quantityReturned) AS table1
	GROUP BY itemId
	ORDER BY returned DESC
	LIMIT 10";

		//echo $sql;
		$result= $conn->query($sql);
		
			while($data = mysqli_fetch_row($result))
			{   
				echo "<tr id='$data[0]' height='130px'>";
				echo "<td scope='row' style='padding-top: 50px'><b>$data[0]</b></td>";
				echo "<td align=center  style='padding-top: 50px; max-width: 100px'>$data[1]</td>";
				echo "<td align=center style='padding-top: 50px;'><a>$data[2]</a></td>";
				echo "<td align=center style='padding-top: 50px'>$data[3]</td>";
				echo "<td align=center style='padding-top: 50px'>$data[4]</td>";
				echo "<td align=center style='padding-top: 50px'>$data[5]</td>";
				echo "<td align=center style='padding-top: 50px'>$data[6]</td>";
				echo "<td align=center style='padding-top: 50px'>$data[7]</td>";
				echo "<td align=center><img src='../../FD Images/$data[8]' height='125px' width='125px' class='zoom'></td>";
				echo "<td align=center style='padding-top: 50px'>$data[10]</td>";
				echo "</tr>";
			}
}
	
}

?>
