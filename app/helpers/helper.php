<?php
	
	function createLink($url, $filters = []) {
		
		$query = [];
		foreach ($filters as $key => $value) {
			$query[] = "$key=$value";
		}
		return $url."?".implode("&",$query);
	}

	function paging($link, $total , $page, $limit, $keyword='') {
		$total_page = ceil($total/$limit);
		$currentPage = $page;
		$start = $limit * ($page - 1);
		$data = [];
		$html = '';

		if ($currentPage < 1) {
			$currentPage = 1;
		}
		elseif ($currentPage > $total_page) {
			$currentPage = $total_page;
		}

		$html .= '<nav aria-label="Page navigation">
  					<ul class="pagination">';

		if ($currentPage > 1 && $total_page > 1) {
			$html .= '<li>
					      <a href="'.str_replace("{page}", 1, $link).'" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					  </li>';
			$html .= '<li><a href="'. 
			str_replace("{page}", $currentPage - 1, $link) .'">Prev</a></li>';
		}
		for($i = 1; $i <= $total_page; $i++) {
			if ($currentPage == $i) {
			$html .= '<li class="active"><a href=">'. 
			str_replace("{page}", $i, $link) .'">' . $i . '</a></li>';
			}
			else {
				$html .= '<li><a href="' . str_replace("{page}", $i, $link) . '">' . $i . '</a></li>';
			}
		}
		// tao nut next
		if ($currentPage < $total_page && $total_page > 1) {
			$html .= '<li><a href="'. 
			str_replace("{page}", $currentPage + 1, $link) .'">Next</a></li>';

			$html .= '<li><a href="' . str_replace("{page}", $total_page, $link) . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
		}

		$html .= '</ul>
				</nav>';

		$data = array(
						'limit' => $limit, 
						'start' => $start, 
						'html' => $html, 
						'keyword' => $keyword);
		return $data;
	}

?>