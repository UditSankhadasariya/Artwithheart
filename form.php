<?php
	if(isset($_POST['user'])){
	if($_POST['user'] = udit){
	echo "congratulations";
}else{
	echo "not udit";
}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Fill  the details</title>
	<script type="text/javascript">
		function restrict(element){
				var ud = document.getElementById(element);
				var r = new RegExp;
				if(element==username){
					r=/[^a-z0-9]/gi;
				}elseif(element==email){
					r=/[' "]/gi;
				}

				ud.value = ud.value.replace(r, "");
		}

		function emptyElement(x){
			document.getElementById(x).innerHTML = "";
		}

		function ucheck(){
			var u = document.getElementById(username).value;
			if(u!=""){
				document.getElementById(user_status).innerHTML = 'checking.....';
				var udit = XMLHttpRequest();
				udit.open("POST","form.php",true);
				udit.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				udit.onreadystatechange function(){
						if(udit.readyState==4&& udit.status==200){
							document.getElementById(user_status).innerHTML=udit.responseText;
						}
				}
				udit.send("user="+u);
			}
		}

		function openTerms(){
			document.getElementById(terms).style.display="block";
			emptyElement('status');
		}

		function signup(){
			var u = document.getElementById(username).value;
			var p = document.getElementById(pass1).value;
			var e = document.getElementById(email).value;
			var status = document.getElementById(status);
			if(p=""){
				status.innerHTML="Enter password";
			}elseif(document.getElementById(terms).style.display="none"){
				document.getElementById(status).innerHTML="view the terms and conditions";
			}else{
				document.getElementById(status).innerHTML="congratulations";
			}

		}
	</script>
</head>
<body>

	<form name="signupform" id="signupform" onsubmit="return false;">
	    <div>Username: </div>
	    <input id="username" type="text" onblur="ucheck()" onkeyup="restrict('username')" maxlength="16">
	    <span id="user_status"></span>
	    <div>Email Address:</div>
	    <input id="email" type="text" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88">
	    <div>Create Password:</div>
	    <input id="pass1" type="password" onfocus="emptyElement('status')" maxlength="16">
	    <div>Confirm Password:</div>
	    <input id="pass2" type="password" onfocus="emptyElement('status')" maxlength="16">
	    <div>Gender:</div>
	    <select id="gender" onfocus="emptyElement('status')">
	      <option value=""></option>
	      <option value="m">Male</option>
	      <option value="f">Female</option>
	    </select>
	    <div>Country:</div>
	    <div>
	      <a href="#" onclick="return false" onmousedown="openTerms()">
	        View the Terms Of Use
	      </a>
	    </div>
	    <div id="terms" style="display:none;">
	      <h3>Web Intersect Terms Of Use</h3>
	      <p>1. Play nice here.</p>
	      <p>2. Take a bath before you visit.</p>
	      <p>3. Brush your teeth before bed.</p>
	    </div>
	    <br /><br />
	    <button id="signupbtn" onclick="signup()">Create Account</button>
	    <span id="status"></span>
	  </form>
</body>
</html>