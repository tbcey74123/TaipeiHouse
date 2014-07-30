<?php
	require($_SERVER['DOCUMENT_ROOT']."/sql/mysql_connection.php");
	$type = $_GET['type'];
	$name = $_GET['name'];
	$sex = $_GET['sex'];
	$cel = $_GET['celphone'];
	$tel = $_GET['telephone'];
	$mail = $_GET['mail-address'];
	$comments = $_GET['comments'];

	switch($type){
		case 'buy' : $type = "a"; break;
		case 'sell' : $type = "b"; break;
		case 'rent' : $type = "c"; break;
		case 'rentout' : $type = "d"; break;
	}
	switch($sex){
		case 'male' : $sex = "1"; break;
		case 'female' : $sex = "0"; break;
	}
	$sql = "INSERT INTO `request` (`type`,`name`,`sex`,`celphone`,`telephone`,`mail`,`comments`) VALUES('$type','$name','$sex','$cel','$tel','$mail','$comments')";
	if(mysqli_query($con,$sql)){
		echo "委託成功<br/>";
		echo "<a href=\"/business.html\">點此返回</a>";
	}

?>
<head>
<meta charset="utf-8">
</head>
