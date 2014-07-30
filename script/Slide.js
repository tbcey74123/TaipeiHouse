function displayS(e) {
    
    var before = e.relatedTarget;
    if(before.id=="main"||before.nodeName=="BODY"||check(before)==1){
        var x = document.getElementById('pic_selector');
        var y = x.getElementsByTagName("li");
        
        x.style.WebkitAnimation = "Sshow 1s";//Chrome, Safari, Opera
        x.style.animation = "Sshow 1s";//Standard Syntax
        x.style.backgroundColor = "rgba(230,230,230,0.7)";
        
        var pic = getComputedStyle(document.getElementById('Slide'),null).backgroundImage;
        
        for(var i=0;i<y.length;i++){
            if(y[i].className=="current"){
                y[i].style.WebkitAnimation = "CurrentDotshow 1s";//Chrome, Safari, Opera
                y[i].style.animation = "CurrentDotshow 1s";//Standard Syntax
                y[i].style.opacity = 1;
            }else{
                y[i].style.WebkitAnimation = "Dotshow 1s";//Chrome, Safari, Opera
                y[i].style.animation = "Dotshow 1s";//Standard Syntax
                y[i].style.opacity = 0.4;
            }
        }
    }

}

function hideS(e) {
    
    var before = e.relatedTarget;
    
    if(before.id=="main"||before.nodeName=="BODY"|check(before)==1){
        var x = document.getElementById('pic_selector');
        var y = x.getElementsByTagName("li");
        
        x.style.WebkitAnimation = "Shide 1s";//Chrome, Safari, Opera
        x.style.animation = "Shide 1s";//Standard Syntax
        x.style.backgroundColor = "rgba(230,230,230,0)";
        
        for(var i=0;i<y.length;i++){
            y[i].style.WebkitAnimation = "Dothide 1s";//Chrome, Safari, Opera
            y[i].style.animation = "Dothide 1s";//Standard Syntax
            y[i].style.opacity = 0;
        }
    }
}

function check(evn){
    while(evn && evn.id != "top"){
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
        
        x.style.backgroundImage = "url('pic/" + id + ".png')";
        clearInterval(auto);
        auto = setInterval(function(){auto_changePic()}, 7000);
        
    }
}

function loadPictures(){
    
    var img1 = new Image();
    var img2 = new Image();
    var img3 = new Image();
    var img4 = new Image();
    
    img1.src = "pic/pic1.png";
    img2.src = "pic/pic2.png";
    img3.src = "pic/pic3.png";
    img4.src = "pic/pic4.png";
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
