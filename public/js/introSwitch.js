let anim=document.querySelector('#sf_bg-animation');
let animText=document.querySelector('.sf_bg-anim-text');
let winHeight=window.innerHeight;
let scrollUp;


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
    },5);
    if (window.scrollY<winHeight && scrollUp==true){
        // document.querySelector('body').scrollTop=0;
        window.scrollTo({top:0, behavior: 'smooth'});
        //indispensable pour pouvoir rescroller vers le bas
        scrollUp=false;
        //suppresion de la classe, reflow event puis remise en place de la classe pour relancer l'animation du texte
        animText.className='';
        void animText.offsetWidth;
        animText.className='sf_bg-anim-text';
    }

};



