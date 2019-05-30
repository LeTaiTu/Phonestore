<?php 
require_once '../models/customer_model.php';

$action = isset($_GET['m']) ? $_GET['m'] : 'index';
switch ($action) {
	case 'index':
	index();
	break;
	case 'create':
	create();
	break;
	case "edit": 
	edit();
	break;
	case 'delete':
	delete();
	break;
	default:
	index();	
	break;
}

function index() {
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();

	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$data = getAllDataThanhVien($keyword);
	$link = createLink(BASE_URL, ['sk' => 'thanhvien', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword]);
	$paging = paging($link, count($data), $page, 8, $keyword);
	$dataAll = getAllDataThanhVienByPage($paging['start'], $paging['limit'], $paging['keyword']);
	require_once '../views/customer/index_view.php';
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

		$flag = TRUE;
		$checkError = validateData($name,$email);
		foreach ($checkError as $key => $error) {
			if (!empty($error)) {
				$flag = FALSE;
				break;
			}
		}

		if ($flag) {
			if (checkEmail($email)) {
				$add = themThanhVien($name,$sex,$email,$birthday,$address,$phone,$password);
				if ($add) {
					$msg->success("Thêm thành công.");
					header("Location: home.php?sk=thanhvien&m=index");
					exit();
				}

			}
			else{
				$msg->warning("Thêm thất bại.Tên đã tồn tại");
				header("Location: home.php?sk=thanhvien&m=create");
				exit();
			}
		}
		else{
			$msg->error("Thêm thất bại.");
			header("Location: home.php?sk=thanhvien&m=create");
			exit();
			}// end flag
		}
		require_once '../views/customer/create_view.php';	
	}

	function edit(){
		$idCt = isset($_GET['id']) ? $_GET['id'] : 0;
		$idCt = is_numeric($idCt)  ? $idCt : 0;
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
				$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
				$email = strip_tags($email);
				$birthday = isset($_POST['txtDate']) ? $_POST['txtDate'] : '';
				$birthday = strip_tags($birthday);
				$emailHdd = isset($_POST['hddEmail'])    ? $_POST['hddEmail'] : '';
				$emailHdd = strip_tags($emailHdd);
				$address = isset($_POST['txtAddress']) ? $_POST['txtAddress'] : '';
				$address = strip_tags($address);
				$phone = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';
				$phone = strip_tags($phone);
				$password = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
				$password = strip_tags($password);

				$flag = TRUE;
				$checkError = validateData($name,$email);

				foreach ($checkError as $key => $error) {
					if (!empty($error)) {
						$flag = FALSE;
						break;
					}
				}

				if ($flag) {
					if ($emailHdd == $email) {
						$edit = editDataCustomer($idCt,$name,$sex,$email,$birthday,$address,$phone,$password);
						if ($edit) {
							$msg->success("Sửa thành công");
							header("Location: home.php?sk=thanhvien&m=index");
							exit();
						}
					}
					else{
						if (checkEmail($email)) {
							$edit = editDataCustomer($idCt,$name,$sex,$email,$birthday,$address,$phone,$password);
							if ($edit) {
								$msg->info("Sửa thành công email mới");
								header("Location: home.php?sk=thanhvien&m=index");
								exit();
							}
						}
						else{
							$msg->warning("Sửa thất bại. Email đã tồn tại.");
							header("Location: home.php?sk=thanhvien&m=edit&id={$dataEditCt['id']}");
							exit();
						}// end checkname
					}
				}
				else{
					$msg->error("Dữ liệu không hợp lệ.");
					header("Location: home.php?sk=thanhvien&m=edit&id={$dataEditCt['id']}");
					exit();
				}// end flag
			}// end submitedit
			require_once '../views/customer/edit_view.php';

		}


	}
	function delete(){
		$idCt = isset($_GET['id']) ? $_GET['id'] : 0;
		$idCt = is_numeric($idCt)  ? $idCt : 0;
		$dataEditCt = getDataInfoCustomer($idCt);
		if (empty($dataEditCt)) {
			require_once '../views/notfound_view.php';
		}
		else{
			$msg = new \Plasticbrain\FlashMessages\FlashMessages();
			$delete = deleteDataCustomer_model($idCt);
			if ($delete) {
				$msg->success("Xóa thành công");
				header("Location: home.php?sk=thanhvien");
				exit();
			}
			else{
				$msg->info("Đã hủy xóa");
				header("Location: home.php?sk=thanhvien&m=index");
				exit();
			}
		}
	}


//check name
	function checkEmail($email){
		return checkExitEmailThanhvien($email);
	}

	function validateData($name, $email) {
		$errors = array();
		
		$errors['name']    = (empty($name) OR (mb_strlen($name) < 1 or mb_strlen($name) > 200)) ? "Tên không được để trống và không được lớn hơn 200 hoặc nhỏ hơn 1 ký tự." : '';
		//$errors['phone']   = (empty($phone) or (checkRegexpPhone($phone) == 0) ) ? "Số điện thoại không được để trống và phải nhập đúng định dạng." : '';
		$errors['email'] = (empty($email) OR mb_strlen($email) > 200) ? "Email không được để trống và không được lớn hơn 200 hoặc nhỏ hơn 1 ký tự." : '';
		//$errors['img']           = (empty($img)) ? "Bạn chưa chọn logo hoặc loại ảnh không hỗ trợ." : '';

		return $errors;
	}