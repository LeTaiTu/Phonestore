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


// CATEGORY

function getAllDataHangSp() {
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

// SLIDE

function getAllDataSlide() {
	$sql = "SELECT * FROM slides ";
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