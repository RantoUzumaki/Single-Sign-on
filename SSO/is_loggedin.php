<?php
 $allowed_urls = ["http://ssosite1.live", "http://ssosite2.live", "http://ssosite3.live"];
 $http_origin = $_SERVER['HTTP_ORIGIN'];
if (in_array($http_origin, $allowed_urls))
{  
    header("Access-Control-Allow-Origin: $http_origin");
}
 header("Access-Control-Allow-Credentials: true");
include("jwt.php");
$sess = false;
if(isset($_COOKIE['_authToken'])){
	$time = time();
	$vals = JWT::decode($_COOKIE['_authToken'], 'secret_server_key');
	if($vals->expire > $time){
		$sess = true;
	}
}
if($sess == true){
	$arr = [
		"status" => "true",
		"token" => $_COOKIE['_authToken']
	];
}else{
	$arr = [
		"status" => "false"
	];
}
echo json_encode($arr);