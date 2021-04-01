window.onload = function(){
  var pass1 = document.getElementById("pass1");
  var pass2 = document.getElementById("pass2");

  var validate_password = function(){
    if(pass1.value != pass2.value){
      pass1.setCustomValidity("Please make sure both of your passwords are the same");
    }else if(pass1.value.length < 5){
      pass1.setCustomValidity("Please make you your password is at least 5 characters long");
    }
    else{
      pass1.setCustomValidity('');
    }
  }

    pass1.onchange = validate_password;
    pass2.onchange = validate_password;

}


