<?php

session_start ();

unset ( $_SESSION ['id'] );

session_destroy ();

// connect to the login.php

?>