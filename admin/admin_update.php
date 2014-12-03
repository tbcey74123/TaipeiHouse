<?php
	session_start();
	if(!$_SESSION['login']){
		header("Location:../admin.php");
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
	<?php
		require ("../sql/mysql_connection.php");
		$sql = "SELECT * FROM houses ORDER BY id";
		$result = mysqli_query($con,$sql);
		//$row = mysqli_fetch_all($result);
		while($tmp = mysqli_fetch_assoc($result)) {
			$row[] = $tmp;
		}
		
		$length = count($row);

		$id = $_GET['id'];
		if($id){
			$t_sql = "SELECT * FROM houses WHERE id = $id";
			$t_result = mysqli_query($con,$t_sql);
			$t_row = mysqli_fetch_array($t_result);
		}
	?>
	請選擇欲更改的物件名稱：<select onchange="change_page(event.target.value);">
				<option value=""> 請選擇</option>
	<?php
		for($i=0;$i<$length;$i++){
			if($row[$i]["id"]==$id){
				echo "<option value=\"".$row[$i]["id"]."\" selected=\"selected\">".  $row[$i]["name"]."</option>";	
			}else{	
				echo "<option value=\"".$row[$i]["id"]."\">".$row[$i]["name"]."</option>";
			}
		}	
		echo "</select>";
	?>
		<div id="house_info">
			<form action="update.php" method="POST" onsubmit="return check_input();">
			<input type="hidden" name="id" value="<?php       echo $t_row[0] ;?>">
			案名：<input type="text" name="name" value="<?php echo $t_row[1] ;?>"><br/>
			門牌地址：<input type="text" name="address" value="<?php echo $t_row[2] ;?>" size="40"><br/>
			格局：<input type="text" name="structure" value="<?php echo $t_row[3] ;?>"><br/>
			建物面積：<input type="text" name="acreage" value="<?php echo $t_row[4] ;?>"><br/>
			地段：<input type="text" name="location" value="<?php echo $t_row[5] ;?>"><br/>
			地坪：<input type="text" name="floor" value="<?php  echo $t_row[6] ;?>"><br/>
			<?php
				if($t_row[9]=="1"){
					echo "<input type=\"checkbox\" name=\"hot\" value=\"1\" checked>設成熱門物件<br/>";
				}else{
					echo "<input type=\"checkbox\" name=\"hot\" value=\"1\">設成熱門物件<br/>";	
				}
			      ?>
			 <input type="submit" value="送出">
			 </form>
		</div>

	</div>
</body>
</html>
