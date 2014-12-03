<?php
	require("sql/mysql_connection.php");
	
	$sql = "SELECT id,name FROM houses ORDER BY id";
	$result = mysqli_query($con,$sql);
	//$info = mysqli_fetch_all($result);
	while($row = mysqli_fetch_assoc($result)) {
		$info[] = $row;
	}
	
	$length = count($info);
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
    <div id="left-side">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
                <li class="main-menu" id="home"><a href="index.php">首頁</a></li>
                <li class="main-menu" id="AboutMe"><a href="aboutus.html">關於我</a></li>
                <li class="main-menu current-page" id="houses"><a href="houses.php">豪宅導覽</li>
                <li class="main-menu" id="Business"><a href="business.html">線上委託</a></li>
            </ul>
        </div>
    </div>
    
    <div id="right-side">
		<div id="search_bar">
			<form action="houses.php" method="GET" onsubmit="return check_search_input();">
				<input type="text" name="search">
				<input type="submit" value="查詢">
			</form>
		</div>
	<div id="house_list">
<?php
	$search = $_GET['search'];
	echo "<table>";
	if(!$search){
		for ($i=0;$i<$length;$i++){
			echo "<tr><td><a href=\"house_info.php?id=".$info[$i]["id"]."\">".$info[$i]["name"]."</a></td></tr>";
		}
	}else{
		for ( $i = 0; $i < $length; $i++){
			if ( strpos($info[$i]["name"],$search) !== false){
				echo "<tr><td><a href=\"house_info.php?id=".$info[$i]["id"]."\">".$info[$i]["name"]."</a></td></tr>";
			}
		}
	}
	echo "</table>";
?>
	</div>
        <div id="bottom">
           
        </div> 
    </div>
    
</body>
</html>
