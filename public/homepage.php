<?php

    require("functions.php");
    
    //LOG OUT
	if (isset($_GET["logout"])) {
		session_destroy();
		header("Location: ../index.php");
		exit();
	}
	
	if (!isset($_SESSION["userId"])) {
		header("Location: login.php");
		exit();
	}

    function getAllPeople() {
		
        $mysqli= new mysqli("localhost","u251068829_azabu","aPyPapuNuG","u251068829_ybaja");
	
		$stmt = $mysqli->prepare("
		SELECT id, email, username, age
		FROM registration
		WHERE email = ?
		");
		$stmt->bind_param("s", $_SESSION["userEmail"]);
		$stmt->bind_result($id, $email, $username, $age);
		$stmt->execute();
		$results = array();
		while($stmt->fetch()) {
			$human = new StdClass();
			$human->id = $id;
			$human->email = $email;
			$human->username = $username;
			$human->age = $age;
			array_push($results, $human);
		}
		return $results;	
    }
    
	$people = getAllPeople();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Home page test</title>
	<p>Tere tulemast <?=$_SESSION["userEmail"];?>!</p>
</head>
<body>
    <h1>Home page test</h1>
    <a href="?logout=1">LOG out</a>


	<?php

	$html = "<table class=table1>";
		
		$html .= "<tr>";
			$html .= "<th>id</th>";
			$html .= "<th>Name</th>";
			$html .= "<th>Username</th>";
			$html .= "<th>Age</th>";
		$html .= "</tr>";
		
		foreach ($people as $p) {
		
		$html .= "<tr>";
            $html .= "<td>".$p->id."</td>";
			$html .= "<td>".$p->email."</td>";
			$html .= "<td>".$p->username."</td>";
			$html .= "<td>".$p->age."</td>";
		$html .= "</tr>";
		
		}
	
	$html .= "</table>";
	echo $html;

	?> 

</body>
</html>