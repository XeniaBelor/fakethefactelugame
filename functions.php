<?php

$mysqli= new mysqli("localhost","root","","fakethefact");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
    
$signupName = $singupPassword = $signupNameError = $singupPasswordError = $singupPassword2 = "";

//REGISTRATION
//USERNAME
if (isset ($_POST["signupName"])) {
    if (empty ($_POST["signupName"])) {
        //If nothing is entered
        $signupNameError = "This field is required!";
    } else {
        //IF everything is okay
        $signupName = $_POST["signupName"];
    }
    //Check how short is username
    if (strlen ($_POST["signupName"]) >15)
    $signupNameError = "The username can not be longer than 15 characters.";
    //Check how if speacia character
    if (preg_match("/[!\'^£$%&*()}{@#~?><>,|=_+¬-]/", $_POST["signupName"]))
    $signupNameError = "Username can not consist speacial characters";
}
//PASSWORD
if(isset ($_POST["singupPassword"])) {
	if (empty ($_POST["singupPassword"])) {
	$singupPasswordError = "This field is required!";
	} else {
	if (strlen ($_POST["singupPassword"]) <6)
    $singupPasswordError = "Password must be at least 6 characters!";
    }
    if ($_POST["singupPassword"]!= $_POST["singupPassword2"])
    $singupPasswordError = "Passwords DO NOT MATCH!!!";
    }
?>