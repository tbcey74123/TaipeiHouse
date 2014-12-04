<?php
	require("session_setting.php");
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
	請選擇欲豪宅區域：<select onchange="location_change(event.target.value);">
<?php
	require("../sql/mysql_connection.php");
	$location = $_GET['location'];
	
	$Lsql = "SELECT * FROM mansion_location ORDER BY id";
	$Lresult = mysqli_query($con, $Lsql);
	while($tmp = mysqli_fetch_assoc($Lresult)){
		$Default[] = $tmp;
	}

	if($location) {
		echo "<option disabled=\"disabled\">請選擇</option>";
	}else {
		echo "<option seleted=\"seleted\">請選擇</option>";
	}

	foreach($Default as $a) {
		if($a['location'] == $location) {
			echo "<option value=\"" . $location . "\"selected=\"selected\">";
		}else {
			echo "<option value=\"" . $a['location'] . "\">";
		}
		echo $a['Chinese_name'];
		echo "</option>";

	}
?>
	</select>
	請選擇豪宅：<select onchange="mansion_change(event.target.value);">
<?php
	$id = $_GET['id'];
	$sql = "SELECT mansion_id, name, location FROM mansion WHERE location='$location' ORDER BY id";
	$result = mysqli_query($con, $sql);
	while($tmp = mysqli_fetch_assoc($result)) {
		$row[] = $tmp;
	}

	if($location && $id) {
		echo "<option disabled=\"disabled\">請選擇</option>";
	}else {
		echo "<option seleted=\"seleted\">請選擇</option>";
	}

	foreach($row as $mansion) {
		if($id && $id == $mansion['mansion_id']) {
			echo "<option value=\"" . $mansion['mansion_id'] . "\" selected=\"selected\">" . $mansion['name'] . "</option>";
		}else {
			echo "<option value=\"" . $mansion['mansion_id'] . "\">" . $mansion['name'] . "</option>";
		}
	}
	echo "</select><br/>";
?>
	<div id="pic_upload">
		<form action="pic_upload.php" method="POST"             enctype="multipart/form-data" onsubmit="return check_pic_upload();">
                	<div id="form">
                        	<input type="hidden"                    name="target" value="mansion">
				<input type="hidden"                    name="location" value="<?php 
	if($id && $location)
		echo $location; 
?>">
				<input type="hidden"                    name="house_id" value="<?php 
	if($id && $location)
		echo $id;
?>">
                                <input type="file" name="pic1"><br/>
                                <input type="file" name="pic2"><br/>
                                <input type="file" name="pic3"><br/>
                        </div>
                        <br/>
                        <button type="button" name="add_column"         onclick="addC();">新增欄位</button>
                        <input type="submit" value="送出">
               </form>
               <p style="color:                                       red">圖片請上傳jpg檔，建議圖片長寬比3：5，大小請大於500 * 300</p>
        </div>
	
	</div>	
	<div id="pic_display">
		<div id="thumbnail">
			<ul onclick="changePic_houses(event.target, 'mansion');">
<?php
	$pic_dir = "../pic/mansion/" . $location . "/mansion-" . $id . "/";
		$i = 1;
		while(file_exists($pic_dir . "pic" . $i . ".jpg")){
			echo "<li><img src=" . $pic_dir . "pic".$i.".jpg?".rand()."' /></li>";
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
