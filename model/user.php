<?php
class User {
	private $conn;
	public function __construct() {
		require('/var/www/mysql.php');
		
		// Create connection
		$this->conn = new mysqli ( $host, $user, $password, $dbname );
		// Check connection
		if ($this->conn->connect_error) {
			die ( "Connection failed: " . $this->conn->connect_error );
		}
	}
	public function getByID($id) {
		$sql = "SELECT * FROM users WHERE `id` = " . $id;
		$result = $this->conn->query ( $sql );
		return $result;
	}
	public function getByNameAndPass($name, $pass) {
		$sql = "SELECT * FROM users WHERE username='$name' and password='$pass'";
		$result = $this->conn->query ( $sql );
		return $result;
	}
	public function getAll() {
		$sql = "SELECT * FROM users";
		$result = $this->conn->query ( $sql );
		return $result;
	}
	public function add($newuser) {
		$sql = "INSERT INTO users (name, contact, address, username, password, email)
				VALUES ('" . $this->conn->real_escape_string($newuser ['name']) . "', '"
						   . $this->conn->real_escape_string($newuser ['contact']) . "', '"
						   . $this->conn->real_escape_string($newuser ['address']) . "', '"
						   . $this->conn->real_escape_string($newuser ['username']) . "', '"
						   . sha1($this->conn->real_escape_string($newuser ['password'])) . "', '"
						   . $this->conn->real_escape_string($newuser ['email']) . "')";
		if ($this->conn->query ( $sql ) === FALSE) {
			echo 'Error: ' . $this->conn->error . '<br />';
		}
	}
	public function updatepw($userid, $new) {
		$new = sha1($this->conn->real_escape_string ($new));
		$sql = "UPDATE users SET password='$new' WHERE id='$userid' ";
		if ($this->conn->query ( $sql ) === FALSE) {
			echo 'Error: ' . $this->conn->error . '<br />';
		}
	}
}
?>