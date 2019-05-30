<?php

function themThanhVien($name, $sex, $email, $birthday, $address, $phone, $password) {
	$sql = "INSERT INTO customers(name, sex, email, birthday, address, phone, password, create_time) VALUES(:name, :sex, :email, :birthday, :address, :phone, :password, :create_time);";

	$create_time = date("Y-m-d H:i:s");

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = false;
	if ($stmt) {
		$stmt->bindValue(":name", $name, PDO::PARAM_STR);
		$stmt->bindParam(":sex",$sex,PDO::PARAM_INT);
		$stmt->bindParam(":email",$email,PDO::PARAM_STR);
		$stmt->bindParam(":birthday",$birthday,PDO::PARAM_STR);
		$stmt->bindValue(":address", $address, PDO::PARAM_STR);
		$stmt->bindValue(":phone", $phone, PDO::PARAM_STR);
		$stmt->bindValue(":password", $password, PDO::PARAM_STR);
		$stmt->bindValue(":create_time", $create_time, PDO::PARAM_STR);
		if ($stmt->execute()) {
			$flag = true;
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}
// check xem có email chưa
function checkExitEmailThanhvien($email){
		$flag = true;
		$conn = connection();
		$sql  = "SELECT * FROM customers WHERE email = :email";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":email",$email,PDO::PARAM_STR);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) { // tức là có dữ liệu trả về
					$flag = false;
				}
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}

function loginAccount($email, $password) {
	$sql = "SELECT * FROM customers WHERE email =:email AND password = :password";

	$conn = connection();

	$stmt = $conn->prepare($sql);

	$flag = [];

	if ($stmt) {
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->bindValue(":password", $password, PDO::PARAM_STR);
		if ($stmt->execute()) {
			if ($stmt->rowCount() > 0) {
				$flag = $stmt->fetch(PDO::FETCH_ASSOC);
			}
		}
		$stmt->closeCursor();
	}
	disconnect($conn);
	return $flag;
}

// edit

function getDataInfoCustomer($id){
		$data = array();
		$conn = connection();
		$sql  = "SELECT * FROM customers WHERE id = :id";
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
function editDataCustomer($id,$name,$sex,$birthday,$address,$phone){
		$flag = FALSE;
		$conn = connection();
		$sqlEdit = "UPDATE customers SET name = :name, sex = :sex, birthday = :birthday, address = :address, phone = :phone WHERE id = :id ";
		$stmt = $conn->prepare($sqlEdit);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->bindParam(":name",$name,PDO::PARAM_STR);
			$stmt->bindParam(":sex",$sex,PDO::PARAM_INT);
			$stmt->bindParam(":birthday",$birthday,PDO::PARAM_STR);
			$stmt->bindParam(":address",$address,PDO::PARAM_STR);
			$stmt->bindParam(":phone",$phone,PDO::PARAM_STR);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}
function editDataPassCustomer($id,$password){
		$flag = FALSE;
		$conn = connection();
		$sqlEdit = "UPDATE customers SET password = :password WHERE id = :id ";
		$stmt = $conn->prepare($sqlEdit);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->bindParam(":password",$password,PDO::PARAM_STR);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}

// ORDER

function getAllDataOrderdetail() {
	$sql = "SELECT * FROM orderdetails AS a INNER JOIN orders AS b ON a.id_order = b.id ORDER BY a.create_time DESC";
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

function getAllDataOrder() {
	$sql = "SELECT * FROM orders ORDER BY a.create_time DESC";
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

function getAllDataOrderById($id) {
	$sql = "SELECT * FROM orders WHERE id = :id";
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

//delete
function deleteData_model($id){
		$flag = FALSE;
		$conn = connection();
		$sqlDelete = "DELETE FROM orders WHERE id = :id";
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

?>