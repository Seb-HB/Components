let meteoUrl, meteoIco,meteoText,meteoDate,meteoPlace, marker;
//création de l'objet carte via l'API de https://leafletjs.com/
let meteomap = L.map('meteomap').setView([45.439695, 4.3871779], 13);



//remplissage de la carte grace à l'API https://account.mapbox.com/access-tokens
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZnNlYiIsImEiOiJja3E2aGw0bnowMHNjMnZvNHlqNGp6NGpkIn0.S3wYLXEkMHn8Ep-IYQDF-Q'
}).addTo(meteomap);


// au click sur la carte, on recupere les coordonnées et on lance la fonction getMeteo avec
const onMapClick =function (e) {
    latLong = e.latlng;
    meteoUrl=`https://www.prevision-meteo.ch/services/json/lat=${latLong.lat}lng=${latLong.lng}`;
    if(marker) {marker.remove(meteomap)};
    marker = L.marker([latLong.lat, latLong.lng]).addTo(meteomap);
    getMeteo(meteoUrl);
    getCity(latLong);
}


// récupere la météo grâce à l'API
function getMeteo(url){
    let meteoRequest = new XMLHttpRequest();
    // on surveille les changements de statuts
    meteoRequest.addEventListener("readystatechange", function(){
        if (this.readyState==4){
            (this.status == 200) ? reqSuccess(this.response) : reqError(this.status, this.statusText);
        }else{
            reqError(this.status, this.statusText);
        }
    });
    // meteoRequest.onreadystatechange= function(){
    //     if (this.readyState==4){
    //         (this.status == 200) ? reqSuccess(this.response) : reqError(this.status, this.statusText);
    //     }else{
    //         reqError(this.status, this.statusText);
    //     }
    // }
    
    //on lance la requete
    meteoRequest.open("GET", url);
    meteoRequest.send();
}

// fait une requete geocoding reverse avec l'API https://opencagedata.com/ pour connaitre la ville à partir des lat /long
const getCity=function (latLong){
    let cityUrl='https://api.opencagedata.com/geocode/v1/json?key=1b89136574f74e8589cda5012c83d857&q='
        + encodeURIComponent(latLong.lat+','+latLong.lng)
        +'&pretty=1&no_annotations=1';
    var requestCity = new XMLHttpRequest();
    requestCity.open('GET', cityUrl, true);
    requestCity.onload = function() {
        if (requestCity.status === 200){ 
          var data = JSON.parse(requestCity.responseText);
          meteoPlace=document.createElement('p');
          meteoPlace.textContent=data.results[0].components.city;
          clearChilds(document.querySelector('#meteocity h3~div'));
          document.querySelector('#meteocity h3~div').appendChild(meteoPlace);
        } else if (requestCity.status <= 500){ 
          // We reached our target server, but it returned an error                    
          console.log("unable to geocode! Response code: " + requestCity.status);
          var data = JSON.parse(requestCity.responseText);
          console.log('error msg: ' + data.status.message);
        } else {
          console.log("server error");
        }
      };
    
      requestCity.onerror = function() {
        // There was a connection error of some sort
        console.log("unable to connect to server");        
      };
    
      requestCity.send();  // make the request
}

//traitement du résultat quand tout est OK pour la météo
function reqSuccess(response){
    const meteo=JSON.parse(response);
    let counter=1;
    let meteoParent;
    for (prop in meteo){
        if (meteo[prop].day_long){
            meteoDate=document.createElement('p');
            meteoDate.innerHTML=meteo[prop].day_long + ' '+ meteo[prop].date;
            meteoIco=document.createElement('img');
            meteoIco.className='sf_img-responsive';
            console.log(window.innerWidth>1200);
            console.log(meteo[prop]);
            (window.innerWidth>1200)? meteoIco.src=meteo[prop].icon_big : meteoIco.src=meteo[prop].icon;
            // meteoIco.src=meteo[prop].icon_big;
            meteoText=document.createElement('p');
            meteoText.innerHTML=meteo[prop].condition;
            meteoTemp=document.createElement('div');
            meteoTemp.innerHTML='<img src="img/Tmin.png" alt="icone temperature min"><p>'+meteo[prop].tmin+ '°C </p>'+ ' <div></div> '+'<img src="img/Tmax.png" alt="icone temperature max"><p>'+meteo[prop].tmax+'°C</p>';
            meteoParent=document.querySelector(`.j${counter}`);
            clearChilds(meteoParent);
            document.querySelector(`.j${counter}`).appendChild(meteoDate);
            document.querySelector(`.j${counter}`).appendChild(meteoIco);
            document.querySelector(`.j${counter}`).appendChild(meteoText);
            document.querySelector(`.j${counter}`).appendChild(meteoTemp);
            counter++;
        }
    };
}

//enlève tous les enfants d'un noeud
const clearChilds=function (nodeToClear) {
    while (nodeToClear.hasChildNodes()){
        nodeToClear.removeChild(nodeToClear.firstChild);
    }
}
// gestion des erreurs
function reqError(statut, textError){
    console.log(statut, textError);
}

meteomap.on('click', onMapClick);