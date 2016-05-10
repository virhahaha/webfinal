<?php
require_once ('../model/user.php');
session_start ();
$erors = array ();

if (isset ( $_POST ['pwd_new'] ) && isset ( $_POST ['pwd_again'] )) {
	$_POST = array_map ( "strip_tags", $_POST );
	$_POST = array_map ( "trim", $_POST );
	
	if (strlen ( $_POST ['pwd_new'] ) < 1)
		$erors [] = 'Password must contain minimum 1 characters';
	if (strlen ( $_POST ['pwd_again'] ) < 1)
		$erors [] = 'Confirm Password must contain minimum 1 characters';
	
	if ($_POST ['pwd_new'] == $_POST ['pwd_again']) {
		if (count ( $erors ) < 1) {
			$user = new User();
			$new = $_POST ['pwd_new'];
			$id = $_SESSION ['id'];
			$user->updatepw($id, $new);
			Header ( 'Location:../search_room.php' );
		} else {
			echo implode ( '<br />', $erors );
		}
	} else {
		echo "Passwords do not match";
	}
} else {
	echo 'Fill each row in the form';
}
?>