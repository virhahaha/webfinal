<?php
require_once ('../model/user.php');
$erors = array ();
$regexp_mail = '/^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/';

if (isset ( $_POST ['name'] ) && isset ( $_POST ['contact'] ) && isset ( $_POST ['address'] ) && isset ( $_POST ['username'] ) && isset ( $_POST ['password'] ) && isset ( $_POST ['email'] )) {
	$_POST = array_map ( "strip_tags", $_POST );
	$_POST = array_map ( "trim", $_POST );
	
	if (strlen ( $_POST ['name'] ) < 1)
		$erors [] = 'Name must contain minimum 1 characters';
	if (strlen ( $_POST ['contact'] ) < 1)
		$erors [] = 'Contact must contain minimum 1 characters';
	if (strlen ( $_POST ['address'] ) < 1)
		$erors [] = 'Address must contain minimum 1 characters';
	if (strlen ( $_POST ['username'] ) < 1)
		$erors [] = 'Username must contain minimum 1 characters';
	if (strlen ( $_POST ['password'] ) < 1)
		$erors [] = 'Password must contain minimum 1 characters';
	if (! preg_match ( $regexp_mail, $_POST ['email'] ))
		$erors [] = 'Invalid e-mail address';
	
	if (count ( $erors ) < 1) {
		$user = new User ();
		
		$newuser ['name'] = $_POST ['name'];
		$newuser ['contact'] = $_POST ['contact'];
		$newuser ['address'] = $_POST ['address'];
		$newuser ['username'] = $_POST ['username'];
		$newuser ['password'] = $_POST ['password'];
		$newuser ['email'] = $_POST ['email'];
		$user->add ( $newuser );
		Header ( 'Location:../login.php' );
	} else {
		echo implode ( '<br />', $erors );
	}
} else {
	echo 'No data from form';
}
?>