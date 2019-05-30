<?php

function getAllData() {
	$data = array();
		$conn = connection();
		$sql  = "SELECT * FROM images ";
		$stmt = $conn->prepare($sql);
		if ($stmt) {
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

function getDataInfo($id){
		$data = array();
		$conn = connection();
		$sql  = "SELECT * FROM images WHERE id = :id";
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

function editData($id,$logo,$header,$footer){
		$flag = FALSE;
		$update_time = date("Y-m-d H:s:i");
		$conn = connection();
		$sqlUpdate = "UPDATE images SET logo = :logo, header = :header, footer = :footer, update_time = :update_time WHERE id = :id";
		$stmt =  $conn->prepare($sqlUpdate);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			$stmt->bindParam(":logo",$logo,PDO::PARAM_STR);
			$stmt->bindParam(":header",$header,PDO::PARAM_STR);
			$stmt->bindParam(":footer",$footer,PDO::PARAM_STR);
			$stmt->bindParam(":update_time",$update_time,PDO::PARAM_STR);
			if ($stmt->execute()) {
				$flag = TRUE;
			}
			$stmt->closeCursor();
		}
		disconnect($conn);
		return $flag;
	}