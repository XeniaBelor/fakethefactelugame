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
    <input class="holder" name="singupPassword" type="password" id="password1">
    <?php echo $singupPasswordError; ?>
    <br>
    <label> Repeat Password:</label>
    <input class="holder" name="singupPassword2" type="password" id="password2">
    <p id="validate-status"></p>

    <br>
    <input name="pagebutton" type="submit" value="Create">
</form> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/passwords.js"></script>
</body>
</html>