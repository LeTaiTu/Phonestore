<?php 

// INDEX
//hiển thị (tìm kiếm)
function getAllDataThanhVien($keyword = '') {
	$data = array();
		$conn = connection();
		$key = "%" . $keyword . "%";
		$sql  = "SELECT * FROM customers as a WHERE a.name LIKE :key ";
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
//phân trang
function getAllDataThanhvienByPage($start,$limit,$keyword = ""){
		$data = array();
		$conn = connection();
		$key  = "%" . $keyword . "%";
		$sql  = "SELECT * FROM customers AS a WHERE a.name LIKE :key OR a.email LIKE :key OR a.address LIKE :key OR a.phone LIKE :key ORDER BY a.create_time DESC LIMIT :start,:limitdata";
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

// EDIT
	// lấy dữ liệu để sửa và xóa
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
	// sử dữ liệu
function editDataCustomer($id,$name,$sex,$email,$birthday,$address,$phone,$password){
		$flag = FALSE;
		$conn = connection();
		$sqlEdit = "UPDATE customers SET name = :name, sex = :sex, email = :email, birthday = :birthday, address = :address, phone = :phone, password = :password WHERE id = :id ";
		$stmt = $conn->prepare($sqlEdit);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->bindParam(":name",$name,PDO::PARAM_STR);
			$stmt->bindParam(":sex",$sex,PDO::PARAM_INT);
			$stmt->bindParam(":email",$email,PDO::PARAM_STR);
			$stmt->bindParam(":birthday",$birthday,PDO::PARAM_STR);
			$stmt->bindParam(":phone",$phone,PDO::PARAM_STR);
			$stmt->bindParam(":address",$address,PDO::PARAM_STR);
			$stmt->bindParam(":password",$password,PDO::PARAM_STR);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}

// DELETE
	function deleteDataCustomer_model($id){
		$flag = FALSE;
		$conn = connection();
		$sql  = "DELETE FROM customers WHERE id = :id";
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
