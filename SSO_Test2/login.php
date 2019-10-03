<?php
require_once 'check_loggedin.php';
if(is_loggedin()){
    header("location:welcome.php");
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Form</title>
        <link rel="stylesheet" href="CSS/login.css">
    </head>
    <body>
        <script src="JS/main.js"></script>
        <div class="div1">
            <div class="div2">
                <div class="div3">
                    <p class="para1">Login</p>
                </div>
                <div class="div4">
    			    <input class="in1" id="username" type="text" name="username" placeholder="Username">
                </div>
                <div class="div5">
    			    <input class="in2" id="password" type="password" name="password" placeholder="Password">
                </div>
                <div class="div6">
    			    <button onclick="validate()" class="button1" type="submit">Login</button>
                </div>
            </div>
        </div>
    </body>
</html>