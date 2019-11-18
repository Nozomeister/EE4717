function showNav(){
	document.getElementById("drop-down").style.display="block";
}

function closeNav(){
	document.getElementById("drop-down").style.display="none";
}

function popup(){
	document.getElementById("login-popup").style.display="block";


}

//banner show different imgs
function showImg1(){
	document.getElementById("dot1").style.backgroundColor="#edb650";
	document.getElementById("dot2").style.backgroundColor="#ffffff";
	document.getElementById("dot3").style.backgroundColor="#ffffff";
	document.getElementById("bg1").style.display="block";
	document.getElementById("bg2").style.display="none";
	document.getElementById("bg3").style.display="none";
}

function showImg2(){
	document.getElementById("dot2").style.backgroundColor="#edb650";
	document.getElementById("dot1").style.backgroundColor="#ffffff";
	document.getElementById("dot3").style.backgroundColor="#ffffff";
	document.getElementById("bg2").style.display="block";
	document.getElementById("bg1").style.display="none";
	document.getElementById("bg3").style.display="none";
}
function showImg3(){
	document.getElementById("dot3").style.backgroundColor="#edb650";
	document.getElementById("dot2").style.backgroundColor="#ffffff";
	document.getElementById("dot1").style.backgroundColor="#ffffff";
	document.getElementById("bg3").style.display="block";
	document.getElementById("bg2").style.display="none";
	document.getElementById("bg1").style.display="none";
}

//index validate form
function validateName(){
	var name = document.getElementById("name");
	var regN = /^[a-zA-Z\s]+$/;
	if (!regN.test(name.value)){		
			alert('Invalid Name!');
			registerForm.name.focus();
			return false;
		}else{
			return true;
		}
}		

function validatePhone(){
	var phone= document.getElementById("phone");
	var regP= /^[1-9]?[0-9]{7}$/;
	if (!regP.test(phone.value)){		
			alert('Invalid Phone Number!');
			registerForm.phone.focus();
			return false;
		}else{
			return true;
		}
}


//payment validate form

function paymentType() {
	var x = document.getElementsByName('payment-type');
	var y;
	for (var i = 0, length = x.length; i < length; i++){
	 	if (x[i].checked)
		{
			y = x[i].value;
		}
	}

	if (y == "Cash"){
		var a = document.getElementsByName('card-no');
		var b =document.getElementsByName('card-type');
		var c =document.getElementsByName('owner');
		var d =document.getElementsByName('expiry-date');
		var e =document.getElementsByName('cvv');

		a[0].disabled =true;
		b[0].disabled =true;
		b[1].disabled =true;
		b[2].disabled =true;
		b[3].disabled =true;
		c[0].disabled =true;
		d[0].disabled =true;
		e[0].disabled =true;

		return true;	

		
	}else if (y == "Card"){
		var a = document.getElementsByName('card-no');
		var b = document.getElementsByName('card-type');
		var c = document.getElementsByName('owner');
		var d = document.getElementsByName('expiry-date');
		var e = document.getElementsByName('cvv');

		a[0].disabled =false;
		b[0].disabled =false;
		b[1].disabled =false;
		b[2].disabled =false;
		b[3].disabled =false;
		c[0].disabled =false;
		d[0].disabled =false;
		e[0].disabled =false;

		return true;
	}else{
		alert("Please Select A Payment Type!");
		return false;
	}
}

function validateCardNo() {
	var cardNo = document.getElementsByName("card-no");
	var regCN= /^[0-9]{16}$/;
	if (!regCN.test(cardNo[0].value)){		
			alert('Invalid Card Number!');
			paymentForm.card-no.focus();
			return false;
		}else{
			return true;
		}
}
function validateOwner() {
	var owner = document.getElementsByName("owner");
	var regOw = /^[a-zA-Z\s]+$/;
	if (!regOw.test(owner[0].value)){		
			alert('Invalid Owner Name!');
			paymentForm.owner.focus();
			return false;
		}else{
			return true;
		}
}

function validateCvv() {
	var cvv = document.getElementsByName("cvv");
	var regCv = /^[0-9]{3}$/;
	if (!regCv.test(cvv[0].value)){		
			alert('Invalid CVV Name!');
			paymentForm.cvv.focus();
			return false;
		}else{
			return true;
		}
}

function validateExpiry() {
	var exp = document.getElementsByName("expiry-date");
	var regEx = /^(0[1-9]|1[0-2]|[1-9])\/(1[4-9]|[2-9][0-9]|20[1-9][1-9])$/;
	if (!regCv.test(exp[0].value)){		
			alert('Invalid Expiry Date!');
			paymentForm.expiry-date.focus();
			return false;
		}else{
			return true;
		}
}











