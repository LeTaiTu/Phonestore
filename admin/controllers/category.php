<?php 
require_once '../models/category_model.php';

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
	$data = getAllDataLoaisp($keyword);
	$link = createLink(BASE_URL, ['sk' => 'loaisp', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword]);
	$paging = paging($link, count($data), $page, 8, $keyword);
	$dataAll = getAllDataLoaispByPage($paging['start'], $paging['limit'], $paging['keyword']);
	require_once '../views/category/index_view.php';
}

function create(){
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();// xử ý thông báo lỗi

		if (isset($_POST['btnSubmit'])) {
			$name    = isset($_POST['txtName'])     ? $_POST['txtName']    : '';
			$name   = strip_tags($name);

			$logo = '';
			if (isset($_FILES['txtFileLogo'])) {
				$logo = uploadFiles($_FILES['txtFileLogo'], PATH_UPLOAD_CATEGORY);
			}
			$flag = true;
			$checkData = validateData($name);
			foreach ($checkData as $key => $value) {
				if (!empty($value)) {
					$flag = false;
					break;
				}
			}

			// thực hiện kiểm tra và thêm dữ liệu
			if ($flag) {
				
					$add = themLoaisp($name,$logo);
					if ($add) {
						$msg->success('Thêm thành công.');
						header("Location: home.php?sk=loaisp&m=index");
						exit();
					}
			}
			else{
				$msg->error('Dữ liệu nhập sai.');
				header("Location: home.php?sk=loaisp&m=create");
				exit();
			}
		}
		require_once '../views/category/create_view.php';

	}

	function edit(){
		$idCg = isset($_GET['id']) ? $_GET['id'] : 0;
		$dataEditCg = getDataInfoLoaisp($idCg);

		if (empty($dataEditCg)) {
			require_once '../views/notfound_view.php';
		}
		else{
			$msg = new \Plasticbrain\FlashMessages\FlashMessages();
			if (isset($_POST['btnSubmitEdit'])) {
				$name    = isset($_POST['txtName'])    ? $_POST['txtName']    : "";
				$name    = strip_tags($name);
				$hddLogo = isset($_POST['hddFile']) ? $_POST['hddFile'] : '';
				$hddLogo = strip_tags($hddLogo);

				$logo = "";
				// $type = 1 ;

				if (isset($_FILES['txtFileLogo'])) {
					$logo = uploadFiles($_FILES['txtFileLogo'] ,PATH_UPLOAD_CATEGORY);
				}
				$strLogo = empty($logo) ? $hddLogo : $logo;

				$flag = TRUE;
				$checkError = validateData($name);
				foreach ($checkError as $key => $err) {
					if (!empty($err)) {
						$flag = FALSE;
						break;
					}
				}

				if ($flag) {
					
					$update = editDataLoaisp($idCg,$name,$strLogo);
					if ($update) {
						$msg->success("Sửa thành công.");
						header("Location: home.php?sk=loaisp&m=index");
						exit();
					}
				}
				else{
					$msg->error("Dữ liệu không hợp lệ.");
					header("Location: home.php?sk=loaisp&m=edit&id={$dataEditCg['id']}");
					exit();
				}
			}
			// end submitEdit
			require_once '../views/category/edit_view.php';

		}
	}

	function delete(){
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();
		$idCg = isset($_GET['id']) ? $_GET['id'] : '';
		$idCg = is_numeric($idCg) ? $idCg : 0;
		$dataEditCg = getDataInfoLoaisp($idCg);
		if (empty($dataEditCg)) {
			require_once '../views/notfound_view.php';
		}
		else{
			$delete = deleteDataLoaisp_model($idCg);
			if ($delete) {
				$msg->info("Xóa thành công.");
				header("Location: home.php?sk=loaisp");
				exit();
			}
			else{
				$msg->error("Đã hủy xóa.");
				header("Location: home.php?sk=loaisp&m=index");
				exit();
			}
		}

	}
//check name
	// function checkName($name){
	// 	return checkExitNameLoaisp($name);
	// }

	function validateData($name) {
		$errors = array();
		
		$errors['name'] = (empty($name) OR (mb_strlen($name) < 1 or mb_strlen($name) > 200)) ? "Tên không được để trống và không được lớn hơn 200 hoặc nhỏ hơn 1 ký tự." : '';

		return $errors;
	}
