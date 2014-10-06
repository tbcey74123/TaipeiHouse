<?php
   session_start();
   if(!$_SESSION['login']){
	   header("Location:../admin.php");
	   exit;
   }
?>
<html>
<head>
    <title>TaipeiHouse</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>TEST</h1>
    <a href="admin_add.php">新增物件</a><br/>
    <a href="admin_update.php">更新物件資料</a><br/>
    <a href="admin_pic_maintain.php">更改物件圖片</a><br/>
    <a href="admin_request.php">查看委託</a><br/>
    <a href="logout.php">登出</a>
</body>
</html>
