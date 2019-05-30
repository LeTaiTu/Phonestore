<?php 
// Check thông tin admin
function checkLoginEmail() {
	return isset($_SESSION['email']) && !empty($_SESSION['email']) ? false : true;
}

function checkLoginUsername() {
	return isset($_SESSION['username']) && !empty($_SESSION['username']) ? false : true;
}

function getCookieAdmin() {
	return isset($_COOKIE['admin']) && !empty($_COOKIE['admin']) ? false : true;
}

function checkLoginAdmin() {
	$username = checkLoginUsername();
	$email = checkLoginEmail();
	$cookie = getCookieAdmin();

	if ($username or $email or $cookie) {
		session_destroy();
		header("Location: ../index.php");
	}
}

function createLink($uri, $filters = []){
	$query = '';
	foreach ($filters as $key => $filter) {
		$query .= "{$key}={$filter}&";
	}
	$query = rtrim($query, "&"); //hiện xong xoa
	return $uri . "?" . $query;
}
function paging($link, $total, $page, $limit, $keyword=''){
	$total_page = ceil($total/$limit);//hàm tính tổng số page
	$html = '';
	$currentPage = $page;
	$start = $limit * ($page-1);
	if ($currentPage < 1) {
		$currentPage = 1;
	}
	elseif ($currentPage > $total_page) {
		$currentPage = $total_page;
	}
	$html .= '<nav aria-label="Page navigation">
			<ul class="pagination">';
			// Tạo nút prev
	if ($currentPage > 1 && $total_page > 1) {
		$html .= "<li>";
		$html .= '<a href="'. str_replace("{page}", 1, $link) .'" aria-label="Previous">';
		$html .= '<span aria-hidden="true">&laquo;</span>';
		$html .= "</a>";
		$html .= "</li>";
		$html .= '<li><a href="'. str_replace("{page}", $currentPage - 1, $link) .'"><span aria-hidden="true">&#8249;</span></a></li>';

	}
			// Tạo các nút từ 1->total_page
	for ($i=1; $i <= $total_page ; $i++) { 
		if ($currentPage == $i) {
			$html .= '<li class="active"><a href="'. str_replace("{page}", $i, $link) .'">'. $i .'</a></li>';
		}
		else{
			$html .= '<li><a href="'. str_replace("{page}", $i, $link) .'">'. $i .'</a></li>';
		}
	}
			// Tạo nút next
	if ($total_page > 1 && $currentPage < $total_page) {
		$html .= '<li><a href="'. str_replace("{page}", $currentPage + 1, $link) .'"><span aria-hidden="true">&#8250;</span></a></li>';
		$html .= '<li>
					<a href="'. str_replace("{page}", $total_page, $link) .'" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>';
	}
	$html .="</ul>
			</nav>";
	$data = array('limit' => $limit, 'start' => $start, 'html' => $html, 'keyword' => $keyword);
	return $data;
}

function uploadFiles($file, $path){
	if ($file['error'] == 0) {
		if ($file['size'] < 1024*1024*2) {
			if (!empty($file['name'])) {
				$name = $file['name'];

				$tmp = $file['tmp_name'];

				$basename = explode(".", $name);
				// $basename = end($basename);
				$extension = end($basename);
				$extension = strtolower($extension);

				if (in_array($extension, ['jpg','png','jpeg'])) {
					$new_file = time() . "-" . $name;
					$upload_path = $path . "/" . $new_file;

					$check = move_uploaded_file($tmp, $upload_path);
					if ($check) {
						return $new_file;
					}
					return false;
				}
			}
		}
	}
	return false;
}

?>