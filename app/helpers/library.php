<?php 
// Check thông tin admin
function checkLoginEmail() {
	return isset($_SESSION['email']) && !empty($_SESSION['email']) ? false : true;
}

function checkLogin() {
	$email = checkLoginEmail();

	if ($email) {
		session_destroy();
		header("Location: index.php?cn=index");
	}
}



?>
