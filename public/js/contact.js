let $goodInputs=[0,0,0,1,0];

document.querySelector("input[name='nom']").addEventListener('beforeinput', function(e) {
    setTimeout(function() {
        let filtre=new RegExp('^[a-zA-Zéèàê]{3,}$');
        console.log(e.target);
        if (filtre.test(e.target.value)){
            e.target.className='highlight-green';
            document.querySelector("input[name='nom'] + .sf_field-error").innerHTML="";
            testEnableForm(0,1);
        }else{
            e.target.className='highlight-red';
            document.querySelector("input[name='nom'] + .sf_field-error").innerHTML="Uniquement des lettres et minimum 3 caratères";
            testEnableForm(0,0);
        }
    },50);
});

document.querySelector("input[name='prenom']").addEventListener('beforeinput', function(e) {
    setTimeout(function() {
        let filtre=new RegExp('^[a-zA-Zéèàê]{3,}$');
        if (filtre.test(e.target.value)){
            e.target.className='highlight-green';
            document.querySelector("input[name='prenom'] + .sf_field-error").innerHTML="";
            testEnableForm(1,1);
        }else{
            e.target.className='highlight-red';
            document.querySelector("input[name='prenom'] + .sf_field-error").innerHTML="Uniquement des lettres et minimum 3 caratères";
            testEnableForm(1,0);
        }
    },50);
});

document.querySelector("input[type='mail']").addEventListener('beforeinput', function(e) {
    setTimeout(function() {
        // regex developpée avec majuscules autorisées
        // ^(([A-Za-z0-9]+_)|([A-Za-z0-9]+\-)|([A-Za-z0-9]+\.))*[A-Za-z0-9]+@(([a-zA-Z0-9]+\-)|([a-zA-Z0-9]+\.))*[a-zA-Z0-9]{1,63}[\.][a-zA-Z]{2,6}$
        let filtre=new RegExp('^([a-z0-9]+(_|\-|\.))*[a-z0-9]+@([a-z0-9]+(\-|\.))*[a-z0-9]{1,63}[\.][a-z]{2,6}$');
        if (filtre.test(e.target.value)){
            e.target.className='highlight-green';
            document.querySelector("input[type='mail'] + .sf_field-error").innerHTML="";
            testEnableForm(2,1);
        }else{
            e.target.className='highlight-red';
            document.querySelector("input[type='mail'] + .sf_field-error").innerHTML="Le mail saisi est invalide. N'utilisez pas de majuscules.";
            testEnableForm(2,0);
        }
    },50);
});

document.querySelector("textarea").addEventListener('beforeinput', function(e) {
    setTimeout(function() {
        let filtre=new RegExp('[a-zA-Z0-9 \.]{10,}');
        if (filtre.test(e.target.value)){
            e.target.className='highlight-green';
            document.querySelector("textarea + .sf_field-error").innerHTML="";
            testEnableForm(4,1);
        }else{
            e.target.className='highlight-red';
            document.querySelector("textarea + .sf_field-error").innerHTML="Taile minimale de 10 caractères";
            testEnableForm(4,0);
        }
    },50);
});

function testEnableForm($index, $value){
    $goodInputs[$index]=$value*1;
    let $somme=($goodInputs[0]+$goodInputs[1]+$goodInputs[2]+$goodInputs[3]+$goodInputs[4]);
    console.log($goodInputs);
    if($somme>4){
        document.querySelector("#contact-me form button").disabled=false;
    }else{
        document.querySelector("#contact-me form button").disabled=true;
    }
}
