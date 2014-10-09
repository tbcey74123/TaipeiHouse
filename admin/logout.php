<?php
   require('session_setting.php');
   session_start();

	$redirect = $_GET['redirect'];

	if($_SESSION['login']==1){
		session_destroy();
	}
   	if ($redirect != 0 || !$redirect) {
		header("Location:../index.php");
	}else {
		header("Location:./info.php");
	}

?>


