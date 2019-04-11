<?php

	//LOG OUT
	if (isset($_GET["logout"])) {
		session_destroy();
		header("Location: ../index.php");
		exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page test</title>
</head>
<body>
    <h1>Home page test</h1>
    <a href="?logout=1">LOG out</a>
</body>
</html>