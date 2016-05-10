<?php
require_once ('../model/room.php');
$errors = 'error';
if (isset ( $_GET ['room_id'] )) {
		$room = new Room ();
		$room->checkoutRoom ( $_GET ['room_id'] );
		
		Header ( 'Location:../search_room.php' );
	} else {
	echo implode ( '<br />', $erors );
	echo '</br>' . 'Fill in rows properly.';
}
?>