<?php

require_once 'app/models/account_model.php';

$m = isset($_GET['m']) ? $_GET['m'] : 'create';

switch ($m) {
	case 'order':
	order();
	break;
	case 'orderdetail':
	orderdetail();
	break;
	case 'done':
	done();
	break;
	case 'doneO':
	doneO();
	break;
	case 'create':
	create();
	break;
	case 'edit':
	edit();
	break;
	case 'delete':
	delete();
	break;
	case 'editpass':
	editpass();
	break;
	case 'login':
	login();
	break;
	case 'logout':
	logout();
	break;
	default:
	create();
	break;
}
function order(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	require_once 'app/views/account/menuleft_view.php';	
	$datas = getAllDataOrderdetail();
	require_once 'app/views/account/index_view.php';	
}
function orderdetail(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	require_once 'app/views/account/menuleft_view.php';	
	$id = $_GET['idd'];
	$dataOd = getAllDataOrderById($id);
	require_once 'app/views/account/order_view.php';
}

function done(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	require_once 'app/views/account/menuleft_view.php';	
	$datas = getAllDataOrderdetail();
	$idd = isset($_GET['id']) ? $_GET['id'] : '';
	$value = 3;
	$edit = editDataDonhang($idd,$value);
	require_once 'app/views/account/index_view.php';
}
function doneO(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	require_once 'app/views/account/menuleft_view.php';	
	$idd = isset($_GET['id']) ? $_GET['id'] : '';
	$dataOd = getAllDataOrderById($idd);
	$value = 3;
	$edit = editDataDonhang($idd,$value);
	require_once 'app/views/account/order_view.php';
}
function edit(){
	require_once 'app/views/account/menuleft_view.php';	

	$idCt = $_SESSION['id'];
	$dataEditCt = getDataInfoCustomer($idCt);
	if (empty($dataEditCt)) {
		require_once '../views/notfound_view.php';
	}
	else{
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();
		if (isset($_POST['btnSubmitEdit'])) {
			$name = isset($_POST['txtName']) ? $_POST['txtName'] : '';
			$name = strip_tags($name);
			$sex = isset($_POST['txtSex']) ? $_POST['txtSex'] : '';
			$sex = strip_tags($sex);
			$birthday = isset($_POST['txtDate']) ? $_POST['txtDate'] : '';
			$birthday = strip_tags($birthday);
			$address = isset($_POST['txtAddress']) ? $_POST['txtAddress'] : '';
			$address = strip_tags($address);
			$phone = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';
			$phone = strip_tags($phone);

			$edit = editDataCustomer($idCt,$name,$sex,$birthday,$address,$phone);;
			if ($edit) {
				$msg->success("Sửa thành công");
				header("Location: index.php?cn=dangki&m=edit");
				exit();
			}

			else{
				$msg->error("Dữ liệu không hợp lệ.");
				header("Location: index.php?cn=dangki&m=edit&id={$dataEditCt['id']}");
				exit();
			}			
		}
	}
	require_once 'app/views/account/edit_view.php';
}

function editpass(){
	require_once 'app/views/account/menuleft_view.php';	

	$idCt = $_SESSION['id'];
	$dataEditCt = getDataInfoCustomer($idCt);
	if (empty($dataEditCt)) {
		require_once '../views/notfound_view.php';
	}
	else{
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();
		if (isset($_POST['btnSubmit'])) {
			$pass = isset($_POST['txtPass']) ? $_POST['txtPass'] : '';
			$pass = strip_tags($pass);
			$newpass = isset($_POST['txtNewpass']) ? $_POST['txtNewpass'] : '';
			$newpass = strip_tags($newpass);
			$repass = isset($_POST['txtRepass']) ? $_POST['txtRepass'] : '';
			$repass = strip_tags($repass);

			if ($pass == $dataEditCt['password']) {
				if ($newpass == $repass) {
					
					if ($pass!==$newpass) {
						$edit = editDataPassCustomer($idCt,$newpass);
						if ($edit) {
							$msg->success("Đổi mật khẩu thành công");
							header("Location: index.php?cn=dangki&m=editpass");
							exit();
						}
					}
					else{
						$msg->error("Mật khẩu mới không được trùng mật khẩu cũ");
						header("Location: index.php?cn=dangki&m=editpass&id={$dataEditCt['id']}");
						exit();
					}
				}
				else{
					$msg->error("Mật khẩu mới không khớp");
					header("Location: index.php?cn=dangki&m=editpass&id={$dataEditCt['id']}");
					exit();
				}
			}
			else{
				$msg->error("Mật khẩu nhập không chính xác");
				header("Location: index.php?cn=dangki&m=editpass&id={$dataEditCt['id']}");
				exit();
			}	
		}
	}
	require_once 'app/views/account/edit_pass.php';
}

function create(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();

	if (isset($_POST['btnSubmit'])) {
		$name	= isset($_POST['txtName']) ? $_POST['txtName'] : '';
		$name	= strip_tags($name);
		$sex = isset($_POST['txtSex']) ? $_POST['txtSex'] : '';
		$sex = strip_tags($sex);
		$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
		$email = strip_tags($email);
		$birthday = isset($_POST['txtDate']) ? $_POST['txtDate'] : '';
		$birthday = strip_tags($birthday);
		$address 	= isset($_POST['txtAddress']) ? $_POST['txtAddress'] : '';
		$address 	= strip_tags($address);
		$phone	= isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';
		$phone 	= strip_tags($phone);
		$password	= isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
		$password 	= strip_tags($password);
		$repassword	= isset($_POST['txtRepassword']) ? $_POST['txtRepassword'] : '';
		$repassword 	= strip_tags($repassword);

		if ($password==$repassword) {
			if (checkEmail($email)) {
				$add = themThanhVien($name,$sex,$email,$birthday,$address,$phone,$password);
				if ($add) {
					$msg->success("Đăng kí thành công.");
					header("Location: index.php");
					exit();
				}
			}
			else{
				$msg->warning("Email đã tồn tại");
				header("Location: index.php?cn=dangki");
				exit();
			}
		}
		else{
			$msg->error("Mật khẩu không khớp");
			header("Location: index.php?cn=dangki");
			exit();
		}
	}
	require_once 'app/views/account/register_view.php';	
}


function delete(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = is_numeric($id) ? $id : 0;
	$dataEdit = getAllDataOrderById($id);
	if (empty($dataEdit)) {
		require_once '../views/notfound_view.php';
	}
	else{
		$delete = deleteData_model($id);
		if ($delete) {
			$msg->info("Xóa thành công.");
			header("Location: index.php?cn=dangki&m=order");
			exit();
		}
		else{
			$msg->error("Đã hủy xóa.");
			header("Location: index.php?cn=dangki&m=order");
			exit();
		}
	}

}
function login(){
	if (isset($_POST['btnSubmit'])) {

		$username = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
		$password = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';

		$check = loginAccount($username, $password);	
		if (!empty($check)) {
			$_SESSION['email'] = $check['email'];
			$_SESSION['password'] = $check['password'];
			$_SESSION['id'] = $check['id'];
			$_SESSION['name'] = $check['name'];
			$_SESSION['sex'] = $check['sex'];
			$_SESSION['address'] = $check['address'];
			$_SESSION['birthday'] = $check['birthday'];
			$_SESSION['phone'] = $check['phone'];
			if (isset($_SESSION['cart'])) {
				unset($_SESSION['cart']);
			}
			header("Location: index.php");
		}
		else {
			$message = "Tài khoản hoặc mật khẩu không đúng";
			header("Location: index.php?cn=dangki&m=login&message=$message");
		}

	}
	require_once 'app/views/account/login_view.php';
}
function logout(){
	session_destroy();
	setcookie('username', '', time() - 3600, '/', '', 0);

	header("Location: index.php");
}

function checkEmail($email){
	return checkExitEmailThanhvien($email);
}


?>