<?php 
require_once '../models/slide_model.php';
require_once '../models/goods_model.php';


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
	$data = getAllDataSlide($keyword);
	$link = createLink(BASE_URL, ['sk' => 'slide', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword]);
	$paging = paging($link, count($data), $page, 8, $keyword);
	$dataAll = getAllDataSlideByPage($paging['start'], $paging['limit'], $paging['keyword']);
	require_once '../views/slide/index_view.php';
}

function create(){
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();// xử ý thông báo lỗi

		$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
		$dataA = getAllDataMathang($keyword);

		if (isset($_POST['btnSubmit'])) {
			$id_type   = isset($_POST['txtSelect'])    ? $_POST['txtSelect']   : '';
			$id_type   = strip_tags($id_type);

			$image = '';
			if (isset($_FILES['txtFileImage'])) {
				$image = uploadFiles($_FILES['txtFileImage'], PATH_UPLOAD_IMAGE);
			}
			$flag = true;
			$checkData = validateData($id_type);
			foreach ($checkData as $key => $value) {
				if (!empty($value)) {
					$flag = false;
					break;
				}
			}

			// thực hiện kiểm tra và thêm dữ liệu
			if ($flag) {
				$add = themSlide($id_type,$image);
				if ($add) {
					$msg->success('Thêm thành công.');
					header("Location: home.php?sk=slide&m=index");
					exit();
				}
			}
			else{
				$msg->error('Dữ liệu nhập sai.');
				header("Location: home.php?sk=slide&m=create");
				exit();
			}
		}
		require_once '../views/slide/create_view.php';
	}

function edit(){
	$idSl = isset($_GET['id']) ? $_GET['id'] : 0;
	$dataEditSl = getDataInfoSlide($idSl);
	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
	$dataA = getAllDataMathang($keyword);
	if (empty($dataEditSl)) {
		require_once '../views/notfound_view.php';
	}
	else{
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();
		if (isset($_POST['btnSubmitEdit'])) {
			$id_type   = isset($_POST['txtSelect'])    ? $_POST['txtSelect']   : '';
			$id_type   = strip_tags($id_type);
			$hddImage = isset($_POST['hddFile']) ? $_POST['hddFile'] : '';
			$hddImage = strip_tags($hddImage);

			$image = "";

			if (isset($_FILES['txtFileImage'])) {
				$image = uploadFiles($_FILES['txtFileImage'] ,PATH_UPLOAD_IMAGE);
			}
			$strImage = empty($image) ? $hddImage : $image;

			$flag = TRUE;
			$checkError = validateData($id_type);
			foreach ($checkError as $key => $err) {
				if (!empty($err)) {
					$flag = FALSE;
					break;
				}
			}

			if ($flag) {

				$update = editDataSlide($idSl,$id_type,$strImage);
				if ($update) {
					$msg->success("Sửa thành công.");
					header("Location: home.php?sk=slide&m=index");
					exit();
				}
			}
			else{
				$msg->error("Dữ liệu không hợp lệ.");
				header("Location: home.php?sk=slide&m=edit&id={$dataEditSl['id_pro']}");
				exit();
			}
		}
			// end submitEdit
		require_once '../views/slide/edit_view.php';

	}
}

function delete(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	$idSl = isset($_GET['id']) ? $_GET['id'] : '';
	$idSl = is_numeric($idSl) ? $idSl : 0;
	$dataEditSl = getDataInfoSlide($idSl);
	if (empty($dataEditSl)) {
		require_once '../views/notfound_view.php';
	}
	else{
		$delete = deleteDataSlide_model($idSl);
		if ($delete) {
			$msg->info("Xóa thành công.");
			header("Location: home.php?sk=slide");
			exit();
		}
		else{
			$msg->error("Đã hủy xóa.");
			header("Location: home.php?sk=slide&m=index");
			exit();
		}
	}

}

function validateData($id) {
	$errors = array();

	$errors['id'] = (empty($id)) ? "Không được để trống ." : '';

	return $errors;
}