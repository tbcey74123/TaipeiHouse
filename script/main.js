$(document).ready(function() {
	var height = document.body.clientHeight;

	//$('#left-side').css("height",height);


});



/*function menu_select(e) {
    var src = e.src;
    
    if (e.nodeName == "A") {
	e.style.fontSize = "40px";
	e.style.fontWeight = "700";
	e.style.backgroundColor = "rgba(248,248,255,1)";
	e.style.border = "2px solid rgba(248,248,255,1)";
	e.parentNode.style.paddingBottom = "22px";
    }
    
    if(e.nodeName=="IMG"){
        if(src.match("-3a.jpg")){
            return ;   
        }
        for(var i=1;i<5;i++){
            if(src.match("menu-" + i)){
               src = "pic/menu-" + i + "-2.jpg";
            }
        }
        e.src = src;
        var background = document.getElementById('div_page_selection');
        background.style.backgroundImage = "none";
        
        e.parentNode.parentNode.style.borderBottom = "1px solid white";
    }
    
}
function menu_leave(e) {
    var src = e.src;
    
    if (e.nodeName == "A") {
    	e.style.fontSize = "32px";
	e.style.fontWeight = "400";
	e.style.backgroundColor = null;
	e.style.border = null;
	e.parentNode.style.paddingBottom = "30px";
    
    }
    if(e.nodeName=="IMG"){
        if(src.match("-3a.jpg")){
            return ;   
        }
        for(var i=1;i<5;i++){
            if(src.match("menu-" + i)){
               src = "pic/menu-" + i + ".jpg";
            }
        }
        e.src = src;
        var background = document.getElementById('div_page_selection');
        background.style.backgroundImage = "url('pic/line-2.png')";
        
        e.parentNode.parentNode.style.borderBottom = "";
    }
}*/

function detect_input(e, tar){

    var isValidKey = false;
    var inputCode = window.event ? e.keyCode : e.which;

    if(inputCode>=48 && inputCode<=57){
        isValidKey = true;
    }

    if(inputCode==13 || inputCode==8 || inputCode==0)
	    isValidKey = true;
    if(isValidKey) {
    	    var num = input_num(e, tar);
	    if(num != 1)
		    isValidKey = false;
    }
    return isValidKey;
}

function input_num(e, tar) {

	var isValidNum = false;
	var input = document.getElementsByTagName('input');
	var limit = 0;
	var telORcel = false;

	for(var i = 0; i < 4; i++) {
		if(input[i].name == tar) {
			switch(tar) {
				case "name":
					limit = 10;
					break;
				case "celphone":
				case "telephone":
					telORcel = true;
					limit = 10;
					break;
				case "mail-address":
					limit = 30;
					break;
			}
		
			var length = input[i].value.length;
			if(length < limit) {
				isValidNum = true;
			}
			break;
		}
	}
	
	if(telORcel) {
		if(isValidNum) {
			return 1;
		}else {
			return 0;
		}
	}else {
		if(isValidNum) {
			e.returnValue = isValidNum;
		}else {
			e.returnValue = null;
		}
	}
}


function reset_form(){
    var input = document.getElementsByTagName('input');
    var select = document.getElementsByTagName('select');
    
    for(var i=0;i<4;i++){
        input[i].value= "" ;  
    }
    for(var i=0;i<select.length;i++){
        select[i].value= "space" ;  
    }
    var textarea = document.getElementsByTagName('textarea');
    textarea[0].value = "";
    
}

function check_input(){
    var input = document.getElementsByTagName('input');
    var select = document.getElementsByTagName('select');   
    var text = document.getElementsByTagName('textarea');
    var num = input[1].value.length + input[2].value.length;

    if(input[0].value=="" || input[3].value==""||select[0].value=="space"||select[1].value=="space"){
	alert("請確實填寫欄位");
        return false;
    }
    if(input[1].value=="" && input[2].value==""){
	    alert("手機及電話請則一填寫");
        return false;
    }
    if(input[0].value.length > 10) {
	    alert("名字寫太長囉......請控制在10個字元內");
	    return false;
    }
    if((num != 10) && (num != 20)) {
	    alert("請確認電話碼數是否正確");
	    return false;
    }
    if(text[0].value.length > 200) {
	    alert("意見麻煩控制在200個字元內");
	    return false;
    }

    return true;
}
function check_search_input() {
	var input = document.getElementsByTagName('input');

	if(input[0].value==""){
		return false;
	}
}

function changePic_houses(e){
	if(e.nodeName == "IMG"){
		var x = document.getElementById('pic');
		var src = e.getAttribute("src");
	
		x.setAttribute("src",src);
	}

}
