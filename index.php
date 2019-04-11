<?php

require("functions.php");

if (isset($_SESSION["userId"])){
    header('Location: public/homepage.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FakeTheFact</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/main.js"></script>

</head>
<body>

 <a href="/homepage.php">blabla</a>
    
    <h1>Fake the Fact</h1>

    <form method="POST">  
    <h1>Registration</h1>
    
    <label for="email">email:</label>
    <input class="holder" name="email" type="email" value="<?=$email;?>" required>
    <?php echo $emailerror; ?>

    <br>
    <label for="signupName">Username:</label>
    <input class="holder" name="signupName" type="text" value="<?=$signupName;?>" required>
    <?php echo $signupNameError; ?>

    <br>
    <label for="signupPassword">Password:</label>
    <input class="holder" name="signupPassword" type="password" id="password1">
    <?php echo $signupPasswordError; ?>
    <br>
    <label> Repeat Password:</label>
    <input class="holder" name="signupPassword2" type="password" id="password2">
    <p id="validate-status"></p>
    
    <br>
    <label for="signupAge">Age:</label>
	<select name="signupAge" id="signupAge" required>
	<option value="">Show</option>
	<option value="18-21">18-21</option>
    <option value="22-25">22-25</option>
    <option value="26-29">26-29</option>
    <option value="32-35">32-35</option>
	</select>

    <br>
    <label for="signupGender">Gender:</label>
	<select name="signupGender" id="signupGender" required>
	<option value="">Show</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	</select>


    <br>
    <input name="pagebutton" type="submit" value="Create">
</form> 

<!--Log in-->
<form method="POST">
    <h1>Log In</h1>
    <label for="loginName"></label>
    <input class="holder" name="loginName" type="text" value="<?=$loginName;?>" required>
    <?php echo $loginNameError; ?>
    <br>
    <label for="loginPassword">Password:</label>
    <input class="holder" name="loginPassword" type="password">
    <?php echo $loginPasswordError; ?>

    <input name="login" type="submit" value="Log in">
</form>


</body>
</html>