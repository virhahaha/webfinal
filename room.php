<?php
class Room {
	
	//require($mysql)
	//$conn;		
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
}
?>