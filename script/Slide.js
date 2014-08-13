/*function displayS(e) {
    
    var before = e.relatedTarget;
    if(check_target(before)==1||before.nodeName=="BODY"){
        var x = document.getElementById('pic_selector');
        var y = x.getElementsByTagName("li");
        
        x.style.WebkitAnimation = "Sshow 1s";//Chrome, Safari, Opera
        x.style.animation = "Sshow 1s";//Standard Syntax
        x.style.backgroundColor = "rgba(230,230,230,0)";
        
        var pic = getComputedStyle(document.getElementById('Slide'),null).backgroundImage;
        
        for(var i=0;i<y.length;i++){
            if(y[i].className=="current"){
                y[i].style.WebkitAnimation = "CurrentDotshow 1s";//Chrome, Safari, Opera
                y[i].style.animation = "CurrentDotshow 1s";//Standard Syntax
                y[i].style.opacity = 1;
            }else{
                y[i].style.WebkitAnimation = "Dotshow 1s";//Chrome, Safari, Opera
                y[i].style.animation = "Dotshow 1s";//Standard Syntax
                y[i].style.opacity = 0.2;
            }
        }
    }

}

function hideS(e) {
    
    var before = e.relatedTarget;
    
    if(check_target(before)==1||before.nodeName=="BODY"){
        var x = document.getElementById('pic_selector');
        var y = x.getElementsByTagName("li");
        
        x.style.WebkitAnimation = "Shide 1s";//Chrome, Safari, Opera
        x.style.animation = "Shide 1s";//Standard Syntax
        x.style.backgroundColor = "rgba(230,230,230,0)";
        
        for(var i=0;i<y.length;i++){
	    if ( y[i].className == "current") {
		y[i].style.WebkitAnimation = "CurrentDothide 1s";//Chrome, Safari, Opera
		y[i].style.animation = "CurrentDothide 1s";//Standard Syntax
	    }else {
            	y[i].style.WebkitAnimation = "Dothide 1s";//Chrome, Safari, Opera
            	y[i].style.animation = "Dothide 1s";//Standard Syntax
 	    }
            	y[i].style.opacity = 0;
        }
    }
}*/

function check_target(evn){
    while(evn && (evn.id != "top" && evn.id != "hot")){
        evn = evn.parentNode;
    }
    if(!evn){
        return 0;
    }else{
        return 1;
    }
}

function changePic(e) {
    if(e.nodeName == "BUTTON"){
        
        var x = document.getElementById('Slide');
        var y = document.getElementById('pic_selector');
        var z = y.getElementsByTagName("li");
        var before = document.getElementsByClassName('current');
        var target = e.parentElement;
        
        if(getComputedStyle(z[0],null).opacity != 0){
            before[0].style.opacity = 0.4;
            target.style.opacity = 1;
        }
       
        before[0].classList.toggle("current");
        target.classList.toggle("current");
       
        id = target.id;
        
        x.style.backgroundImage = "url('pic/" + id + ".jpg')";
        clearInterval(auto);
        auto = setInterval(function(){auto_changePic()}, 7000);
        
    }
}

function loadPictures(){
    
    var img1 = new Image();
    var img2 = new Image();
    var img3 = new Image();
    var img4 = new Image();
    
    img1.src = "pic/pic1.jpg";
    img2.src = "pic/pic2.jpg";
    img3.src = "pic/pic3.jpg";
    img4.src = "pic/pic4.jpg";
}

function auto_changePic(){
    var x = document.getElementById('Slide');
    var y = document.getElementById('pic_selector');
    var z = y.getElementsByTagName("li");
    
    var current = document.getElementsByClassName('current');
    next = current[0].nextSibling.nextSibling;
    
    if(next==null){
        next = z[0];
    }
    changePic(next.firstChild);
}


function change_prev_pic(){
    var x = document.getElementById('Slide');
    var y = document.getElementById('pic_selector');
    var z = y.getElementsByTagName("li");

    var current = document.getElementsByClassName('current');
    next = current[0].previousSibling.previousSibling;

    if(next==null){
        next = z[3];
    }
    changePic(next.firstChild);
}
function change_next_pic(){
    var x = document.getElementById('Slide');
    var current = document.getElementsByClassName('current');
    next = current[0].nextSibling.nextSibling;

    if(next==null){
        next = z[0];
    }
    changePic(next.firstChild);
}
function show(e){
	e.style.opacity = 1;
}
function hide(e){
	e.style.opacity = 0.7;
}
