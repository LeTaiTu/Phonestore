<?php
session_start();
setcookie('username', 'customer', time() + 3600, '/', '', 0);
define('BASEPATH','');
define('PATH_UPLOAD_PRODUCT', 'uploads/images/product');
define('PATH_UPLOAD_IMAGE', '/uploads/images/display');
require_once 'app/config/database.php';
require_once 'app/helpers/vn2latin.php';
require_once 'app/helpers/FlashMessages.php';
require_once 'app/helpers/library.php';

// checkLogin();

$cn = isset($_GET['cn']) ? $_GET['cn'] : 'index';


switch ($cn) {
	case 'index':
	require_once 'app/views/partial/header_view.php';
	// require_once 'app/views/partial/slide_view.php';
	require_once 'app/controllers/home.php';
	// require_once 'app/views/partial/menu_right.php';
	break;
	case 'dienthoai':
	require_once 'app/views/partial/header_view.php';
	require_once 'app/controllers/phone.php';
	break;
	case 'dangki':
	require_once 'app/views/partial/header_view.php';
	require_once 'app/controllers/account.php';
	break;
	default:
	require_once 'app/views/partial/header_view.php';
	// require_once 'app/views/partial/slide_view.php';
	require_once 'app/controllers/home.php';
	// require_once 'app/views/partial/menu_right.php';
	break;
}
require_once 'app/views/partial/footer_view.php';
?>