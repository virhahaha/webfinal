<?php
require_once ('../model/reservation.php');
require_once ('../model/room.php');
session_start ();
$erors = array ();

if (isset ( $_POST ['name'] ) && isset ( $_POST ['address'] ) && isset ( $_POST ['contact'] ) && isset ( $_POST ['room_id'] ) && isset ( $_POST ['checkin_date'] ) && isset ( $_POST ['checkout_date'] ) && isset ( $_POST ['reservation_date'] )) {
	$_POST = array_map ( "strip_tags", $_POST );
	$_POST = array_map ( "trim", $_POST );
	
	if (strlen ( $_POST ['name'] ) < 1)
		$erors [] = 'Name must contain minimum 1 characters';
	if (strlen ( $_POST ['address'] ) < 1)
		$erors [] = 'Address must contain minimum 1 characters';
	if (strlen ( $_POST ['contact'] ) < 1)
		$erors [] = 'Contact must contain minimum 1 characters';
	if (strlen ( $_POST ['room_id'] ) < 1)
		$erors [] = 'Room_id must contain minimum 1 characters';
	if (strlen ( $_POST ['checkin_date'] ) < 8)
		$erors [] = 'Check In date must contain minimum 8 characters';
	if (strlen ( $_POST ['checkout_date'] ) < 8)
		$erors [] = 'Check Out date must contain minimum 8 characters';
	if (strlen ( $_POST ['reservation_date'] ) < 8)
		$erors [] = 'Reservation date must contain minimum 8 characters';
	
	if (count ( $erors ) < 1) {
		$reservation = new Reservation ();
		
		$reserve ['user_id'] = $_SESSION ['id'];
		$reserve ['room_id'] = $_POST ['room_id'];
		$reserve ['checkin_date'] = $_POST ['checkin_date'];
		$reserve ['checkout_date'] = $_POST ['checkout_date'];
		$reserve ['reservation_date'] = $_POST ['reservation_date'];
		$reservation->insert ( $reserve );
		
		$room = new Room();
		$room->bookRoom($_POST ['room_id']);
		
		Header ( 'Location:../search_room.php' );
	} else {
		echo implode ( '<br />', $erors );
	}
} else {
	echo 'No data from form';
}
?>