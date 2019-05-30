<?php

// INDEX
//hiển thị ( + tìm kiếm)
function getAllDataDonhang($keyword = '') {
	$data = array();
		$conn = connection();
		$key = "%" . $keyword . "%";
		$sql  = "SELECT * FROM orders as a WHERE a.name_customer LIKE :key ";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":key",$key,PDO::PARAM_STR);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $data;
}
// + phân trang
function getAllDataDonhangByPage($start,$limit,$keyword = ""){
		$data = array();
		$conn = connection();
		$key  = "%" . $keyword . "%";
		$sql  = "SELECT * FROM orders AS a WHERE a.name_customer LIKE :key LIMIT :start,:limitdata ";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":key",$key,PDO::PARAM_STR);
			$stmt->bindParam(":start",$start,PDO::PARAM_INT);
			$stmt->bindParam(":limitdata",$limit,PDO::PARAM_INT);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();// đóng con trỏ kết nối
		}
		disconnect($conn);
		return $data;
	}

	?>