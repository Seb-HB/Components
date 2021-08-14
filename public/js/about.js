let expPro=document.querySelectorAll('.sf_professional-exp, .sf_formation-exp');
console.log(expPro);

expPro.forEach(function(xPro) {
    let moveX=0;
    (xPro.className=='sf_professional-exp')? moveX='30vw': moveX='-30vw';

    xPro.addEventListener('click', function(e){

        expPro.forEach(function(element){
            if (element!=xPro){
                initialReturn(element);
            }
        });
        
        xPro.animate([
            { transform: 'translateX(0px)' },
            { transform: 'translateX('+moveX+')'},
            ],{
                duration: 500,
                fill: "forwards"
            }
        );
    
        setTimeout(function(){
            xPro.querySelector('.sf_precisions').style.display = 'block';
        }, 500);
    
    
    })
});

function initialReturn(element){
    element.querySelector('.sf_precisions').style.display = 'none';

    element.animate([
        { transform: 'translateX(0px)' },
        ],{
            duration: 100,
            fill: "forwards"
        }
    );

}



