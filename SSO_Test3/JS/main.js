function validate() {

	var name = document.getElementById('username').value;
	var pwd = document.getElementById('password').value;
	
	var xhttp = new XMLHttpRequest;
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = this.response;
				
              if(data == "error"){
              	alert('error')
              }
              else{
				alert('loggedin successfully')
				window.location.href = "http://ssosite3.live/single_sign_on_test/SSO_Test3/welcome.php";
			  };

		};
	};

	xhttp.open("POST", "http://sso.live/single_sign_on_test/SSO/validate_user.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.withCredentials = true;
	xhttp.send('name='+name+'&&pwd='+pwd);

}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  // d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  d.setTime(d.getTime() + (0.5 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function logout(){
	var xhttp = new XMLHttpRequest;
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
              	setCookie('_authTokens', '', 1);
				window.location.href = "http://ssosite3.live/single_sign_on_test/SSO_Test3/";
		};
	};

	xhttp.open("POST", "http://sso.live/single_sign_on_test/SSO/logout.php", true);
	xhttp.withCredentials = true;
	xhttp.send();
}

function is_loggedin(){
	var xhttp = new XMLHttpRequest;
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var data = JSON.parse(this.response);
				console.log(data);
              if(data.status == "false"){
              	// alert('error')
              }
              else{
              	setCookie('_authTokens', data.token, 1);
				window.location.href =  "http://ssosite3.live/single_sign_on_test/SSO_Test3/welcome.php";
			  };

		};
	};

	xhttp.open("POST", "http://sso.live/single_sign_on_test/SSO/is_loggedin.php", true);
	xhttp.withCredentials = true;
	xhttp.send();
}
if(getCookie('_authTokens') == undefined || getCookie('_authTokens') == ''){
	is_loggedin();
}
