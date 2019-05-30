<?php 
require_once '../models/goods_model.php';

$action = isset($_GET['m']) ? $_GET['m'] : 'index';
switch ($action) {
	case 'index':
	index();
	break;
	case 'create':
	create();
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
	$data = getAllDataMathang($keyword);
	$link = createLink(BASE_URL, ['sk' => 'mathang', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword]);
	$paging = paging($link, count($data), $page, 8, $keyword);
	require_once '../views/goods/index_view.php';
}

function create(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();

	if (isset($_POST['btnSubmit'])) {
		$name	= isset($_POST['txtName']) ? $_POST['txtName'] : '';
		$name	= strip_tags($name);

		$flag = TRUE;
		$checkError = validateData($name);
		foreach ($checkError as $key => $error) {
			if (!empty($error)) {
				$flag = FALSE;
				break;
			}
		}

		if ($flag) {
			if (checkName($name)) {
				$add = themMathang($name);
				if ($add) {
					$msg->success("Thêm thành công.");
					header("Location: home.php?sk=mathang&m=index");
					exit();
				}

			}
			else{
				$msg->warning("Thêm thất bại.Tên đã tồn tại");
				header("Location: home.php?sk=mathang&m=create");
				exit();
			}
		}
		else{
			$msg->error("Thêm thất bại.");
			header("Location: home.php?sk=mathang&m=create");
			exit();
			}// end flag
		}
		require_once '../views/goods/create_view.php';	
	}

	function delete(){
		$idG = isset($_GET['id']) ? $_GET['id'] : 0;
		$idG = is_numeric($idG)  ? $idG : 0;
		$dataEditG = getDataInfoGoods($idG);
		if (empty($dataEditG)) {
			require_once '../views/notfound_view.php';
		}
		else{
			$msg = new \Plasticbrain\FlashMessages\FlashMessages();
			$delete = deleteDataGoods_model($idG);
			if ($delete) {
				$msg->success("Xóa thành công");
				header("Location: home.php?sk=mathang");
				exit();
			}
			else{
				$msg->info("Đã hủy xóa");
				header("Location: home.php?sk=mathang&m=index");
				exit();
			}
		}
	}
// check
	function checkName($name){
		return checkExitNameMathang($name);
	}
	function validateData($name) {
		$errors = array();
		
		$errors['nametype'] = (empty($name) OR (mb_strlen($name) < 1 or mb_strlen($name) > 200)) ? "Tên không được để trống và không được lớn hơn 200 hoặc nhỏ hơn 1 ký tự." : '';

		return $errors;
	}