let anim=document.querySelector('#sf_bg-animation');
let winHeight=window.innerHeight;
let scrollUp;
console.log(anim);

//vérifie la direction du scroll. scrollUp sera vrai si on remonte
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
        let deltaScroll=initScroll-window.scrollY;
        //pas ternaire pour éviter le cas =0 qui arrive systématiquement en fin de scroll
        // on ne veut pas changer la valeur se scrollUp à l'arret du scroll
        if (deltaScroll>0){
            scrollUp=true;
        }else if (deltaScroll<0){
            scrollUp=false;
        }
        // (initScroll-finishScroll)>=0 ? scrollUp=true : scrollUp=false;
        console.log('diff: '+(deltaScroll),scrollUp );
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



