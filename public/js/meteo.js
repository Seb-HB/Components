let meteoUrl, meteoIco,meteoText,meteoDate;
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
function onMapClick(e) {
    latLong = e.latlng;
    meteoUrl=`https://www.prevision-meteo.ch/services/json/lat=${latLong.lat}lng=${latLong.lng}`;
    let marker = L.marker([latLong.lat, latLong.lng]).addTo(meteomap);
    getMeteo(meteoUrl);
}
meteomap.on('click', onMapClick);


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

//traitement du résultat quand tout est OK
function reqSuccess(response){
    const meteo=JSON.parse(response);
    console.log(meteo);
    let counter=1;
    let meteoParent;

    for (prop in meteo){
        console.log(meteo[prop])
        if (meteo[prop].day_long){
            console.log(counter);
            meteoDate=document.createElement('p');
            meteoDate.innerHTML=meteo[prop].day_long + ' '+ meteo[prop].date;
            meteoIco=document.createElement('img');
            meteoIco.src=meteo[prop].icon_big;
            meteoText=document.createElement('p');
            meteoText.innerHTML=meteo[prop].condition;
            meteoTemp=document.createElement('p');
            meteoTemp.innerHTML='<img src="img/temperatureMin.png" alt="icone temperature min">'+meteo[prop].tmin+ ' | '+ '<img src="img/temperatureMax.png" alt="icone temperature max">'+meteo[prop].tmax;
            meteoParent=document.querySelector(`.j${counter}`);
            while (meteoParent.hasChildNodes()){
                meteoParent.removeChild(meteoParent.firstChild);
            }
            console.log(`le parent .j${counter} est :` , meteoParent);
            document.querySelector(`.j${counter}`).appendChild(meteoDate);
            document.querySelector(`.j${counter}`).appendChild(meteoIco);
            document.querySelector(`.j${counter}`).appendChild(meteoText);
            document.querySelector(`.j${counter}`).appendChild(meteoTemp);
            counter++;
        }
    };
}

function reqError(statut, textError){
    console.log(statut, textError);
}