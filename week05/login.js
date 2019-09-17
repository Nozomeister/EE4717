function validateForm(){
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    if( (email.value.length > 0) && (password.value.length > 0)){
        return true;
    }
    else{
        alert('Please complete the form!');
        return false;
    }
}
//End of validateForm() function

function init(){
    if (document && document.getElementById){
        var loginForm = document.getElementById("LoginForm");
        loginForm.onsubmit = validateForm;
    }
}
window.onload = init;