<?php 

// INDEX
//hiển thị ( + tìm kiếm)
function getAllDataSlide($keyword = '') {
	$data = array();
	$conn = connection();
	$key = "%" . $keyword . "%";
	$sql  = "SELECT * FROM slides";
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
function getAllDataSlideByPage($start,$limit,$keyword = ""){
	$data = array();
	$conn = connection();
	$key  = "%" . $keyword . "%";
	$sql  = "SELECT * FROM slides AS a INNER JOIN types AS b ON a.id_type = b.id WHERE a.image LIKE :key ORDER BY a.create_time DESC LIMIT :start,:limitdata";
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

// CREATE
function themSlide($id_type,$image) {
	$sql = "INSERT INTO slides(id_type, image, create_time) VALUES(:id_type, :image, :create_time);";

	$create_time = date("Y-m-d H:i:s");

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = false;
	if ($stmt) {
		$stmt->bindValue(":id_type", $id_type, PDO::PARAM_INT);
		$stmt->bindValue(":image", $image, PDO::PARAM_STR);
		$stmt->bindValue(":create_time", $create_time, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = true;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}

// EDIT

function getDataInfoSlide($id_slide){
		$data = array();
		$conn = connection();
		$sql  = "SELECT * FROM slides WHERE id_slide = :id_slide";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":id_slide",$id_slide,PDO::PARAM_INT);
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
	// sửa dữ liệu
function editDataSlide($id_slide,$id_type,$image){
	$flag = FALSE;
	$conn = connection();
	$sqlUpdate = "UPDATE slides SET id_type = :id_type, image = :image WHERE id_slide = :id_slide";
	$stmt =  $conn->prepare($sqlUpdate);
	if ($stmt) {
		$stmt->bindParam(":id_slide",$id_slide,PDO::PARAM_INT);
		$stmt->bindParam(":id_type",$id_type,PDO::PARAM_INT);
		$stmt->bindParam(":image",$image,PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = TRUE;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}
//DELETE
function deleteDataSlide_model($id_slide){
	$flag = FALSE;
	$conn = connection();
	$sqlDelete = "DELETE FROM slides WHERE id_slide = :id_slide";
	$stmt = $conn->prepare($sqlDelete);
	if ($stmt) {
		$stmt->bindParam(":id_slide",$id_slide,PDO::PARAM_INT);
		if ($stmt->execute()) {
			$flag = TRUE;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}