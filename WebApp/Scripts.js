		function checkCode(elem) {
			var elemPattern = /^\d+$/;
			var re = new RegExp(elemPattern);
			if(!re.test(elem.value))
			{
				alertText = alertText.concat("\nCode");
			}
		}
		
		function checkName(elem) {
			var elemPattern = /^[A-Za-z0-9\ -]+$/;
			var re = new RegExp(elemPattern);
			if(!re.test(elem.value))
			{
				alertText = alertText.concat("\nName");
			}
		}
		
		function checkAddress(elem) {
			var elemPattern = /^[A-Za-z0-9-\ ]+$/;
			var re = new RegExp(elemPattern);
			if(!re.test(elem.value))
			{
				alertText = alertText.concat("\nAddress");
			}
		}
		
		function checkCity(elem) {
			var elemPattern = /^[A-Za-z]+([A-Za-z]*[- ][A-Za-z]+)*$/;
			var re = new RegExp(elemPattern);
			if(!re.test(elem.value))
			{
				alertText = alertText.concat("\nCity");
			}
		}
		
		function checkZip(elem) {
			var elemPattern = /^\d{5}$/;
			var re = new RegExp(elemPattern);
			if(!re.test(elem.value))
			{
				alertText = alertText.concat("\nZip");
			}
		}
		
		function checkPhone(elem) {
			var elemPattern = /^([0-9]{3}-[0-9]{3}-[0-9]{4})$/;
			var re = new RegExp(elemPattern);
			if(!re.test(elem.value))
			{
				alertText = alertText.concat("\nPhone");
			}
		}