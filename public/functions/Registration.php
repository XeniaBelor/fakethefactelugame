<?php

$signupEmailError = "";
$signupEmail = "";
if (isset ($_POST["signupEmail"])) {
    $db= mysqli_connect("localhost","u251068829_azabu","aPyPapuNuG","u251068829_ybaja");
    $signupEmail = $_POST['signupEmail'];
    $sql_u = "SELECT * FROM registration WHERE email = '$signupEmail'";
    $res_u = mysqli_query($db,$sql_u) or die (mysqli_error($db));
    if (mysqli_num_rows($res_u) > 0) {
        $signupEmailError = "Email already exists!";
    }   else {
        $signupEmail = $_POST["signupEmail"];
    }
}

$signupPasswordError = "";
$signupPassword = "";
if(isset ($_POST["signupPassword"])) {
    if (empty ($_POST["signupPassword"])) {
    $signupPasswordError = "This field is required!";
    } else {
    if (strlen ($_POST["signupPassword"]) <6)
    $signupPasswordError = "Length at least 6 char!";
    }
    if ($_POST["signupPassword"]!= $_POST["signupPassword2"])
    $signupPasswordError = "Passwords don't match!";
}

$signupUsernameError = "";
$signupUsername = "";
if (isset ($_POST["signupUsername"])) {
    $db= mysqli_connect("localhost","u251068829_azabu","aPyPapuNuG","u251068829_ybaja");
    $signupUsername = $_POST['signupUsername'];
    $sql_u = "SELECT * FROM registration WHERE username = '$signupUsername'";
    $res_u = mysqli_query($db,$sql_u) or die (mysqli_error($db));
    if (mysqli_num_rows($res_u) > 0) {
        $signupUsernameError = "Username already exists!";
    }   else {
        $signupUsername = $_POST["signupUsername"];
    }
    if (preg_match("/[!\'^£$%&*()}{@#~?><>,|=_+¬-]/", $_POST["signupUsername"]))
    $signupUsernameError = "Speacial char not allowed!";
}

if ( isset($_POST["signupEmail"]) && 
     isset($_POST["signupPassword"]) &&
     isset($_POST["signupUsername"]) &&
     isset($_POST["signupAge"]) &&
     $signupEmailError == "" && 
     empty($signupPasswordError)&&
     $signupUsernameError == ""
)

{
$signupPassword  = hash("sha512", $_POST["signupPassword"]);
$User->signup($signupEmail, $signupPassword, $signupUsername, $_POST["signupAge"]);
}

$notice = "";
if (	isset($_POST["loginEmail"]) && 
        isset($_POST["loginPassword"]) && 
        !empty($_POST["loginEmail"]) && 
        !empty($_POST["loginPassword"]) 
)

{
$notice = $User->login($_POST["loginEmail"], $_POST["loginPassword"]);    
}

?>