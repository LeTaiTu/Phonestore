<?php
require_once 'app/models/home_model.php';
require_once 'app/helpers/helper.php';

$m = isset($_GET['m']) ? $_GET['m'] : 'index';

switch ($m) {
	case 'index':
	require_once 'app/views/partial/slide_view.php';
	index();
	// require_once 'app/views/partial/menu_right.php';
	break;
	case 'detail':
	require_once 'app/views/partial/slide_view.php';
	detail();
	// require_once 'app/views/partial/menu_right.php';
	break;
	case 'comment':
	require_once 'app/views/partial/slide_view.php';
	comment();
	require_once 'app/views/partial/menu_right.php';
	break;
	case 'add':
	add();
	break;
	case 'buy':
	buy();
	break;
	case 'deletecart':
	deletecart();
	break;
	default:
	require_once 'app/views/partial/slide_view.php';
	index();
	// require_once 'app/views/partial/menu_right.php';
	break;
}

function index() {

	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$dataSps = getAllDataSp($keyword);
	$dataLoais = getAllDataLoai($keyword);
	$link = createLink('index.php', [
		'cn' => 'index',
		'm' => 'index',
		'page'=> "{page}",
		'keyword' => $keyword]);
//
	$paging = paging($link, count($dataSps), $page, 99999, $keyword);
	$dataSps = getAllDataSpByPage($paging['start'],$paging['limit'],$paging['keyword']);
	require_once 'app/views/index_view.php';
	require_once 'app/views/partial/menu_right.php';
}

function detail(){
	$slug =  isset($_GET['slug']) ? $_GET['slug'] : '';

	$dataFeed = getAllDataPhanhoi();

	if (!empty($slug)) {
		if (is_numeric($slug)) {
			$model = getDataSpByID($slug);
			if (!empty($model)) {
				$view =  isset($_GET['view']) ? $_GET['view'] : 0;
				$view = $view+1;
				$add = editView($slug,$view);
				if ($add) {
					require_once 'app/views/home/detail_view.php';
				}	
			}
			else {
				require_once 'app/views/not_found_view.php';
			}

		}
		else {
			require_once 'app/views/not_found_view.php';
		}
	}
	else {
		require_once 'app/views/not_found_view.php';
	}
	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$dataSps = getAllDataSp($keyword);
	$dataLoais = getAllDataLoai($keyword);
	$link = createLink('index.php', [
		'cn' => 'index',
		'm' => 'index',
		'page'=> "{page}",
		'keyword' => $keyword]);
//
	$paging = paging($link, count($dataSps), $page, 99999, $keyword);
	$dataSps = getAllDataSpByPage($paging['start'],$paging['limit'],$paging['keyword']);
	require_once 'app/views/partial/menu_right.php';
}

function comment(){

	if (isset($_POST['btnSubmit'])) {
		$content = isset($_POST['txtComment']) ? $_POST['txtComment'] : '';
		$content = strip_tags($content);
		$id_product	= isset($_POST['id_product']) ? $_POST['id_product'] : '';
		$id_product	= strip_tags($id_product);
		$id_customer = isset($_POST['id_customer']) ? $_POST['id_customer'] : '';
		$id_customer = strip_tags($id_customer);

		$add = themPhanhoi($id_customer,$id_product,$content);
		if ($add) {
			header("Location: index.php?cn=index&m=detail&slug=$id_product");
			exit();
		}
		else{
			header("Location: index.php?cn=index");
			exit();
		}	
	}
}

function add() {
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();

	// if (isset($_POST['btnSubmit'])) {
	// 	$id_pro	= isset($_POST['id_product']) ? $_POST['id_product'] : '';
	// 	$id_pro	= strip_tags($id_pro);
	// 	$id_customer = isset($_POST['id_customer']) ? $_POST['id_customer'] : '';
	// 	$id_customer = strip_tags($id_customer);
	// 	$row_s = getDataSpByID($id_pro);
	// 	if(isset($_SESSION['cart'][$id_pro])){ 
	// 		$_SESSION['cart'][$id_pro]['quantity']++; 
	// 		require_once 'app/views/home/cart_view.php';
	// 	}else{
	// 		if (!empty($row_s)) {

	// 			$sscart = [
	// 				"namepro" => $row_s['name_pro'],
	// 				"quantity" => 1, 
	// 				"price" => $row_s['price'] 
	// 			]; 
	// 			$_SESSION['cart'][$row_s['id_pro']] = $sscart;

	// 		}
	// 		else{ 
	// 			$message="This product id it's invalid!";
	// 		}
	// 	}
	// }
	require_once 'app/views/home/cart_view.php';
}

function buy(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	if (isset($_POST['btnSubmit'])) {
		$idCt = $_SESSION['id'];
		$idpro = isset($_POST['txtIdProduct']) ? $_POST['txtIdProduct'] : '';
		$idpro = strip_tags($idpro);
		$namepro = isset($_POST['txtProduct']) ? $_POST['txtProduct'] : '';
		$namepro = strip_tags($namepro);
		$price = isset($_POST['txtPrice']) ? $_POST['txtPrice'] : '';
		$price = strip_tags($price);
		$quantity = isset($_POST['txtQuantity']) ? $_POST['txtQuantity'] : '';
		$quantity = strip_tags($quantity);
		$amount = isset($_POST['txtAmount']) ? $_POST['txtAmount'] : '';
		$amount = strip_tags($amount);
		$name = isset($_POST['txtName']) ? $_POST['txtName'] : '';
		$name = strip_tags($name);
		$phone = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';
		$phone = strip_tags($phone);
		$address = isset($_POST['txtAddress']) ? $_POST['txtAddress'] : '';
		$address = strip_tags($address);
		$note = isset($_POST['txtNote']) ? $_POST['txtNote'] : '';
		$note = strip_tags($note);

		$address = $phone." - ".$address." ( ".$note." )";
		$buy = Dathang($idCt, $name, $idpro, $namepro, $address, $quantity, $price, $amount);
		if ($buy) {
			$order = getDataOrder();
			foreach ($order as $key => $value) {
				if ($key == 0) {
					$id = $value['id'];
				}
			}

			$add = Addchitietdonhang($id, $amount);
			if ($add) {
				unset($_SESSION['cart']);
				$msg->success("Đơn hàng đã được đặt. Mời bạn xem thông tin chi tiết trong tài khoản");
				header("Location: index.php?cn=index&m=add");
				exit();
			}	
		}
		else{
			$msg->warning("Đặt hàng thất bại");
			header("Location: index.php?cn=dangki&m=add");
			exit();
		}
		require_once 'app/views/home/cart_view.php';
	}
}

function deletecart(){
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	if ($_GET['action']=='all') {
		unset($_SESSION['cart']);
		require_once 'app/views/home/cart_view.php';
	}
	if ($_GET['action']=='one') {
		$dem = $_SESSION['cart'][$_GET['id']];
		if (count($dem) > 3) {
			unset($_SESSION['cart'][$_GET['id']]);
		}
		else{
			unset($_SESSION['cart']);
		}
		require_once 'app/views/home/cart_view.php';
	}
	
}

function order(){

}

?>

