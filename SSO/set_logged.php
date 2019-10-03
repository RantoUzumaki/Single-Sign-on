<?php
 header("Access-Control-Allow-Origin: *");
include("jwt.php");
$sess = false;
if(isset($_GET['token'])){
	$time = time();
	$vals = JWT::decode($_GET['token'], 'secret_server_key');
	if($vals->expire > $time){
		$sess = true;
	}
}
if($sess = true){
	setcookie('_authToken', $_GET['token'], time() + (86400 * 30), "/");
	echo 'Logged In';
}
