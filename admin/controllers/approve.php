<?php 
require_once '../models/approve_model.php';

$action = isset($_GET['m']) ? $_GET['m'] : 'index';
switch ($action) {
	case 'index':
	index();
	break;
	case 'create':
	create();
	break;
	case 'nextstep': 
	nextstep();
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
	$data = getAllDataDonhang($keyword);
	$link = createLink(BASE_URL, ['sk' => 'duyetdon', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword]);
	$paging = paging($link, count($data), $page, 8, $keyword);
	$dataAll = getAllDataDonhangByPage($paging['start'], $paging['limit'], $paging['keyword']);
	require_once '../views/approve/index_view.php';
}

function nextstep() {
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	if (isset($_GET['idorder'])) {
		$id_order = $_GET['idorder'];
		$idd = isset($_GET['id']) ? $_GET['id'] : '';
		if ($idd<2) {
			$idd = $idd+1;
			$add = editDataDonhang($id_order, $idd);
			if ($add) {
				$msg->success('Đã chuyển tiếp');
				header("Location: home.php?sk=duyetdon&m=index");
				exit();
			}
			else{
				$msg->error('Lỗi');
				header("Location: home.php?sk=duyetdon&m=index");
				exit();
			}
		}
		if ($idd=2) {
			$idd = $idd+1;
			$add = editDataDonhang($id_order, $idd);
			if ($add) {
				$msg->success('Đã xong đơn và đóng đơn');
				header("Location: home.php?sk=duyetdon&m=index");
				exit();
			}
		}
		require_once '../views/approve/index_view.php';
	}
	
}

?>





