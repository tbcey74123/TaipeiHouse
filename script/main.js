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

function detect_input(e){
    var isValidKey = false;
    var inputCode = e.keyCode;
    if(inputCode>=48 && inputCode<=57){
        isValidKey = true;
    }
    e.returnValue  = isValidKey;
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
    
    if(input[0].value=="" || input[3].value==""||select[0].value=="space"||select[1].value=="space"){
        return false;
    }else if(input[1].value=="" && input[2].value==""){
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
