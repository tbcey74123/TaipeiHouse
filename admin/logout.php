<?php
   session_start();
   if($_SESSION['login']==1){
	   unset($_SESSION['login']);
   }
   header("Location:http://192.168.1.10/admin.php");
?>
