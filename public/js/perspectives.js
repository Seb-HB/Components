let diffX, diffY;
document.querySelector("#perspectives").addEventListener('mousemove', function(e){
    diffX= (0.55+((window.screen.width/2)-e.clientX)/(window.screen.width/2))*100;
    diffY= (-0.15+((window.screen.height/2)-e.clientY)/(window.screen.height/2))*100;
    document.querySelector("#perspectives").style.perspectiveOrigin=`${diffX}% ${diffY}%`;
})