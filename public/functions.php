<?php

$mysqli= new mysqli("localhost","u251068829_munem","LaRudyzyne","u251068829_reded");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$signupName = $signupPassword = $signupNameError = $signupPasswordError = $signupPassword2 = "";
$email = $signupAge = $signupGender = $loginName = $loginPassword =  $error = "";

//REGISTRATION
function registration($email, $signupName, $signupPassword, $signupAge, $signupGender) {
			
    $mysqli= new mysqli("localhost","u251068829_munem","LaRudyzyne","u251068829_reded");
    
    $stmt = $mysqli->prepare("INSERT INTO registration(email, signupName, signupPassword, signupAge, signupGender) VALUE (?, ?, ?, ?, ?)");
    echo $mysqli->error;
    $stmt->bind_param("sssss",$email, $signupName, $signupPassword, $signupAge, $signupGender);
    
    if ( $stmt->execute() ) {
        echo "Registered!";
    } else {
        echo "ERROR ".$stmt->error;
    }	
}
//USERNAME
if (isset ($_POST["email"])) {
    $db= mysqli_connect("localhost","u251068829_munem","LaRudyzyne","u251068829_reded");
    $email = $_POST['email'];
    $sql_u = "SELECT * FROM registration WHERE email = '$email'";
    $res_u = mysqli_query($db,$sql_u) or die (mysqli_error($db));
    if (mysqli_num_rows($res_u) > 0) {
        $emailError = "Username already exists";
    }   else {
        $email = $_POST["email"];
    }
}

if (isset ($_POST["signupName"])) {
    $db= mysqli_connect("localhost","u251068829_munem","LaRudyzyne","u251068829_reded");
    $signupName = $_POST['signupName'];
    $sql_u = "SELECT * FROM registration WHERE signupName = '$signupName'";
    $res_u = mysqli_query($db,$sql_u) or die (mysqli_error($db));
    if (mysqli_num_rows($res_u) > 0) {
        $signupNameError = "Username already exists";
    }   else {
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
if(isset ($_POST["signupPassword"])) {
	if (empty ($_POST["signupPassword"])) {
	$signupPasswordError = "This field is required!";
	} else {
	if (strlen ($_POST["signupPassword"]) <6)
    $signupPasswordError = "Password must be at least 6 characters!";
    }
    if ($_POST["signupPassword"]!= $_POST["signupPassword2"])
    $signupPasswordError = "Passwords DO NOT MATCH!!!";
    }

    //REGISTRATION END
    if (isset($_POST["email"]) &&
        isset($_POST["signupName"]) &&
        isset($_POST["signupPassword"]) &&
        isset($_POST["signupAge"]) &&
        isset($_POST["signupGender"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["signupName"]) &&
        !empty($_POST["signupPassword"]) &&
        !empty($_POST["signupAge"]) &&
        !empty($_POST["signupGender"])
        )

    //SAVING FUNCTION
    {
    echo "Saved...<br>";
    echo "Your email ".$email."<br>";
	echo "Your username ".$signupName."<br>";
    echo "Paswword ".$_POST["signupPassword"]."<br>";
    echo "Age ".$signupAge."<br>";
    echo "Gender ".$signupGender."<br>";
         
    $signupPassword = hash("sha512", $_POST["signupPassword"]);
    registration($email, $signupName, $signupPassword, $_POST["signupAge"], $_POST["signupGender"]);
    }

?>