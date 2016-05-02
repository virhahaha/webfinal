<?php
class User {
		//require($mysql)
		//$conn
		
		public function getByID($id) {
		$sql = "SELECT * FROM users WHERE `id` = " . $id;
		$result = $this->conn->query ( $sql );
		return $result;
	}
	public function getByNameAndPass($name, $pass) {
		$sql = "SELECT * FROM `users` WHERE `username`='$name' && `password`='$pass'";
		$result = $this->conn->query ( $sql );
		return $result;
	}
	public function getAll() {
		$sql = "SELECT * FROM users";
		$result = $this->conn->query ( $sql );
		return $result;
	}
}
?>