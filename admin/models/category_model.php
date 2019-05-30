<?php 

// INDEX
//hiển thị ( + tìm kiếm)
function getAllDataLoaisp($keyword = '') {
	$data = array();
		$conn = connection();
		$key = "%" . $keyword . "%";
		$sql  = "SELECT * FROM categories as a WHERE a.name LIKE :key ";
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
function getAllDataLoaispByPage($start,$limit,$keyword = ""){
		$data = array();
		$conn = connection();
		$key  = "%" . $keyword . "%";
		$sql  = "SELECT * FROM categories AS a WHERE a.name LIKE :key LIMIT :start,:limitdata ";
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
function themLoaisp($name, $logo) {
	$sql = "INSERT INTO categories(name, logo) VALUES(:name, :logo);";

	$create_time = date("Y-m-d H:i:s");

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = false;
	if ($stmt) {
		$stmt->bindValue(":name", $name, PDO::PARAM_STR);
		$stmt->bindValue(":logo", $logo, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = true;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}

//EDIT
function getDataInfoLoaisp($id){
		$data = array();
		$conn = connection();
		$sql  = "SELECT * FROM categories WHERE id_cate = :id";
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
	// sửa dữ liệu
	function editDataLoaisp($id,$name,$logo){
		$flag = FALSE;
		$updateTime = date("Y-m-d H:s:i");
		$conn = connection();
		$sqlUpdate = "UPDATE categories SET name = :name, logo = :logo WHERE id_cate = :id";
		$stmt =  $conn->prepare($sqlUpdate);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->bindParam(":name",$name,PDO::PARAM_STR);
			$stmt->bindParam(":logo",$logo,PDO::PARAM_STR);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}

//DELETE
	function deleteDataLoaisp_model($id){
		$flag = FALSE;
		$conn = connection();
		$sqlDelete = "DELETE FROM categories WHERE id_cate = :id";
		$stmt = $conn->prepare($sqlDelete);
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
