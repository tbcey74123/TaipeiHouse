<?php
	require("sql/mysql_connection.php");
	
	$sql = "SELECT id,name FROM houses ORDER BY id";
	$result = mysqli_query($con,$sql);
	$info = mysqli_fetch_all($result);
	$length = count($info);
?>
<!DOCTYPE html>
<html>
<head>
    <title>TaipeiHouse</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="house_info.css">
    <script type="text/javascript" src="script/main.js"></script>
</head>
<body>
    <div id="top">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
                <li class="main-menu" id="AboutMe"><a href="aboutus.html"><img src="pic/menu-1.jpg" /></a></li>
                <li class="main-menu" id="houses"><a href="houses.php"><img src="pic/menu-2-3a.jpg" /></a></li>
                <li class="main-menu" id="LOGO"><a href="index.php">LOGO</a></li>
                <li class="main-menu" id="Business"><a href="business.html"><img src="pic/menu-3.jpg" /></a></li>
                <li class="main-menu" id="ContactMe"><a href="contactme.html"><img src="pic/menu-4.jpg" /></a></li>
            </ul>
        </div>
    </div>
    
    <div id="main">
	<div id="house_info">
		<div id="search_bar">
			<form action="houses.php" method="GET" onsubmit="return check_search_input();">
				<input type="text" name="search">
				<input type="submit" value="查詢">
			</form>
		</div>
<?php
	$search = $_GET['search'];
	if(!$search){
		for ($i=0;$i<$length;$i++){
			echo "<a href=\"house_info.php?id=".$info[$i][0]."\">".$info[$i][1]."</a><br/>";
		}
	}else{
		for ( $i = 0; $i < $length; $i++){
			if ( strpos($info[$i][1],$search) !== false){
				echo "<a href=\"house_info.php?id=".$info[$i][0].       "\">".$info[$i][1]."</a><br/>";
			}
		}
	}
?>
	</div>
        <div id="bottom">
            
        </div> 
    </div>
    
</body>
</html>
