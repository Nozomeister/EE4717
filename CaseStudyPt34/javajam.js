
function sumMoney(){
    var numJava = parseFloat(document.getElementById("javaNumber").value);
    var numLait = parseFloat(document.getElementById("laitNumber").value);
    var numCap = parseFloat(document.getElementById("capNumber").value);

    javaMoney = numJava * 2.00;
    document.getElementById("javaMoney").value = javaMoney;

    if(document.querySelector('input[name = "cafLait"]:checked').value == "2.00"){
        var laitMoney = numLait * 2.00;
        document.getElementById("laitMoney").value = laitMoney;
        }
    else if (document.querySelector('input[name = "cafLait"]:checked').value == "3.00"){
        var laitMoney = numLait * 3.00;
        document.getElementById("laitMoney").value = laitMoney;
        }
    if(document.querySelector('input[name = "iceCap"]:checked').value == "4.75"){
        var capMoney = numCap * 4.75;
        document.getElementById("capMoney").value = capMoney;
        }
    else if (document.querySelector('input[name = "iceCap"]:checked').value == "5.75"){
        var capMoney = numCap * 5.75;
        document.getElementById("capMoney").value = capMoney;
        }
    var sumMoney = javaMoney + laitMoney + capMoney;
    document.getElementById("sumMoney").value = sumMoney;
}

function chkName(){
    var inputName = document.getElementById("name");
    var checkString = inputName.value;
    const exp = /^[A-Za-z\s]/;
    if(!exp.test(checkString)){
        alert('Please fill in your name. The name contains only alphabet characters and character space.');
        inputName.focus();
        inputName.select();
        return false;
    }
    else return true;
}

function chkEmail(){
    var inputEmail = document.getElementById("email");
    var checkEmail = inputEmail.value.toString();
    const exp = /^[\w.-]+@(\w+\.){1,3}\w{2,3}$/;
    if (!exp.test(checkEmail)){
        alert('Your email is not correct');
        inputEmail.focus();
        inputEmail.select();
        return false;
    }
    else return true;
}

function chkDate(){
    var inputDate = document.getElementById("startdate");
    var startDate = new Date(inputDate.value);
    var currentDate = new Date();
    if(startDate < currentDate){
        alert('You cannot select a date that is earlier than today!');
        inputDate.focus();
        inputDate.select();
        return false;

    }
    else return true;
}

function reCheck(){
    if(!chkName() || !chkEmail() || !chkDate()){
        return false;
        
    }
    else return true;
  

}