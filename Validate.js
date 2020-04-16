//this function validates our form and will be called when the form is submitted

	function validateForm() {
		var fname = document.forms["user_details"] ["first_name"].value;
		var lname = document.forms["user_details"] ["last_name"].value;
		var city = document.forms["user_details"] ["city_name"].value;
		// note user_details is the name of our form
		
		if (fname == null || lname == "" || city == "") {
			alert ("all details that are required were not suppplied");
			return false;
		}
		return true;
	}
