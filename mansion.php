<?php
	require("sql/mysql_connection.php");
	
	$sql = "SELECT mansion_id, name, location FROM mansion ORDER BY id";
	$result = mysqli_query($con,$sql);
	//$info = mysqli_fetch_all($result);
	while($row = mysqli_fetch_assoc($result)) {
		$info[] = $row;
	}
	
	$length = count($info);
	require("left_side.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>TaipeiHouse</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script/main.js"></script>
</head>
<body>
<?php
	output_leftside();
?>	
    <div id="right-side">
		<div id="search_bar">
			<form action="houses.php" method="GET" onsubmit="return check_search_input();">
				<input type="text" name="search">
				<input type="submit" value="查詢">
			</form>
		</div>
	<div class="shadow" id="content">
	<div id="house_list">
<?php
	$search = $_GET['search'];

	$Lsql = "SELECT * FROM mansion_location ORDER BY id";
	$Lresult = mysqli_query($con, $Lsql);
	while($tmp = mysqli_fetch_assoc($Lresult)) {
		$Default[] = $tmp;
	}


	if(!$search){
	   	if($Default) {
			foreach($Default as $a) {
				echo "<div class=\"location_unit shadow\"><h1>" . $a['Chinese_name'] . "</h1></div>";
				$j = 1;
				for ($i=0;$i<$length;$i++){
					if($info[$i]["location"] == $a['location']) {
						$pic_dir = "pic/mansion/" . $info[$i]["location"] . "/mansion-" . $info[$i]["mansion_id"] . "/";
						echo "<div class=\"mansion_unit\"><a href=\"mansion_info.php?location=" . $a['location'] . "&id=" . $info[$i]["mansion_id"] . "\"><img class=\"shadow\" src=\"";
						if(file_exists($pic_dir . "pic1.jpg"))
							echo $pic_dir . "pic1.jpg";
						else
							echo "pic/alt_pic.png";
						echo "\"></a></div>";
						$j++;
					}
				}		
			}
		}
	}else{
		$j = 1;
		for ( $i = 0; $i < $length; $i++){
			if (strpos($info[$i]["name"], $search) !== false){
				if(!($j % 5))
					echo "<div class=\"mansion_unit mansion_unit_end\">";
				else
					echo "<div class=\"mansion_unit shadow\">";

				echo "<a href=\"mansion_info.php?location=" . $a . "&id=" . $info[$i]["mansion_id"] . "\"><img class=\"shadow\" src=\"pic/alt_pic.png\"></a></div>";
				$j++;
			}
		}
	}

?>
	</div>
	</div>
        <div id="bottom">
           
        </div> 
    </div>
    
</body>
</html>
