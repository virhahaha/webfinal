<?php
session_start ();
unset ( $_SESSION ['id'] );
session_destroy ();
Header ( 'Location:login.php' );
?>