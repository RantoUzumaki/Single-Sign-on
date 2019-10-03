<?php
include("jwt.php");
function is_loggedin(){
	$sess = false;
	if(isset($_COOKIE['_authTokens']) and $_COOKIE['_authTokens'] != ''){
		$time = time();
		$vals = JWT::decode($_COOKIE['_authTokens'], 'secret_server_key');
		if($vals->expire > $time){
			$sess = true;
		}
	}
	return $sess;
}