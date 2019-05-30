<?php 
require_once '../models/product_model.php';
require_once '../models/category_model.php';
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
	$data = getAllDatasp($keyword);
	$link = createLink(BASE_URL, ['sk' => 'sp', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword]);
	$paging = paging($link, count($data), $page, 8, $keyword);
	$dataAll = getAllDataspByPage($paging['start'], $paging['limit'], $paging['keyword']);
	require_once '../views/product/index_view.php';
}
function create(){
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();// xử ý thông báo lỗi

		$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
		$dataG = getAllDataLoaisp($keyword);
		$dataA = getAllDataMathang($keyword);

		if (isset($_POST['btnSubmit'])) {
			$id_type   = isset($_POST['txtSelectIdLoai'])    ? $_POST['txtSelectIdLoai']   : '';
			$id_type   = strip_tags($id_type);
			$id_category   = isset($_POST['txtSelectId'])    ? $_POST['txtSelectId']   : '';
			$id_category   = strip_tags($id_category);
			$name_pro    = isset($_POST['txtName'])     ? $_POST['txtName']    : '';
			$name_pro  = strip_tags($name_pro);
			$price    = isset($_POST['txtPrice'])     ? $_POST['txtPrice']    : '';
			$price  = strip_tags($price);
			$content    = isset($_POST['txtContent'])     ? $_POST['txtContent']    : '';
			$content  = strip_tags($content);
			$view    = isset($_POST['txtView'])     ? $_POST['txtView']    : '';
			$view  = strip_tags($view);

			$image = '';
			if (isset($_FILES['txtFileImage'])) {
				$image = uploadFiles($_FILES['txtFileImage'], PATH_UPLOAD_PRODUCT);
			}
			$flag = true;
			$checkData = validateData($name_pro);
			foreach ($checkData as $key => $value) {
				if (!empty($value)) {
					$flag = false;
					break;
				}
			}

			// thực hiện kiểm tra và thêm dữ liệu
			if ($flag) {
					$add = themsp($id_category,$id_type,$image,$name_pro,$price,$content,$view);
					if ($add) {
						$msg->success('Thêm thành công.');
						header("Location: home.php?sk=sp&m=index");
						exit();
					}
			}
			else{
				$msg->error('Dữ liệu nhập sai.');
				header("Location: home.php?sk=sp&m=create");
				exit();
			}
		}
		require_once '../views/product/create_view.php';

	}

function edit(){
		$idPr = isset($_GET['id']) ? $_GET['id'] : 0;
		$dataEditPr = getDataInfosp($idPr);
		$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
		$dataG = getAllDataLoaisp($keyword);
		$dataA = getAllDataMathang($keyword);
		if (empty($dataEditPr)) {
			require_once '../views/notfound_view.php';
		}
		else{
			$msg = new \Plasticbrain\FlashMessages\FlashMessages();
			if (isset($_POST['btnSubmitEdit'])) {
				$id_type   = isset($_POST['txtSelectIdLoai'])    ? $_POST['txtSelectIdLoai']   : '';
				$id_type   = strip_tags($id_type);
				$id_category   = isset($_POST['txtSelectId'])    ? $_POST['txtSelectId']   : '';
				$id_category   = strip_tags($id_category);
				$name_pro    = isset($_POST['txtName'])     ? $_POST['txtName']    : '';
				$name_pro  = strip_tags($name_pro);
				$price    = isset($_POST['txtPrice'])     ? $_POST['txtPrice']    : '';
				$price  = strip_tags($price);
				$content    = isset($_POST['txtContent'])     ? $_POST['txtContent']    : '';
				$content  = strip_tags($content);
				$hddImage = isset($_POST['hddFile']) ? $_POST['hddFile'] : '';
				$hddImage = strip_tags($hddImage);

				$image = "";

				if (isset($_FILES['txtFileImage'])) {
					$image = uploadFiles($_FILES['txtFileImage'] ,PATH_UPLOAD_PRODUCT);
				}
				$strImage = empty($image) ? $hddImage : $image;

				$flag = TRUE;
				$checkError = validateData($name_pro);
				foreach ($checkError as $key => $err) {
					if (!empty($err)) {
						$flag = FALSE;
						break;
					}
				}

				if ($flag) {
					
					$update = editDatasp($idPr,$id_category,$id_type,$strImage,$name_pro,$price,$content);
					if ($update) {
						$msg->success("Sửa thành công.");
						header("Location: home.php?sk=sp&m=index");
						exit();
					}
				}
				else{
					$msg->error("Dữ liệu không hợp lệ.");
					header("Location: home.php?sk=sp&m=edit&id={$dataEditPr['id_pro']}");
					exit();
				}
			}
			// end submitEdit
			require_once '../views/product/edit_view.php';

		}
	}

function delete(){
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();
		$idPr = isset($_GET['id']) ? $_GET['id'] : '';
		$idPr = is_numeric($idPr) ? $idPr : 0;
		$dataEditPr = getDataInfosp($idPr);
		if (empty($dataEditPr)) {
			require_once '../views/notfound_view.php';
		}
		else{
			$delete = deleteDatasp_model($idPr);
			if ($delete) {
				$msg->info("Xóa thành công.");
				header("Location: home.php?sk=sp");
				exit();
			}
			else{
				$msg->error("Đã hủy xóa.");
				header("Location: home.php?sk=sp&m=index");
				exit();
			}
		}

	}

	function validateData($name) {
		$errors = array();
		
		$errors['name'] = (empty($name) OR (mb_strlen($name) < 1 or mb_strlen($name) > 200)) ? "Tên không được để trống và không được lớn hơn 200 hoặc nhỏ hơn 1 ký tự." : '';

		return $errors;
	}
