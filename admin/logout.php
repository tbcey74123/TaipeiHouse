<?php
   session_start();
   if($_SESSION['login']==1){
	   unset($_SESSION['login']);
   }
   header("Location:../index.php");
?>
