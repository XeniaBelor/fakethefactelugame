<?php

session_start();

$serverHost = 'localhost';
$serverUsername = 'u251068829_azabu';
$serverPassword = 'aPyPapuNuG';
$database = 'u251068829_ybaja';

$mysqli= new mysqli(
    $GLOBAL["serverHost"],
    $GLOBAL["serverUsername"],
    $GLOBAL["serverPassword"],
    $GLOBAL["database"]);
    
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

?>