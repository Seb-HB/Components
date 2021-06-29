let anim=document.querySelector('#sf_bg-animation');
let navbar=document.querySelector('header');
let winHeight=window.innerHeight;
let scrollUp;
console.log(anim);


const scrollDirection=function(){
    scrollUp=false;
    let initScroll=window.scrollY;
    setTimeout(function(){
        let finishScroll=window.scrollY;
        (initScroll-finishScroll)>=0 ? scrollUp=true : scrollUp=false;
        console.log('diff: '+(initScroll-finishScroll),scrollUp );
    },5);
}

window.onscroll = function(e) {
    let initScroll=window.scrollY;
    setTimeout(function(){
        let finishScroll=window.scrollY;
        //pas ternaire pour éviter le cas =0
        if ((initScroll-finishScroll)>0){
            scrollUp=true;
        }else if ((initScroll-finishScroll)<0){
            scrollUp=false;
        }
        // (initScroll-finishScroll)>=0 ? scrollUp=true : scrollUp=false;
        console.log('diff: '+(initScroll-finishScroll),scrollUp );
    },5);
    console.log(scrollUp);
    console.log('scroll : '+ window.scrollY, 'height: '+winHeight);
    if (window.scrollY<winHeight && scrollUp==true){
        // document.querySelector('body').scrollTop=0;
        window.scrollTo({top:0, behavior: 'smooth'});
        //indispensable pour pouvoir rescroller vers le bas
        scrollUp=false;
    }

};



