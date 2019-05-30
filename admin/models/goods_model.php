<?php 

// INDEX
//hiển thị (tìm kiếm)
function getAllDataMathang($keyword = '') {
	$data = array();
	$conn = connection();
	$key = "%" . $keyword . "%";
	$sql  = "SELECT * FROM types as a WHERE a.nametype LIKE :key ";
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

// CREATE
// check xem tên có trong db chưa
function checkExitNameMathang($name){
	$flag = TRUE;
	$conn = connection();
	$sql  = "SELECT * FROM types WHERE nametype = :name";
	$stmt = $conn->prepare($sql);
	if ($stmt) {
		$stmt->bindParam(":name",$name,PDO::PARAM_STR);
		if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) { // tức là có dữ liệu trả về
					$flag = FALSE;
				}
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}
	// thêm
	function themMathang($name) {
		$sql = "INSERT INTO types(nametype) VALUES (:name);";

		$create_time = date("Y-m-d H:i:s");

		$conn = connection();

		$stmt = $conn->prepare($sql);

		$flag = false;
		if ($stmt) {
			$stmt->bindValue(":name", $name, PDO::PARAM_STR);
			if ($stmt->execute()) {
				$flag = true;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}

// DELETE
	function getDataInfoGoods($id){
		$data = array();
		$conn = connection();
		$sql  = "SELECT * FROM types WHERE id = :id";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $data;
	}
	function deleteDataGoods_model($id){
		$flag = FALSE;
		$conn = connection();
		$sql  = "DELETE FROM types WHERE id = :id";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}
