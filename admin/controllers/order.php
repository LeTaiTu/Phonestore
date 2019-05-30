<?php 
require_once '../models/order_model.php';

$action = isset($_GET['m']) ? $_GET['m'] : 'index';
switch ($action) {
	case 'index':
	index();
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
	require_once '../views/order/index_view.php';
}