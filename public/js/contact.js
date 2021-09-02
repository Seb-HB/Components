let $goodInputs=0;

document.querySelector("input[name='nom']").addEventListener(keypress, function(e) {
    setTimeout(function() {
        let filtre=new RegExp('[a-zA-Z]{3,}');
        if (filtre.test(e.currentTarget.val())){
            e.currentTarget.style.className='highlight-green';
            document.querySelector("input[name='nom'] + .sf_field-error").innerHTML="";
            $goodInputs++;
        }else{
            e.currentTarget.style.className='highlight-red';
            document.querySelector("input[name='nom'] + .sf_field-error").innerHTML="Le nom ne doit comporter que des lettres et un minimum de 3 caratères";
            $goodInputs--;
        }
    },50);
});

document.querySelector("input[name='prenom']").addEventListener(keypress, function(e) {
    setTimeout(function() {
        let filtre=new RegExp('[a-zA-Z]{3,}');
        if (filtre.test(e.currentTarget.val())){
            e.currentTarget.style.className='highlight-green';
            document.querySelector("input[name='nom'] + .sf_field-error").innerHTML="";
        }else{
            e.currentTarget.style.className='highlight-red';
            document.querySelector("input[name='nom'] + .sf_field-error").innerHTML="Le prénom ne doit comporter que des lettres et un minimum de 3 caratères";
        }
    },50);
});

document.querySelector("input[type='mail']").addEventListener(keypress, function(e) {
    setTimeout(function() {
        let filtre=new RegExp('[a-z]([a-z0-9]*[\.\-\_]?[a-z0-9]+)+@[a-z]{2,15}[.][a-z]{2,20}');
        if (filtre.test(e.currentTarget.val())){
            e.currentTarget.style.className='highlight-green';
            document.querySelector("input[type='mail'] + .sf_field-error").innerHTML="";
        }else{
            e.currentTarget.style.className='highlight-red';
            document.querySelector("input[type='mail'] + .sf_field-error").innerHTML="Le mail saisi n'est pas valide";
        }
    },50);
});

document.querySelector("textarea").addEventListener(keypress, function(e) {
    setTimeout(function() {
        let filtre=new RegExp('[a-zA-Z0-9]{10,}');
        if (filtre.test(e.currentTarget.val())){
            e.currentTarget.style.className='highlight-green';
            document.querySelector("textarea + .sf_field-error").innerHTML="";
        }else{
            e.currentTarget.style.className='highlight-red';
            document.querySelector("textarea + .sf_field-error").innerHTML="Le message doit comporter au minimum 10 caractères";
        }
    },50);
});
