function checkUsername(){
    const exp = /^[\w._]{7,20}$/;
    inputName = document.getElementById("username");
    var checkString = inputName.value;
    if(!exp.test(checkString)){
        alert('Please fill in your username. The name contains only alphabet characters, numbers and no special characters. The username length should be between 7 -20 characters.');
        inputName.focus();
        inputName.select();
        return false;
    }
    else return true;
}
function checkPassword(){
    const exp = /^(?=[^a-z]*[a-z])(?=\D*\d)[^:&.~\s]{8,20}$/;
    inputPassword = document.getElementById("password");
    var checkPW = inputPassword.value;
    if(!exp.test(checkPW)){
        alert('Please fill in your password. The password contains from 8-20 characters, at least 1 uppercase and 1 number.');
        inputPassword.focus();
        inputPassword.select();
        return false;
    }
    else return true;
}

function checkPassword2(){
    inputPassword = document.getElementById("password");
    inputPassword2 = document.getElementById("password2");
    checkPW1 = inputPassword.value;
    checkPW2 = inputPassword2.value;
    if(checkPW1!=checkPW2){
        alert('The password and confirmation must be the same.');
        inputPassword2.focus();
        inputPassword2.select();
        return false;
    }
    else return true;
    
}
function checkPhone(){
    const exp = /^[6-9]{1}[0-9]{7}$/;
    inputPhone = document.getElementById("phone");
    var checkPhone = inputPhone.value;
    if(!exp.test(checkPhone)){
        alert('Please fill in your phone number correctly. The phone number is consisted of 8 digits');
        inputPhone.focus();
        inputPhone.select();
        return false;
    }
    else return true;
}

function checkEmail(){
    const exp = /^[\w.-]+@(\w+\.){1,3}\w{2,3}$/;
    inputEmail = document.getElementById("email");
    var checkEmail = inputEmail.value;
    if(!exp.test(checkEmail)){
        alert('Your email is not correct');
        inputEmail.focus();
        inputEmail.select();
        return false;
    }
    else return true;
}
function reCheck(){
if(!checkName() || !checkPasword() || !checkPassword2() || !checkPhone() || !checkEmail()){
    return false;
    }
else return true;
}