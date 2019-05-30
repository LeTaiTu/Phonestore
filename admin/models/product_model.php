<?php 

// INDEX
//hiển thị ( + tìm kiếm)
function getAllDatasp($keyword = '') {
	$data = array();
		$conn = connection();
		$key = "%" . $keyword . "%";
		$sql  = "SELECT * FROM products AS a WHERE a.name_pro LIKE :key ";
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
function getAllDataspByPage($start,$limit,$keyword = ""){
		$data = array();
		$conn = connection();
		$key  = "%" . $keyword . "%";
		$sql  = "SELECT * FROM products AS a INNER JOIN categories AS b ON a.id_category = b.id_cate INNER JOIN types AS c ON a.id_type = c.id WHERE a.name_pro LIKE :key OR b.name LIKE :key ORDER BY a.create_time DESC LIMIT :start,:limitdata";
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
function themsp($id_category,$id_type,$image,$name_pro,$price,$content,$view) {
	$sql = "INSERT INTO products(id_category, id_type, image, name_pro, price, content, view, create_time) VALUES(:id_category, :id_type, :image, :name_pro, :price, :content, :view, :create_time);";

	$create_time = date("Y-m-d H:i:s");

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = false;
	if ($stmt) {
		$stmt->bindValue(":id_category", $id_category, PDO::PARAM_INT);
		$stmt->bindValue(":id_type", $id_type, PDO::PARAM_INT);
		$stmt->bindValue(":image", $image, PDO::PARAM_STR);
		$stmt->bindValue(":name_pro", $name_pro, PDO::PARAM_STR);
		$stmt->bindValue(":price", $price, PDO::PARAM_INT);
		$stmt->bindValue(":content", $content, PDO::PARAM_STR);
		$stmt->bindValue(":view", $view, PDO::PARAM_STR);
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

function getDataInfosp($id_pro){
		$data = array();
		$conn = connection();
		$sql  = "SELECT * FROM products WHERE id_pro = :id_pro";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":id_pro",$id_pro,PDO::PARAM_INT);
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
	function editDatasp($id_pro,$id_category,$id_type,$image,$name_pro,$price,$content){
		$flag = FALSE;
		$conn = connection();
		$sqlUpdate = "UPDATE products SET id_category = :id_category, id_type = :id_type, image = :image, name_pro = :name_pro, price = :price, content = :content WHERE id_pro = :id_pro";
		$stmt =  $conn->prepare($sqlUpdate);
		if ($stmt) {
			$stmt->bindParam(":id_pro",$id_pro,PDO::PARAM_INT);
			$stmt->bindParam(":id_category",$id_category,PDO::PARAM_INT);
			$stmt->bindParam(":id_type",$id_type,PDO::PARAM_INT);
			$stmt->bindParam(":image",$image,PDO::PARAM_STR);
			$stmt->bindParam(":name_pro",$name_pro,PDO::PARAM_STR);
			$stmt->bindParam(":price",$price,PDO::PARAM_STR);
			$stmt->bindParam(":content",$content,PDO::PARAM_STR);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}

//DELETE
	function deleteDatasp_model($id_pro){
		$flag = FALSE;
		$conn = connection();
		$sqlDelete = "DELETE FROM products WHERE id_pro = :id_pro";
		$stmt = $conn->prepare($sqlDelete);
		if ($stmt) {
			$stmt->bindParam(":id_pro",$id_pro,PDO::PARAM_INT);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}