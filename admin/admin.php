<?php
	require('session_setting.php');
	start_session();   //This function declared in 'session_setting.php'.`




?>
<html>
<head>
    <title>TaipeiHouse</title>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="admin-jquery.js"></script>
</head>
<body>
    <h1>TEST</h1>
    <a href="admin_add.php">新增物件</a><br/>
    <a href="admin_update.php">更新物件資料</a><br/>
    <a href="admin_pic_maintain.php">更改物件圖片</a><br/>
    <a href="admin_mansion_add.php">匯入豪宅資訊</a><br/>
    <a href="admin_mansion_location.php">管理豪宅區域</a><br/>
    <a href="admin_mansion_pic.php">管理豪宅圖片</a><br/>
    <a href="admin_mansion_update.php">查看豪宅資訊</a><br/>
    <a href="admin_request.php">查看委託</a><br/>
    <a href="logout.php?redirect=0">登出</a>
</body>
</html>
