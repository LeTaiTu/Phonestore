<?php
require_once 'app/models/phone_model.php';
require_once 'app/helpers/helper.php';

$m = isset($_GET['m']) ? $_GET['m'] : 'index';

switch ($m) {
	case 'index':
	require_once 'app/views/partial/slide_view.php';
	index();
	// require_once 'app/views/partial/menu_right.php';
	break;
	default:
	// require_once 'app/views/partial/slide_view.php';
	index();
	
	break;
}

function index() {

	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
	if (isset($_GET['keyy'])) {
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$dataSps = getAllDataSp($keyword);
		$dataSlides = getAllDataSlide();
		$dataHangSps = getAllDataHangSp();
		$link = createLink('index.php', [
			'cn' => 'dienthoai',
			'm' => 'index',
			'page'=> "{page}",
			'keyword' => $keyword]);
//
		$paging = paging($link, count($dataSps), $page, 99999, $keyword);
		$dataSps = getAllDataSpByPage($paging['start'],$paging['limit'],$paging['keyword']);

		if($_GET['keyy']==1) {
			require_once 'app/views/phone/index_view.php';
		}
		if($_GET['keyy']==2) {
			require_once 'app/views/accessories/index_view_phukien.php';
		}
		if ($_GET['keyy']==3) {
			require_once 'app/views/accessories/index_view_linhkien.php';
		}
	}require_once 'app/views/partial/menu_right.php';
	
}


?>