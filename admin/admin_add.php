<?php
	require('session_setting.php');	
	start_session();   //This function declared in 'session_setting.php'.
?>
<html>
<head>
	<title>TaipeiHouse</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="admin.css">
	<script type="text/javascript" src="admin.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="admin-jquery.js"></script>
</head>

<body>
	<div id="left-part">
		<a href="admin.php">返回</a>
	</div>
	<div id="right-part">
		<form action="add.php" method="POST" enctype="multipart/form-data" onsubmit="return check_input();">
			<div id="add_info">
			　案名　：<input type="text" name="name"><br/>
			門牌地址：<input type="text" name="address"><br/>
			　格局　：<input type="text" name="structure"><br/>
			建物面積：<input type="text" name="acreage"><br/>
			　地段　：<input type="text" name="location"><br/>
			　地坪　：<input type="text" name="floor"><br/>
			物件用途：<select name="housetype">
			      		<option value="space" disabled="disabled" selected="selected">請選擇</option>
			      		<option value="A">A.住宅</option> 
			  	  <select><br/>
			          <input type="submit" value="送出">
				  <p style="color:red">圖片請上傳jpg檔</p>
				  <p style="color:red">建議圖片長寬比3：5，大小請大於500 * 300</p>
			</div>
			<div id="add_pic">
				<input type="hidden" name="target" value="house">
				<input type="file" name="pic1"><br/>
				<input type="file" name="pic2"><br/>
				<input type="file" name="pic3"><br/>
			</div>
				<button type="button" name="add_column" onclick="addC('add_pic');">新增欄位</button>
		</form>
	</div>
</body>
</html>
