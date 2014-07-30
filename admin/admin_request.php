<?php
	session_start();
	if(!$_SESSION['login']){
		header("Location:/admin.php");
	}
?>
<html>
<head>
	<title>TaipeiHouse</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="admin.css">
	<script type="text/javascript" src="admin.js"></script>
</head>
<body>
	<div id="left-part">
		<a href="/admin/admin.php">返回</a>
	</div>
	<div id="right-part">
	<?php
		require($_SERVER['DOCUMENT_ROOT']."/sql/mysql_connection.php");
		$sql = "SELECT `type`,`name` FROM `request` ORDER BY `id`";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_all($result);
		$length = count($row);

		echo "<table>";
		echo "<tr><td>委託類型</td><td>委託人</td></tr>";
		for( $i = 0; $i < $length; $i++){
			echo "<tr>";
			echo "<td>";
			switch($row[$i][0]){
				case 'a': echo "買屋" ; break;
				case 'b': echo "賣屋" ; break;
				case 'c': echo "租屋" ; break;
				case 'd': echo "出租" ; break;
			}
			echo "</td>";
			echo "<td><a href=\"admin_request.php?name=".$row[$i][1]."\">".$row[$i][1]."</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
	</div>
	<div id="request_info">
		<?php
  			if($_GET['name']){
				$name = $_GET['name'];
				$Ssql = "SELECT * FROM `request` WHERE `name`='$name'";
			        $Sresult = mysqli_query($con,$Ssql);
				$Srow = mysqli_fetch_row($Sresult);
				
				echo "委託：";
				switch($Srow[1]){
					case 'a': echo "買屋" ; break;
					case 'b': echo "賣屋" ; break;
					case 'c': echo "租屋" ; break;
					case 'd': echo "出租" ; break;
				}	
				echo "<br/>";
				echo "姓名：".$Srow[2]."<br/>";
				echo "性別：";
				switch($Srow[3]){
					case '0': echo "女" ; break;
					case '1': echo "男" ; break;
				}
				echo "<br/>";
				echo "行動電話：".$Srow[4]."&nbsp住家電話：".$Srow[5]."<br/>";
				echo "信箱：".$Srow[6]."<br/>";
				echo "其他意見：<br/>";
				echo nl2br($Srow[7]);
			}
		?>
	</div>
</body>
</html>
