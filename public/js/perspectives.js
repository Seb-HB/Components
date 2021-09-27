let diffX, diffY;
document.querySelector("#perspectives div:nth-child(2)").addEventListener('mousemove', function(e){
    diffX= (0.55+((window.screen.width/2)-e.clientX)/(window.screen.width/2)*1.3)*100;
    diffY= (-0.15+((window.screen.height/2)-e.clientY)/(window.screen.height/2)*1.3)*100;
    document.querySelector("#perspectives div:nth-child(2)").style.perspectiveOrigin=`${diffX}% ${diffY}%`;
})

// pour gerer le tactile?
document.querySelector("#perspectives div:nth-child(2)").addEventListener('touchmove', function(e){
    diffX= (0.55+((window.screen.width/2)-e.clientX)/(window.screen.width/2)*1.3)*100;
    diffY= (-0.15+((window.screen.height/2)-e.clientY)/(window.screen.height/2)*1.3)*100;
    document.querySelector("#perspectives div:nth-child(2)").style.perspectiveOrigin=`${diffX}% ${diffY}%`;
})