function validateForm() {
	 var x = document.forms["myForm"]["email"].value;
  var z = document.forms["myForm"]["phn"].value;
  var a = document.forms["myForm"]["state"].value;
  var phoneno = /^\d{10}$/;
  var emailmat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (z.match(phoneno)) {
      return true;
        }
      else
        {
        alert("Phone number incorrect");
        return false;
        }
        if (a.length > "2") {
    alert("State can only be 2 chars");
    return false;
}
  if (x.match(emailmat)) 
  	{
    return true;
  }
    alert("You have entered an invalid email address!")
    return false;
}

  }

