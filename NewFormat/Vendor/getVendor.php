<?php

//Sets the database connection. This file must have your own DB information inside of it.
require '../DBInfo.php';

//SQL statement to get the record.
$sql = "SELECT * FROM vendor ORDER BY CHAR_LENGTH(vendorCode), vendorCode";

//Run the SQL statement and store the returned values in result.
$result= $conn->query($sql);

//Create the header of the table.
echo '<thead class="thead-dark">
      	<tr>
            <th colspan="5">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search by Vendor Code" aria-label="Search" id="searchBar" onkeyup="filterTable()">
                    <button type="button" class="btn btn-primary btn-lg">Search</button>
                </form>
            </th>
            <th colspan="5">
                <form class="form-inline my-2 my-lg-0" style="float: right;">
                <button type="button" class="btn btn-success" onclick="window.location.href = ';
                echo "'addVendor.html'";
                echo '">Add a Vendor   <i class="fa fa-plus"></i></button>
                </form>
            </th>
        </tr>
    </thead>
<thead class="thead-dark">
	<tr>
        <th scope="col">Vendor Code</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Zip</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Contact Name</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>';


//As long as there is another row to be processed, do the following loop. This adds all returned DB records to the table.
while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td scope='row'><b>$data[1]</b></td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center>$data[4]</td>";
    echo "<td align=center>$data[5]</td>";
    echo "<td align=center>$data[6]</td>";
    echo "<td align=center>$data[7]</td>";
    echo "<td align=center>$data[8]</td>";
    echo "<td align=center>$data[10]</td>";
    echo "<td align=center><button type='button' class='btn btn-warning' style='padding-right: 10px'><i class='fa fa-pencil'></i></button><div class='divider'></div><button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>";
    echo "</tr>";
}

//Close thae table tab. All this HTML will be put into a div on the main page.
echo '</tbody>'
?>
