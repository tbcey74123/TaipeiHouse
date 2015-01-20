<?php
	require("sql/mysql_connection.php");

	$type = $_POST['type'];
	$name = input_test($_POST['name']);
	$sex = $_POST['sex'];
	$cel = input_test($_POST['celphone']);
	$tel = input_test($_POST['telephone']);
	$mail = input_test($_POST['mail-address']);
	$comments = input_test($_POST['comments']);

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
		echo "<a href=\"business.php\">點此返回</a>";
	}

function input_test($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES);
	return $data;
}

?>

<head>
<meta charset="utf-8">
</head>
