<?php
//Create Connection
$con = mysqli_connect("localhost","taipeiho_db","milo1226","taipeiho_db");
//Check Connection
if(mysqli_connect_errno()){
	echo "Failed!"; 
}
//Char set to utf8
mysqli_query($con,"SET NAMES 'UTF8'");
?>

