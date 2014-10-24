<?php
    $id = $_GET["id"];
    if(!$id){
	    header("Location:houses.php");
	    exit;
    }
    require("sql/mysql_connection.php");
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
    <div id="left-side">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
                <li class="main-menu" id="AboutMe"><a href="aboutus.html">關於我</a></li>
                <li class="main-menu" id="houses"><a href="houses.php">豪宅導覽</li>
                <li class="main-menu" id="LOGO"><a href="index.php">LOGO</a></li>
                <li class="main-menu" id="Business"><a href="business.html">線上委託</a></li>
                <li class="main-menu" id="ContactMe"><a href="contactme.html">聯絡我</a></li>
            </ul>
        </div>
    </div>
    
    <div id="right-side">
	<div id="info">
		<div id="pic_div">
<?php
		$location = "pic/houses/case-".$id."/";
		if(file_exists($location."pic1.jpg")) {
			echo   "<img id=\"pic\" src=\"pic/houses/case-".$id."/pic1.jpg\" />";
		}
?>
		</div>
		<div id="house_info">
	<?php
	
	$sql = "SELECT * FROM houses WHERE id=$id";
	$fetch = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($fetch);
	echo "<table>";
	echo "<tr><td>案名：".$row[1]."</td></tr>";
	echo "<tr><td>門牌地址：".$row[2]."</td></tr>";
	echo "<tr><td>格局：".$row[3]."</td></tr>";
	echo "<tr><td>建物面積：".$row[4]."</td></tr>";
	echo "<tr><td>地段：".$row[5]."</td></tr>";
	echo "<tr><td>地坪：".$row[6]."</td></tr>";
	echo "</table>";
	?>
		</div>
	</div>
	<div id="pic_display">
		<div id="thumbnail">
			<ul onclick="changePic_houses(event.target);">
			<?php 
				$i = 1;
				
				while(file_exists($location."pic".$i.".jpg")){
					echo "<li><img src='pic/houses/case-".$id."/pic".$i.".jpg' /></li>";
					$i++;
				}
			?>
			</ul>
		</div>
	</div>
	<div id="bottom">
	</div>
        
    </div>
    
</body>
</html>
