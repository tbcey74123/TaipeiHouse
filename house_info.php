<?php
    $id = $_GET["id"];
    if(!$id){
	    header("Location:houses.html");
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
    <div id="top">
        <div id="div_page_selection">
            <ul id="ul_page_selection" onmouseover="menu_select(event.target)" onmouseout="menu_leave(event.target)">
                <li class="main-menu" id="AboutMe"><a href="aboutus.html"><img src="pic/menu-1.jpg" /></a></li>
                <li class="main-menu" id="houses"><a href="houses.php"><img src="pic/menu-2.jpg" /></a></li>
                <li class="main-menu" id="LOGO"><a href="index.php">LOGO</a></li>
                <li class="main-menu" id="Business"><a href="business.html"><img src="pic/menu-3.jpg" /></a></li>
                <li class="main-menu" id="ContactMe"><a href="contactme.html"><img src="pic/menu-4.jpg" /></a></li>
            </ul>
        </div>
    </div>
    
    <div id="main">
	<div id="house_info">
	<?php
	
	$sql = "SELECT * FROM houses WHERE id=$id";
	$fetch = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($fetch);
	?>
	<p>案名：<?php echo $row[1];?></p>
	<p>門牌地址：<?php echo $row[2];?></p>
	<p>格局：<?php echo $row[3];?></p>
	<p>建物面積：<?php echo $row[4];?></p>
	<p>地段：<?php echo $row[5];?></p>
	<p>地坪：<?php echo $row[6];?></p>
	</div>
        <div id="bottom">
            
        </div>
        
    </div>
    
</body>

</html>
