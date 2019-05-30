<?php 
session_start();
require_once '../config/database.php';
require_once '../config/constant.php';
require_once '../helpers/library.php';
require_once '../helpers/FlashMessages.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");

checkLoginAdmin();

$sk = isset($_GET['sk']) ? $_GET['sk'] : 'index';

require_once '../views/partials/header_view.php';
switch ($sk) {
	case "thanhvien": 
	require_once "customer.php";
	break;
	case 'mathang':
	require_once "goods.php";
	break;
	case 'loaisp':
	require_once "category.php";
	break;
	case 'sp':
	require_once "product.php";
	break;
	case 'giaodien':
	require_once "image.php";
	break;
	case 'slide':
	require_once "slide.php";
	break;
	case 'duyetdon':
	require_once "approve.php";
	break;
	case 'donhang':
	require_once "order.php";
	break;
	case 'phanhoi':
	require_once "feedback.php";
	break;
	default:
	require_once '../views/home_view.php';
	break;
}
require_once '../views/partials/footer_view.php';