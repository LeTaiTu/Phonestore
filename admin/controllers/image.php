<?php 
require_once '../models/image_model.php';

$action = isset($_GET['m']) ? $_GET['m'] : 'index';
switch ($action) {
	case 'index':
	index();
	break;
	case 'edit':
	edit();
	break;
	default:
	index();	
	break;
}

function index() {
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	$data = getAllData();
	require_once '../views/display/index_view_image.php';
}

function edit(){
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$dataEdit = getDataInfo($id);
	if (empty($dataEdit)) {
		require_once '../views/notfound_view.php';
	}
	else{
		$msg = new \Plasticbrain\FlashMessages\FlashMessages();
		if (isset($_POST['btnSubmitEdit'])) {
			$hddLogo = isset($_POST['hddLogo']) ? $_POST['hddLogo'] : '';
			$hddLogo = strip_tags($hddLogo);
			$hddHeader = isset($_POST['hddHeader']) ? $_POST['hddHeader'] : '';
			$hddHeader = strip_tags($hddHeader);
			$hddFooter = isset($_POST['hddFooter']) ? $_POST['hddFooter'] : '';
			$hddFooter = strip_tags($hddFooter);

			$logo = "";
			$header = "";
			$footer = "";

			if (isset($_FILES['txtFileLogo'])) {
				$logo = uploadFiles($_FILES['txtFileLogo'] ,PATH_UPLOAD_IMAGE);
			}
			$strLogo = empty($logo) ? $hddLogo : $logo;

			if (isset($_FILES['txtFileHeader'])) {
				$header = uploadFiles($_FILES['txtFileHeader'] ,PATH_UPLOAD_IMAGE);
			}
			$strHeader = empty($header) ? $hddHeader : $header;

			if (isset($_FILES['txtFileFooter'])) {
				$footer = uploadFiles($_FILES['txtFileFooter'] ,PATH_UPLOAD_IMAGE);
			}
			$strFooter = empty($footer) ? $hddFooter : $footer;

				$update = editData($id,$strLogo,$strHeader,$strFooter);
				if ($update) {
					$msg->success("Sửa thành công.");
					header("Location: home.php?sk=giaodien&m=index");
					exit();
				}

			else{
				$msg->error("Dữ liệu không hợp lệ.");
				header("Location: home.php?sk=giaodien&m=edit&id={$dataEdit['id']}");
				exit();
			}
		}
			// end submitEdit
		require_once '../views/display/edit_view_image.php';
	}
}