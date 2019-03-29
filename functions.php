<?php

$mysqli= new mysqli("localhost","root","","fakethefact");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
    
$signupName = $singupPassword = $signupNameError = $singupPasswordError = $singupPassword2 = "";

//REGISTRATION
function registration($signupName, $singupPassword) {
			
    $mysqli= new mysqli("localhost","root","","fakethefact");
    
    $stmt = $mysqli->prepare("INSERT INTO registration(signupName, singupPassword) VALUE (?, ?)");
    echo $mysqli->error;
    $stmt->bind_param("ss",$signupName, $singupPassword);
    
    if ( $stmt->execute() ) {
        echo "Registered!";
    } else {
        echo "ERROR ".$stmt->error;
    }	
}

//USERNAME
if (isset ($_POST["signupName"])) {

    $db= mysqli_connect("localhost","root","","fakethefact");
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

//REGISTRATION END
if ( $signupNameError == "" AND
    $singupPasswordError == "" &&
    isset($_POST["signupName"]) &&
    isset($_POST["singupPassword"])
)
if (isset($_POST["signupName"])&&
    !empty($_POST["singupPassword"])
)
    //SAVING FUNCTION
    {
	echo "Saved...<br>";
	echo "Your email ".$signupName."<br>";
    echo "Paswword ".$_POST["singupPassword"]."<br>";
         
    $singupPassword = hash("sha512", $_POST["singupPassword"]);
    registration($signupName, $singupPassword);
    }

?>
