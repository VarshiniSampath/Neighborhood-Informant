	var serverResponse;
	var response;
	function showLoginPage(){
		// jQuery("#loginPage").show();
		$('#loginPage').addClass("md-show");
		$('.overlay').css("display","block");
	}
	function hideLoginPage(){
		$('#loginPage').removeClass("md-show");
		$('.overlay').css("display","none");
	}
	function showRegisterPage(){
		$('#registerPage').addClass("md-show");
		$('.overlay').css("display","block");
	}
	function hideRegisterPage(){
		$('#registerPage').removeClass("md-show");
		$('.overlay').css("display","none");
	}
	function validateLogin() {	  
		var xmlhttp = new XMLHttpRequest();
		var username = document.getElementById("loginEmail").value;
		var password = document.getElementById("loginPwd").value;
		alert(username);
		alert(password);
		if(username.length>0 && password.length>0){
			xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	          	serverResponse = xmlhttp.responseText;
				if(serverResponse.length>0 && !(serverResponse==="false")){
					hideLoginPage();
					$(".username").html("Welcome, "+serverResponse+"!");
					$("#loginBtn").hide();
				}
				else{
					$("#loginErrorMsg").html("Username or password is incorrect. Please try again.");
				}
	        }
			}
			xmlhttp.open("GET", "userlogin/login.php?username=" + username + "&password=" + password, true);
			xmlhttp.send();
		}
		else{
			hideLoginPage();
		}
	}
	function signUp(){
		var userName = document.getElementById("userName").value.trim();
		var userMail = document.getElementById("userMail").value.trim();
		var userPassword = document.getElementById("userPassword").value.trim();
		var retype = document.getElementById("retypePwd").value.trim();
		if((userMail.indexOf('@')!==-1) && (userMail.indexOf('.')!==-1) && (userPassword===retype)){
			registerNewUser(userMail, userName, userPassword);
		}
	}
	function registerNewUser(email, name, pwd){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	          	serverResponse = xmlhttp.responseText;
				alert(serverResponse);
				if(serverResponse.length>0 && (serverResponse=="alreadyexists")){
					$("#registerErrorMsg").html("Account already exists for this email id.");
				}
				else if(serverResponse.length>0 && !(serverResponse=="false")){
					hideRegisterPage();
					$(".username").html("Welcome, "+serverResponse+"!");
					$("#registerBtn").hide();
					$("#loginBtn").hide();
				}
				else{
					$("#registerErrorMsg").html("Something went wrong. Please enter the details again.");
				}
	        }
	    }
		xmlhttp.open("GET", "userlogin/registeruser.php?email=" + email + "&username=" + name + "&password=" + pwd, true);
	    xmlhttp.send();
	}

	$(document).keyup(function(e) {
     if (e.keyCode == 27) { 
        hideLoginPage();
        hideRegisterPage();
    }
    $(".overlay").click(function(){
    	alert("here");
    	hideLoginPage();
        hideRegisterPage();
    });
    
});
