<?php
    require("functions.php")
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration form<</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<form method="POST">  
    <h1>Registration</h1>
    <label>Username:</label>
    <input class="holder" name="signupName" type="text">
    <br>
    <br>
    <label>Password:</label>
    <input class="holder" name="singupPassword" type="password">

    <br>
    <input name="pagebutton" type="submit" value="Create">
</form> 
</body>
</html>