<?php 

function login($username, $password) {
	$sql = "SELECT * FROM admin WHERE username =:username AND password = :password";

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = [];

	if ($stmt) {
		$stmt->bindValue(":username", $username, PDO::PARAM_STR);
		$stmt->bindValue(":password", $password, PDO::PARAM_STR);
		if ($stmt->execute()) {
			if ($stmt->rowCount() > 0) {
				$flag = $stmt->fetch(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);

	return $flag;
}

?>