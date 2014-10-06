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
	<meta http-equiv="cache-control" content="max-age=0">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="-1">
	<link type="text/css" rel="stylesheet" href="admin.css">
	<script type="text/javascript" src="admin.js"></script>
</head>
<body>
	<div id="left-part">
		<a href="admin.php">返回</a>
	</div>
	<div id="right-part">
	<?php
		require("../sql/mysql_connection.php");
		$sql = "SELECT * FROM houses ORDER BY id";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_all($result);
		$length = count($row);

		$id = $_GET['id'];
		if($id){
			$t_sql = "SELECT * FROM houses WHERE id = $id";
			$t_result = mysqli_query($con,$t_sql);
			$t_row = mysqli_fetch_array($t_result);
		}
?>
	請選擇欲操作的物件名稱：<select onchange="change_page(event.target.value);">
				<option value=""> 請選擇</option>
	<?php
		for($i=0;$i<$length;$i++){
			if($row[$i][0]==$id){
				echo "<option value=\"".$row[$i][0]."\" selected=\"selected\">".  $row[$i][1]."</option>";	
			}else{	
				echo "<option value=\"".$row[$i][0]."\">".$row[$i][1]."</option>";
			}
		}	
		echo "</select>";
	?>
		<div id="pic_upload">
			<form action="pic_upload.php" method="POST" enctype="multipart/form-data" onsubmit="return check_pic_upload();">
				<div id="form">
					<input type="hidden" name="house_id" value="<?php echo $t_row[0] ;?>">
					<input type="file" name="pic1"><br/>
					<input type="file" name="pic2"><br/>
					<input type="file" name="pic3"><br/>
				</div>				
				<br/>
				<button type="button" name="add_column" onclick="addC();">新增欄位</button>
				<input type="submit" value="送出">
			 </form>
			 <p style="color:red">圖片請上傳jpg檔，建議圖片長寬比3：5</p>
		</div>

	</div>
	<div id="pic_display">
		<div id="thumbnail">
			<ul onclick="changePic_houses(event.target);">
			<?php
				$location = "../pic/houses/case-".$id."/";
				$i = 1;
				while(file_exists($location."pic".$i.".jpg")){
					echo "<li><img src='../pic/houses/case-".$id."/pic".$i.".jpg?".rand()."' /></li>";
					$i++;
				}
			?>
			</ul>
		</div>
		<div id="pic_div">
			<img id="pic" />
			<button id="delete" type="button">刪除圖片</button>
		</div>
	</div>
</body>
</html>
