<?php
require_once 'check_loggedin.php';
if(is_loggedin()){
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
        <link href="https://fonts.googleapis.com/css?family=Macondo+Swash+Caps&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
    </head>
    <body>
        <script src="JS/main.js"></script>
        <div class="div1">
            <div class="div2">
                <p class="para1">Hello!</p>
            </div>
            <div class="div3">
                <p class="para2">Good to see you here.</p>
            </div>
        </div>
    </body>
</html>



























        <a onclick="logout()"><button type="logout">Logout</button></a>