<?php
 $allowed_urls = ["http://ssosite1.live", "http://ssosite2.live", "http://ssosite3.live"];
 $http_origin = $_SERVER['HTTP_ORIGIN'];
if (in_array($http_origin, $allowed_urls))
{  
    header("Access-Control-Allow-Origin: $http_origin");
}
 header("Access-Control-Allow-Credentials: true");
include("db_connection.php");
include("jwt.php");
 
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
     $myusername=mysqli_real_escape_string($conn,$_POST['name']); 
     $mypassword=mysqli_real_escape_string($conn,$_POST['pwd']); 
 
     $sql="SELECT * FROM registeration_details WHERE username='$myusername' and password='$mypassword'";
     $result=mysqli_query($conn,$sql);
     $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    
     $count=mysqli_num_rows($result);
     $time = time() + (86400 * 30);
     $token = [
        "user" => $myusername,
        "email" => $row['email'],
        "expire" => $time,
        "id" => $row['id']
     ];
     $_POST['token'] = JWT::encode($token, 'secret_server_key');
     $cookie_value = $_POST['token'];
     setcookie('_authToken', $cookie_value, time() + (86400 * 30), "/");

     $token = JWT::decode($_POST['token'], 'secret_server_key');

     

    if($count==1)
    {
       echo  $_POST['token'];    
    }
    else 
    {
        echo "error";
    }
  }
?>