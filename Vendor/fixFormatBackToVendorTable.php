<?php

require '../DBInfo.php';
echo '<div class="col-lg-12" style="text-align: center">
          <div style="text-align: center" >
            <table class="table table-bordered" style="max-width: 80% " align="center" >
              <thead class="thead-dark">
                <tr>
                  <th colspan="5">
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search by Vendor Code" aria-label="Search" id="searchBar" onkeyup="filterTable()">
                      <button type="button" class="btn btn-primary btn-lg">Search</button>
                    </form>
                  </th>
                  <th colspan="5">
                    <form class="form-inline my-2 my-lg-0" style="float: right;">
                    <button type="button" class="btn btn-success" onclick="addVendorStart();">Add a Vendor</button>
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
                  <th scope="col" wdith="200px">Action</th>
                </tr>
              </thead>
              <tbody id = "vendorTable">
              </tbody>
            </table>

          </div>
  		<!-- <div class="col-lg-1"></div> -->
  		</div>';
?>