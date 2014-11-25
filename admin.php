<?php
	session_start();
 	if($_SESSION['login']=="1"){
 	      header("Location:admin/admin.php");
 	      exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
   <title>TaipeiHouse</title>
   <meta charset="utf-8">
</head>
<body>
   <form action="login.php" method="post">
   帳號：<input type="text" name="account"><br/>
   密碼：<input type="password" name="passwd"><br/>
   <input type="submit" value="送出">
   </form>
</body>
</html>
