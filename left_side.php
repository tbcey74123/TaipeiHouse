<?php

function output_leftside($index = 0) {

	echo "<div id=\"left-side\"><div id=\"div_page_selection\">";
	echo "<ul id=\"ul_page_selection\">"; 

	if(index != 1)
		echo "<li class=\"main-menu\" id=\"home\"><a href=\"index.php\">首頁</a></li>";

	echo "<li class=\"main-menu\" id=\"AboutMe\"><a href=\"aboutus.php\">關於我</a></li>";
	echo "<li class=\"main-menu\" id=\"mansion\"><a href=\"mansion.php\">豪宅導覽</a></li>";
	echo "<li class=\"main-menu\" id=\"Business\"><a href=\"business.php\">線上委託</a></li>";

	echo "</ul></div></div>";
}

?>
