<?php
 $allowed_urls = ["http://ssosite1.live", "http://ssosite2.live", "http://ssosite3.live"];
 $http_origin = $_SERVER['HTTP_ORIGIN'];
if (in_array($http_origin, $allowed_urls))
{  
    header("Access-Control-Allow-Origin: $http_origin");
}
 header("Access-Control-Allow-Credentials: true");

setcookie("_authToken", "", time() - 3600, "/");
 ?>