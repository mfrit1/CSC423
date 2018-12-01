<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../../DBInfo.php';

//SQL statement to get the record.

if(isset(($_POST["id"]))){
$id = mysqli_escape_string($conn, $_POST["id"]);
$sql = "SELECT inventoryitem.itemId, inventoryitem.description, inventoryitem.size, inventoryitem.division, inventoryitem.department, inventoryitem.category, inventoryitem.itemCost, inventoryitem.itemRetail, inventoryitem.imageFileName, inventoryitem.vendorId, inventory.quantityInStock FROM inventoryitem, inventory, retailstore WHERE ((inventoryitem.status='Active') AND (inventory.itemId = inventoryitem.itemId) AND (retailstore.storeCode ='{$id}') AND (retailstore.storeId = inventory.storeId)) ORDER BY inventoryitem.itemId";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);

if(isset($_POST["check"])){
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
else{
	//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
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
		echo "<td align=center style='padding-top: 50px'>$data[10]</td>";
		echo "<td align=center><img src='../../FD Images/$data[8]' height='125px' width='125px' class='zoom'></td>";
		echo "</tr>";
	}
}
}

?>
