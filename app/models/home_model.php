<?php

//PRODUCT

function getAllDataSp() {
	$sql = "SELECT * FROM products ";
	$conn = connection();
	$stmt = $conn->prepare($sql);
	$dataList = [];

	if ($stmt) {
		if ($stmt->execute()) {
			if ($stmt->rowCount()>0) {
				$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $dataList;
}

function getAllDataSpByPage($start=1, $limit=10, $keyword='') {
	$sql = "SELECT * FROM products AS a INNER JOIN categories AS b ON a.id_category = b.id_cate INNER JOIN types AS c ON a.id_type = c.id WHERE a.name_pro LIKE :key ORDER BY a.create_time DESC LIMIT :start,:per_page";
	$keyword  = "%". $keyword ."%";
	$conn = connection();
	$stmt = $conn->prepare($sql);
	$dataList = [];
	if ($stmt) {
		$stmt->bindValue(":key", $keyword, PDO::PARAM_STR);
		$stmt->bindValue(":start", $start, PDO::PARAM_INT);
		$stmt->bindValue(":per_page", $limit, PDO::PARAM_INT);
		if ($stmt->execute()) {
			if ($stmt->rowCount()>0) {
				$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $dataList;
}

function getDataSpByID($id) {
	$sql = "SELECT * FROM products WHERE id_pro = :id";
	$conn = connection();
	$stmt = $conn->prepare($sql);

	$data = [];
	if ($stmt) {
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		if ($stmt->execute()) {
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $data;
}

function editView($id,$view){
	$flag = FALSE;
	$conn = connection();
	$sqlUpdate = "UPDATE products SET view = :view WHERE id_pro = :id";
	$stmt =  $conn->prepare($sqlUpdate);
	if ($stmt) {
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->bindParam(":view",$view,PDO::PARAM_INT);
		if ($stmt->execute()) {
			$flag = TRUE;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}

// CATEGORY

function getAllDataLoaiSp() {
	$sql = "SELECT * FROM categories ";
	$conn = connection();
	$stmt = $conn->prepare($sql);
	$dataList = [];

	if ($stmt) {
		if ($stmt->execute()) {
			if ($stmt->rowCount()>0) {
				$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $dataList;
}

function getAllDataLoaispByPage($start=1, $limit=10, $keyword='') {
	$sql = "SELECT * FROM categories AS a INNER JOIN types AS b ON a.id_type = b.id WHERE a.name LIKE :key LIMIT :start,:per_page";
	$keyword  = "%". $keyword ."%";
	$conn = connection();
	$stmt = $conn->prepare($sql);
	$dataList = [];
	if ($stmt) {
		$stmt->bindValue(":key", $keyword, PDO::PARAM_STR);
		$stmt->bindValue(":start", $start, PDO::PARAM_INT);
		$stmt->bindValue(":per_page", $limit, PDO::PARAM_INT);
		if ($stmt->execute()) {
			if ($stmt->rowCount()>0) {
				$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $dataList;
}

function getDataLoaispByID($id) {
	$sql = "SELECT * FROM categories WHERE id_cate = :id";
	$conn = connection();
	$stmt = $conn->prepare($sql);

	$data = [];
	if ($stmt) {
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		if ($stmt->execute()) {
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $data;
}

// TYPE

function getAllDataLoai() {
	$sql = "SELECT * FROM types ";
	$conn = connection();
	$stmt = $conn->prepare($sql);
	$dataList = [];

	if ($stmt) {
		if ($stmt->execute()) {
			if ($stmt->rowCount()>0) {
				$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $dataList;
}

// FEEDBACK

function themPhanhoi($id_customer, $id_product, $content) {
	$sql = "INSERT INTO feedbacks(id_customer, id_product, content, create_time) VALUES(:id_customer, :id_product, :content, :create_time)";

	$create_time = date("Y-m-d H:i:s");

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = false;
	if ($stmt) {
		$stmt->bindValue(":id_customer", $id_customer, PDO::PARAM_INT);
		$stmt->bindParam(":id_product",$id_product,PDO::PARAM_INT);
		$stmt->bindValue(":content", $content, PDO::PARAM_STR);		
		$stmt->bindValue(":create_time", $create_time, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = true;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}

function getAllDataPhanhoi() {
	$sql = "SELECT * FROM feedbacks AS a INNER JOIN customers AS b ON a.id_customer = b.id ";
	$conn = connection();
	$stmt = $conn->prepare($sql);
	$dataList = [];

	if ($stmt) {
		if ($stmt->execute()) {
			if ($stmt->rowCount()>0) {
				$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $dataList;
}

// ORDER
function Dathang($id_customer, $name_customer, $id_product, $name_product, $address, $quantity, $price, $amount) {
	$sql = "INSERT INTO orders(id_customer, name_customer, id_product, name_product, address, quantity, price, amount, create_time) VALUES(:id_customer, :name_customer, :id_product, :name_product, :address, :quantity, :price, :amount, :create_time)";

	$create_time = date("Y-m-d H:i:s");

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = false;
	if ($stmt) {
		$stmt->bindValue(":id_customer", $id_customer, PDO::PARAM_INT);
		$stmt->bindValue(":name_customer", $name_customer, PDO::PARAM_STR);
		$stmt->bindValue(":id_product",$id_product,PDO::PARAM_STR);
		$stmt->bindValue(":name_product", $name_product, PDO::PARAM_STR);	
		$stmt->bindValue(":address", $address, PDO::PARAM_STR);
		$stmt->bindValue(":quantity", $quantity, PDO::PARAM_STR);
		$stmt->bindValue(":price", $price, PDO::PARAM_STR);
		$stmt->bindValue(":amount", $amount, PDO::PARAM_STR);
		$stmt->bindValue(":create_time", $create_time, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = true;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}

function getDataOrder() {
	$sql = "SELECT * FROM orders ORDER BY create_time DESC";
	$conn = connection();
	$stmt = $conn->prepare($sql);

	$dataList = [];

	if ($stmt) {
		if ($stmt->execute()) {
			if ($stmt->rowCount()>0) {
				$dataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $dataList;
}

//ORDER DETAIL

function Addchitietdonhang($id_order, $amount) {
	$sql = "INSERT INTO orderdetails(id_order, amount, create_time) VALUES(:id_order, :amount, :create_time)";

	$create_time = date("Y-m-d H:i:s");

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = false;
	if ($stmt) {
		$stmt->bindValue(":id_order", $id_order, PDO::PARAM_INT);
		$stmt->bindValue(":amount", $amount, PDO::PARAM_STR);
		$stmt->bindValue(":create_time", $create_time, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = true;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}

?>