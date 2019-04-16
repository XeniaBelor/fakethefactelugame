<?php

    require("functions.php");
    
    //LOG OUT
	if (isset($_GET["logout"])) {
		session_destroy();
		header("Location: ../index.php");
		exit();
    }

    function getAllPeople() {
		
        $mysqli= new mysqli("localhost","u251068829_azabu","aPyPapuNuG","u251068829_ybaja");
	
		$stmt = $mysqli->prepare("
		SELECT id, signupName
		FROM registration
		");
		$stmt->bind_result($id, $signupName);
		$stmt->execute();
		$results = array();
		
		while($stmt->fetch()) {
			
			$human = new StdClass();
			$human->id = $id;
			$human->signupName = $signupName;
			
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
</head>
<body>
    <h1>Home page test</h1>
    <a href="?logout=1">LOG out</a>


    <?php
	$html = "<table class=table1>";
		
		$html .= "<tr>";
			$html .= "<th>id</th>";
			$html .= "<th>Name</th>";
		$html .= "</tr>";
		
		// iga liikme kohta massiivis
		foreach ($people as $p) {
		
		$html .= "<tr>";
            $html .= "<td>".$p->id."</td>";
			$html .= "<td>".$p->signupName."</td>";
		$html .= "</tr>";
		
		}
	
	$html .= "</table>";
	echo $html;
?>

</body>
</html>