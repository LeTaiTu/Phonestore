<?php 
function connection() {
	try {
		$conn = new PDO('mysql:host=localhost;dbname=phonestores;charset=utf8', 'root', '');
		return $conn;
	} catch(PDOException $e) {
		echo "<pre>Error!: " . $e->getMessage() ;
		die();
	}
}

function disconnect(&$conn) {
	$conn = null;
}

 ?>