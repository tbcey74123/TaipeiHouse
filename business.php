<?php
	$type= $_GET['type'];
	$name= $_GET['name'];
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
	require("left_side.php");
	output_leftside();
?>
    <div id="right-side">
        
        <div class="shadow" id="form">
            <p>委託人資料</p><br/>
            <form action="request.php" method="GET" onsubmit="return check_input();">
                請選擇委託項目：<select name="type">
                                <option value="space" disabled="disabled" selected="selected">請選擇</option>
                                <option value="a">買屋</option>
                                <option value="b">賣屋</option>
                                <option value="c">租屋</option>
                                <option value="d">出租</option>
                              </select><br/><br/>
                姓名：<input type="text" name="name" onkeypress="return input_num(event, 'name');"
><br/><br/>
                性別：<select name="sex">
                        <option value="space" disabled="disabled" selected="selected">請選擇</option>
                        <option value="1">男</option>
                        <option value="0">女</option>
                     </select><br/><br/>
                行動電話：<input type="tel" name="celphone" onkeypress="return detect_input(event, 'celphone');"> 住家電話：<input type="tel" name="telephone" onkeypress="return detect_input(event, 'telephone');"><br/><br/>
                E-mail：<input type="text" name="mail-address" onkeypress="return input_num(event, 'mail-address');"><br/><br/>
                其他需求及意見：<br/>
		<textarea name="comments" rows="5" cols="30">
<?php
	if($type && $name) {
		if($type == "house")
			echo "你好，我對物件「" . $name . "」有興趣，請回電。";
		else
			echo "你好，我對豪宅「" . $name . "」有興趣，請回電。";
	}
?>

		</textarea><br/>
                <p id="ps">註：行動電話及住家電話需擇一填寫</p><br/>
                <input type="submit" value="確認送出"><input type="button" value="重新填寫" onclick="reset_form();">
                
            </form>
        </div>
        <div id="bottom">
            
        </div>
    </div>
    
</body>
</html>
