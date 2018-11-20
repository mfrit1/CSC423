<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.

//Run the SQL statement and store the returned values in result.
//Create the header of the table.
echo '<div class = "container">
		
		<div class="row">
			<div class ="col-lg-12" align="center">
				<font size="6">Vendor is now registered.</font>
			</div>
		</div>
		<div style="height: 20px"></div>
		<div class="row">
			<div class ="col-lg-12" align="center">
				<font size="6">Their Temporary Password can be seen down below.</font>
			</div>
		</div>
		<div style="height: 150px"></div>
		<div class="row">
			<div class ="col-lg-12" align="center" id="passwordSpot">
			</div>
		</div>
		<div style="height: 10%"></div>
		<div class="row">
			<div class ="col-lg-12" align="center">
			<button type="button" align="center" class="btn btn-success" onclick="backToNormalTable()";">Back to Vendor</button>
			</div>
		</div>
	</div>';

?>
