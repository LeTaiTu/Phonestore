<?php 
session_start();
require_once '../config/database.php';

require_once '../models/login_model.php';

if (isset($_POST['btnSubmit'])) {
	if (isset($_SESSION['login_errors'])) {
		unset($_SESSION['login_errors']);
	}

	$username = isset($_POST['txtTenDangNhap']) ? $_POST['txtTenDangNhap'] : '';
	$password = isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';

	$checkErrors = validate($username, $password);
	$flag = true;
	foreach($checkErrors as $error) {
		if (!empty($error)) {
			$flag = false;
			break;
		}
	}

	$password = md5($password);
	if ($flag) {
		$check = login($username, $password);	
		if (!empty($check)) {
			$_SESSION['username'] = $check['username'];
			$_SESSION['email'] = $check['email'];
			$_SESSION['avatar'] = $check['avatar'];
			$_SESSION['name'] = $check['name'];

			header("Location: home.php");
		}
		else {
			$message = "Tài khoản hoặc mật khẩu không đúng";
			header("Location: ../index.php?message=$message");
		}
	}else {
		$_SESSION['login_errors'] = $checkErrors;
		header("Location: ../index.php");
	}
	
}

function validate($username, $password) {
	$errors = array();
	$errors['username'] = !empty($username) && strlen($username) >= 5 ? '' : "Tên tài khoản không được để rỗng và lớn hơn 4 kí tự";
	$errors['password'] = !empty($password) && strlen($password) >= 6 ? '' : 'Mật khẩu không được để rỗng và phải lớn hơn 5 ký tự';

	return $errors;
}

 ?>