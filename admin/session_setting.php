<?php

function start_session($expire = 0) {

	session_start();
	
	if(!$_SESSION['login']) {
		header("location:../admin.php");
		exit;
	}else if((time() - $_SESSION['login_time']) > 3600) {
		session_destroy();
		header("location:../admin.php");
		exit;
	}

	$_SESSION['login_time'] = time();
	setcookie('PHPSESSID', session_id(), time() + $expire);	
}

?>
