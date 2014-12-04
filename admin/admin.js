function check_input(){
	var form_input = document.getElementsByTagName('input');
	var form_select = document.getElementsByTagName('select');

	for(var i=0;i < 6;i++){
		if(form_input[i].value==""){
			return false;
		}
	}
	if(form_select[0].value=="space"){
		return false;
	}
	return true;
}

function check_pic_upload(){
	var form_input = document.getElementsByTagName('input');
	var check = 0;
	var string = /jpg/;
	
	if(form_input[1].value==""){
		return false;
	}
	for(var i=3;i<form_input.length-1;i++){
		if(form_input[i].value!=""){
			check = 1;
			break;
		}
	}
	if(check==0){
		return false;
	}
	
	for(i=3;i<form_input.length-1;i++){
		if(form_input[i].value!=""&&!string.test(form_input[i].value)){
			alert("請上傳jpg檔");
			return false;
		}
	}
	return true;
}

function change_page (id) {
	if(id==""){
		location = window.location.href.split("?")[0];
	}else{
		location = window.location.href.split("?")[0] + "?id=" + id ;
	}
}

function change_deletePic(id, num, tar){
	if(tar == "mansion") {
		var locate = window.location.href.split("location=")[1].split("&id")[0];

		location = "deletePic.php?id=" + id + "&num=" + num + "&target=" + tar + "&location=" + locate;
	}else 
		location = "deletePic.php?id=" + id + "&num=" + num + "&target=" + tar;

}

function addC(name){
	var form = document.getElementById(name);
	var new_c = document.createElement("input");
	var current = form.getElementsByTagName('input');
	var num = current[current.length-1].getAttribute('name').replace("pic","");
	num++;
	var br = document.createElement("br");
	
	new_c.setAttribute('type','file');
	//new_c.createAttribute('type','file');
	new_c.setAttribute('name','pic'+num);
	//new_c.createAttribute('name',num+1);

	form.appendChild(new_c);
	form.appendChild(br);
}

function changePic_houses(e, tar){
	if(e.nodeName == "IMG"){
		var x = document.getElementById('pic');
		var src = e.getAttribute("src");
		var button = document.getElementById('delete');
		var id = window.location.href.split("id=")[1].split("&&")[0];

		if(tar == "house") {
			var s = src.replace("../pic/houses/case-"+id+"/pic","");
		}else {
			var locate = window.location.href.split("location=")[1].split("&id")[0];
			var s = src.replace("../pic/mansion/" + locate + "/mansion-" + id + "/pic", "");	
		}
		var num = s.split(".")[0];
		
		x.setAttribute('src',src);
		if(tar == "house") {
			button.setAttribute('onclick',"change_deletePic("+id+","+num+", 'house');");
		}else {
			button.setAttribute('onclick',"change_deletePic("+id+","+num+", 'mansion');");
		}
		button.style.display = "inline-block";
	}

}

function delete_request(id) {
	if(confirm("確定要刪除這件委託？"))
		location = "delete_request.php?id=" + id;

}
function delete_house(id) {
	if(confirm("確定要刪除這筆物件？"))
		location = "delete_house.php?id=" + id;

}
function delete_location() {
	return confirm("確定要刪除這個區域？");
}

function location_change(Location) {
	if(Location==""){
		location = window.location.href.split("?")[0];
	}else{
		location = window.location.href.split("?")[0] + "?location=" + Location ;
	}
}
function mansion_change(id) {

	if(id==""){
		location = window.location.href.split("?")[0];
	}else{
		location = window.location.href.split("&")[0] + "&id=" + id ;
	}
	
}
