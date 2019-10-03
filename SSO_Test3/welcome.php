<?php
require_once 'check_loggedin.php';
if(is_loggedin()){
    echo 'Logged in';
}else{
    header("location:login.php");
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <link rel="stylesheet" href="CSS/welcome.css">
    </head>
    <body>
        <script src="JS/main.js"></script>
        <h1>Welcome App 3</h1>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a onclick="logout()"><button type="logout">Logout</button></a>
    </body>
</html>