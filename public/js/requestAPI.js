/*****************************************************
 *   Fichier pour les requêtes aux API
 ****************************************************/




/*******TTS********** */
let baseAudioUrl='http://api.voicerss.org/?key=e3d1c9d3b7b84958bb831ea65c50f744&hl='
let audioRequestUrl;
let voices={ 
    us:{
        f:['Linda', 'Amy','Mary'], 
        m:['John', 'Mike']
    },
    fr: {
        f:['Bette', 'Iva','Zola'], 
        m:['Axel']
    }
};
let voice;

function chooseRandomVoice(langage, voiceSex){
    //recupere les 2 derniers caracteres de la langue pour servir d'index dans l'objet voices
    let lang=langage.slice(-2);
    // choisit une voix aleatoire selon la langue et le sexe
    let alea=Math.random()*(voices.lang.voiceSex.length-1) +1
    voice=voices[lang][voiceSex];
    console.log(voice);
}

function getAudio(baseUrl,texte,language='en-us', codec='MP3', voiceSex='f'){
    let audioRequest = new XMLHttpRequest();
    audioRequestUrl=baseUrl+language+'&c='+codec+'&src'+texte;
    // on surveille les changements de statuts
    audioRequest.addEventListener("readystatechange", function(){
        if (this.readyState==4){
            (this.status == 200) ? audioReceived(this.response) : audioError(this.status, this.statusText);
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
    meteoRequest.open("GET", audioRequestUrl);
    meteoRequest.send();
}

function audioReceived(response){
    const audio=JSON.parse(response);
    console.log(audio);
}

chooseRandomVoice('fr-fr', 'f');
