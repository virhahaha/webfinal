<?php
class Reservation {
	//private $conn;
	//require_once(../mysql.php)

	public function insert($reserve) {
		$sql = "INSERT INTO reservations (user_id, room_id, checkin_date, checkout_date, reservation_date) 
				VALUES ('" . $this->conn->real_escape_string ( $reserve ['user_id'] ) . "','" . $this->conn->real_escape_string ( $reserve ['room_id'] ) . "', '" . $this->conn->real_escape_string ( $reserve ['checkin_date'] ) . "', '" . $this->conn->real_escape_string ( $reserve ['checkout_date'] ) . "', '" . $this->conn->real_escape_string ( $reserve ['reservation_date'] ) . "')";
		
		if ($this->conn->query ( $sql ) === FALSE) {
			echo 'Error: ' . $this->conn->error . '<br />';
		}
	}
	
	public function query($id) {
		$sql = "SELECT room_code, price, bed, checkin_date, checkout_date, reservation_date from reservations join rooms on rooms.id = reservations.room_id where user_id = $id ";
		$result = $this->conn->query ( $sql );
		return $result;
	}
	
	public function querycurrent($id) {
		$sql = "SELECT room_code, price, bed, checkin_date, checkout_date, reservation_date from reservations join rooms on rooms.id = reservations.room_id where user_id = $id and rooms.booked = 'yes'";
		$result = $this->conn->query ( $sql );
		return $result;
	}
	
	public function getPoint($id) {
		$sql = "SELECT count(*) from reservations where user_id = $id ";
		$result = $this->conn->query ( $sql );
		return $result;
	}
}
?>