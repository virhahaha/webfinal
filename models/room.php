<?php
class Room {
	private $conn;
	public function __construct() {
	//require_once('/var/www/mysql.php');
		$host="localhost";
		$user="web";
		$password="123456";
		$dbname="cs332";
		
		$this->conn = new mysqli ( $host, $user, $password, $dbname );
		if ($this->conn->connect_error) {
			die ( "Connection failed: " . $this->conn->connect_error );
		}
	}
	public function query($room_code, $bed, $booked) {
		$where_room_code = "";
		$where_bed = "";
		$where_booked = "";
		$andFlag = false;
		$and = array (
				"",
				"" 
		);
		if ($room_code != "") {
			$where_room_code = " `room_code`='$room_code'";
			$andFlag = true;
		}
		if ($bed != "any") {
			$where_bed = " `bed`='$bed'";
			if ($andFlag)
				$and [0] = " AND ";
			$andFlag = true;
		}
		if ($booked != "any") {
			$where_booked = " `booked`='$booked'";
			if ($andFlag)
				$and [1] = " AND ";
			$andFlag = true;
		}
		$where = "";
		if ($andFlag)
			$where = "WHERE ";
		$wheresql = $where . $where_room_code . $and [0] . $where_bed . $and [1] . $where_booked;
		$sql = "SELECT * FROM `rooms` " . $where . $where_room_code . $and [0] . $where_bed . $and [1] . $where_booked;
		$result = $this->conn->query ( $sql );
		return $result;
	}
	
	public function getAll() {
		$sql = "SELECT * FROM rooms";
		$result = $this->conn->query ( $sql );
		return $result;
	}

	public function bookRoom($room_id) {
		$room_id = $this->conn->real_escape_string($room_id);
		$sql = "UPDATE rooms SET booked='yes' WHERE id=' $room_id'";
		if ($this->conn->query ( $sql ) === FALSE) {
			echo 'Error: ' . $this->conn->error . '<br />';
		}
	}
	public function checkoutRoom($room_id) {
		$room_id = $this->conn->real_escape_string($room_id);
		$sql = "UPDATE rooms SET booked='no' WHERE id=' $room_id'";
		if ($this->conn->query ( $sql ) === FALSE) {
			echo 'Error: ' . $this->conn->error . '<br />';
		}
	}
}
?>