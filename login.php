<?php
	require('admin/session_setting.php');
	session_start();
   $account = $_POST['account'];
   $passwd = $_POST['passwd'];

   if($account == "root" && $passwd == "123456"){
	   $_SESSION['login'] = "1";
	   $_SESSION['login_time']= time();
	   header("Location:admin/admin.php");
   }else{
	   header("Location:admin.php");
   } 
?>
