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
		$sql  = "SELECT * FROM orders AS a WHERE a.name_customer LIKE :key ORDER BY a.create_time DESC LIMIT :start,:limitdata ";
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
//EDIT
function getDataInfoDonhang($id){
	$data = array();
	$conn = connection();
	$sql  = "SELECT * FROM orders WHERE id = :id";
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
function editDataDonhang($id,$order_status){
	$flag = FALSE;
	$conn = connection();
	$update_time = date('Y-m-d H:i:s');
	$sqlUpdate = "UPDATE orders SET order_status = :order_status, update_time = :update_time WHERE id = :id";
	$stmt =  $conn->prepare($sqlUpdate);
	if ($stmt) {
		$stmt->bindParam(":id",$id,PDO::PARAM_INT);
		$stmt->bindParam(":order_status",$order_status,PDO::PARAM_STR);
		$stmt->bindParam(":update_time",$update_time,PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = TRUE;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}


?>