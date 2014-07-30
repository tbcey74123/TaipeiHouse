function check_input(){
	var form_input = document.getElementsByTagName('input');
	var form_select = document.getElementsByTagName('select');

	for(var i=0;i<form_input.length;i++){
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
	
	if(form_input[0].value==""){
		return false;
	}
	for(var i=1;i<form_input.length-1;i++){
		if(form_input[i].value!=""){
			check = 1;
			break;
		}
	}
	if(check==0){
		return false;
	}
	
	for(i=1;i<form_input.length-1;i++){
		if(form_input[i].value!=""&&!string.test(form_input[i].value)){
			alert("請上傳jpg檔");
			return false;
		}
	}
	return true;
}

function change_update(id){
	if(id==""){
		location = "/admin/admin_update.php";
	}else{
		location = "/admin/admin_update.php?id=" + id;
	}
}

function change_pic(id){
	if(id==""){
		location = "/admin/admin_pic_maintain.php";
	}else{
		location = "/admin/admin_pic_maintain.php?id=" + id;
	}
}

function change_deletePic(id,num){
	location = "/admin/deletePic.php?id=" + id + "&num=" + num;
}

function addC(){
	var form = document.getElementById('form');
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

function changePic_houses(e){
	if(e.nodeName == "IMG"){
		var x = document.getElementById('pic');
		var src = e.getAttribute("src");
		var button = document.getElementById('delete');
		var id = window.location.href.split("id=")[1];
		var s = src.replace("/pic/houses/case-"+id+"/pic","");
		var num = s.split(".")[0];
		
		x.setAttribute('src',src);
		button.setAttribute('onclick',"change_deletePic("+id+","+num+");");
		button.style.display = "inline-block";
	}

}
