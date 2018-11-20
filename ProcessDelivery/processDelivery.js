  function loadDoc(url, cFunction, params) {
 // params = params || 0;
//Creates an object to run php file
  var xhttp;
  xhttp=new XMLHttpRequest();
  //HERE is when the program actually switches over to the php and runs the file.
  xhttp.open("POST", url, true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send(params);
  
  //This tells the program to run the following code once the php file has run.
  xhttp.onreadystatechange = function() {

    //A ready status of both 4 and 200 mean that the php file ran okay, meaning no errors.
    if (this.readyState == 4 && this.status == 200) {
      //cFunction can change depending on what the user enters as a parameter.
        cFunction(this);
		
    }
  };
}

function createReturnStart(){
	console.log(document.getElementById("orderNumber").value);
 loadDoc('getDelivery.php', makeTable, "orderNumber="+document.getElementById("orderNumber").value);
  //By doing this, we take whatever strings have been echoed by the php file and put it into our current webpage. No need to load a whole new page, It edits the one we are currently on.
}

function makeTable(xhttp){
  //By doing this, we take whatever strings have been echoed by the php file and put it into our current webpage. No need to load a whole new page, It edits the one we are currently on.
  document.getElementById("outsideMainContainer").innerHTML = xhttp.responseText;
}

// function filterTable() {
//   var input, filter, table, tr, td, i;
//   input = document.getElementById("searchBar");
//   filter = input.value;
//   console.log(filter);
//   table = document.getElementById("returnTable");
//   tr = table.getElementsByTagName("tr");
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[0];
//     if (td) {
//       console.log(td.innerHTML)
//       if (td.innerHTML.indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }       
//   }
// }

// function getTodayDate()
// {
// 	var today = new Date();
// 	var dd = today.getDate();
// 	var mm = today.getMonth()+1; //January is 0!
// 	var yyyy = today.getFullYear();

// 	if(dd<10) {
// 		dd = '0'+dd
// 	} 

// 	if(mm<10) {
// 		mm = '0'+mm
// 	} 

// 	today = mm + '/' + dd + '/' + yyyy;
// 	return today;
//}

function sendToPHP(){
	if(createReturn && checkFunctions())
	{
		var vendorCode = "vendorCode=" + document.getElementById("vendorCode").value; 
		var storeCode = "storeCode=" + document.getElementById("storeCode").value;
		var totalIds = "idCount=" + itemTotal;
		var todayDate = "date=" + getTodayDate();
		var send = vendorCode + "&" + storeCode + "&" + totalIds + "&" + todayDate + "&" + turnTableToArray();
		$(document).ready(loadDoc('submitReturn.php', endMessage, send));
	}
	else if(checkFunctions() && !createOrder)
	{
		var returnToVendorId = "returnToVendorId=" + document.getElementById("getIndexFromPhp").getAttribute("returnToVendorId");
		var vendorCode = "vendorCode=" + document.getElementById("vendorCode").value; 
		var storeCode = "storeCode=" + document.getElementById("storeCode").value;
		var totalIds = "idCount=" + itemTotal;
		var todayDate = "date=" + document.getElementById("getIndexFromPhp").getAttribute("dateOfTheOrder");
		var send = returnToVendorId + "&" + vendorCode + "&" + storeCode + "&" + totalIds + "&" + todayDate + "&" + turnTableToArray();
		$(document).ready(loadDoc('submitReturn.php', endMessage, send));
	
	}
	
}

function endMessage(xhttp){
	alert("Return has been processed");
	itemIds = [];
	itemIndex = 0;
	itemTotal = 0;
	fieldCheck = true;
	alertText= '';
	window.location.href = ".";
}
