<?php

class User {
	
        private $connection;
        function __construct(){
        $this->connection = mysqli_connect("localhost","u251068829_azabu","aPyPapuNuG","u251068829_ybaja");;
    }

	function signup($email, $password, $username, $age) {
		$stmt = $this->connection->prepare("INSERT INTO registration (email, password, username, age) VALUES (?, ?, ?, ?)");
		echo $this->connection->error;
		$stmt->bind_param("ssss", $email, $password, $username, $age);
		if($stmt->execute()) {
			echo "Registration completed!";
		} else {
		 	"ERROR ".$stmt->error;
        }
        $stmt->close();
	}

	function login($email, $password) {
		$notice = "";
		$stmt = $this->connection->prepare("
			SELECT id, email, password
			FROM registration
			WHERE email = ?
		");
		$stmt->bind_param("s", $email);
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb);
		$stmt->execute();
		if ($stmt->fetch()) {
			$hash = hash("sha512", $password);
			if ($hash == $passwordFromDb) {
				$_SESSION["userId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				header("Location: homepage.php");
				exit();
			} else {
				$notice = "Wrong password";
			}
		} else {
			$notice = "Email not found";
		}
		return $notice;
	}
}

?>