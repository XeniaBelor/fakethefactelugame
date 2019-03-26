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
    
    <label for="signupName">Username:</label>
    <!--value=signupName will allow text not to dissaper when error appears -->
    <input class="holder" name="signupName" type="text" value="<?=$signupName;?>">
    <!--If smth is wron appears error-->
    <?php echo $signupNameError; ?>

    <br>
    <label for="singupPassword">Password:</label>
    <input class="holder" name="singupPassword" type="password">
    <?php echo $singupPasswordError; ?>

    <br>
    <input name="pagebutton" type="submit" value="Create">
</form> 
</body>
</html>