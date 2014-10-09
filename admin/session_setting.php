<?php

	function start_session($expire = 0) {
		ini_set('session.gc_maxlifetime',$expire);

		session_start();
		setcookie('PHPSESSID', session_id(), time() + $expire);	
	}

?>
