<?php
    
    require("functions.php");
    require("class/User.class.php");
    $User = new User($mysqli);
    require("functions/Registration.php");

    if(isset ($_SESSION["userId"])) {
		header("Location: homepage.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up and login</title>
    <link rel="stylesheet" type="text/css" href="style/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    
    <h1 class="page-title">Fake the Fact</h1>
    <div class="container">

        <div>
        <form method="POST">
                <h1 class="signup-title">Log in</h1>
                
                <label for="loginEmail">Email</label><br>
                <input class="holder" name="loginEmail" type="email" require> 

                <br>
                <label for="loginPassword">Password</label><br>
                <input class="holder" name="loginPassword" type="password"> 
                <br>
                <p class="attention-error"><?=$loginEmailError;?></p>
                <p  class="attention-error"><?=$notice;?></p>
                
                <br>
                <button type="submit" class="submit-button">Login</button>
            </form>        
        </div>

        <div>
            <h1>or</h1>
        </div>

        <div>
        <form method="POST">  
                <h1 class="signup-title">Registration</h1>
                
                <label for="signupEmail">Email</label><br>
                <input class="holder" name="signupEmail" type="email" value="<?=$signupEmail;?>">
                <p class="attention-error"><?=$signupEmailError;?></p>
            
                <label for="signupPassword">Password</label><br>
                <input class="holder" name="signupPassword" type="password" id="password1">
                <br>
                
                <label>Repeat Password</label><br>
                <input class="holder" name="signupPassword2" type="password" id="password2">
                <p id="validate-status"></p>
                <p class="attention-error"><?php echo $signupPasswordError;?></p>
                
                <label for="signupUsername">Username</label><br>
                <input id="username" class="holder" name="signupUsername" type="text" value="<?=$signupUsername;?>" required> 
                <p class="attention-error"><?php echo $signupUsernameError; ?></p>

                <label for="signupAge">Age</label><br>
                <select name="signupAge" id="signupAge" required>
                    <option value="">Show</option>
                    <option value="hide">hide</option>
                    <option value="18-22">18-22</option>
                    <option value="23-27">23-27</option>
                    <option value="28-32">28-32</option>
                    <option value="33-37">33-37</option>
                    <option value="38-42">38-42</option>
                    <option value="43-47">43-47</option>
                    <option value="48-52">48-52</option>
                    <option value="53-57">53-57</option>
                    <option value="58-62">58-62</option>
                    <option value="Over 63">Over 63</option>
                </select>
                
                <br>
                <button type="submit" class="submit-button">Sign up</button>
            </form>        
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
        $("#password2").keyup(validate);
        });
        function validate() {
            var password1 = $("#password1").val();
            var password2 = $("#password2").val();
            if(password1 == password2) {
                $("#validate-status").text("Passwords match.");        
            }
            else {
                $("#validate-status").text("Password do not match!");  
            }
        } 
    </script>

</body>
</html>