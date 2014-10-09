<?
	session_start();
	if(!$_SESSION['login']){
		header("Location:".$_SEVER['DOCUMENT_ROOT']."admin.php");
	}
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
		<form action="add.php" method="POST" onsubmit="return check_input();">
		案名：<input type="text" name="name"><br/>
		門牌地址：<input type="text" name="address"><br/>
		格局：<input type="text" name="structure"><br/>
		建物面積：<input type="text" name="acreage"><br/>
		地段：<input type="text" name="location"><br/>
		地坪：<input type="text" name="floor"><br/>
		物件用途：<select name="housetype">
				<option value="space" disabled="disabled" selected="selected">請選擇</option>
				<option value="A">A.住宅</option> 
			  <select><br/>
		<input type="submit" value="送出">
		</form>
	</div>
</body>
</html>
