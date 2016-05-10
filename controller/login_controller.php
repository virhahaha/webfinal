<?php
require_once ('../model/user.php');
$erors = array ();
if (session_id () == "") {
	session_start ();
}

if (isset ( $_POST ['register'] )) {
	Header ( 'Location:../register.php' );
}

if (isset ( $_POST ['username'] ) && isset ( $_POST ['password'] )) {
	// the minimum number of characters
	if (strlen ( $_POST ['username'] ) < 1)
		$erors [] = 'Username must contain minimum 1 characters';
	if (strlen ( $_POST ['password'] ) < 1)
		$erors [] = 'Password must contain minimum 1 characters';
	if (count ( $erors ) < 1) {
		$name = $_POST ['username'];
		$pass = sha1 ( $_POST ['password'] );
		$user = new User ();
		$result = $user->getByNameAndPass ( $name, $pass );
		if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				$_SESSION ['usertype'] = $row ['type'];
				$_SESSION ['username'] = $row ['username'];
				$_SESSION ['id'] = $row ['id'];
				Header ( 'Location:../search_room.php' );
			}
		} else {
			echo 'No match found ' . $name . ' '. $pass;
		}
	} else {
		echo implode ( '<br />', $erors );
		echo '</br>' . 'Fill in rows properly.';
	}
}
?>