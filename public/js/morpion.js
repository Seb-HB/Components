// https://www.devenir-webmaster.com/V2/TUTO/CHAPITRE/JAVASCRIPT/34-select/
let player={
    'l1':0, 
    'l2':0, 
    'l3':0, 
    'c1':0, 
    'c2':0, 
    'c3':0, 
    'd1':0,
    'd2':0,
    'symbol':'',
    'name':'',
    }
let IA={ 
    'l1':0, 
    'l2':0, 
    'l3':0, 
    'c1':0, 
    'c2':0, 
    'c3':0, 
    'd1':0,
    'd2':0,
    'symbol':'',
    'name': 'Tatiana'
}
let activePlayer;
let nbTurn=0;
let bouton=document.querySelector("button[name='startgame']");
let select=document.querySelector('select');
let tchat=document.querySelector("#morpionchat");


document.querySelector('#player').addEventListener('input',function(e) {
    // si on a saisi un nom de joueur
    if (e.target.value.length>0){
        // le bouton pour lancer la perie est activé
        bouton.disabled=false;
        // la seconde option du select prend le nom du joueur
        select.options[1].value=e.target.value;
        select.options[1].innerHTML=e.target.value;
        select.disabled=false;
    }else{
        bouton.disabled=true;
        select.disabled=true;
    }
});

// click sur le bouton de lancement de partie
bouton.addEventListener("click",function(e) {
    e.preventDefault();
    player.name=document.querySelector("#player").value;
    activePlayer=select.value;
    if (document.querySelector('input[name=team]:checked').value=='cross'){
        IA.symbol='O';
        player.symbol='X';
    }else{
        IA.symbol='X';
        player.symbol='O';
    }
    startGame();
});

//début du jeu
function startGame(){
    document.querySelector("#morpionparams").style.display='none';
    tchat.style.display='block';
    insertTchatLine('Encahntée <b>'+player.name+'</b>.');
    let firstNameSentence=aleaSentence(1);
    if(firstNameSentence!=''){
        insertTchatLine(firstNameSentence);
    }
    insertTchatLine('Moi c\'est Tatiana.');
    insertTchatLine('Ravie de jouer contre toi, bonne chance!!');

    // si l'IA commence
    if(activePlayer=='IA'){
        activePlayer=IA;
        insertTchatLine('Je commence');
        //choisit une position de départ aléatoire parmi les 4 angles
        let startPos= Math.floor(Math.random() *4);
        switch (startPos){
            case 0:
                playTurn(1,1);
                break;
            case 1:
                playTurn(1,3);
                break;
            case 0:
                playTurn(3,3);
                break;
            case 0:
                playTurn(3,1);
                break;
            default:
                playTurn(3,1);
        }
        IA=activePlayer;
    }
    activeBoard();
    insertTchatLine('A toi de jouer.');
    activePlayer=player;
}



// mets des évenements au click sur toutes les cases du plateau
function activeBoard(){
    let squares=document.querySelectorAll('td');
    squares.forEach(function(square){
        square.addEventListener('click', function(e){
            if (e.target.innerHTML==''){
                let colonne= e.target.className.substr(-1);
                let ligne= e.target.parentNode.className.substr(-1);
                playerTurn(ligne, colonne);
            }else{
                insertTchatLine('Cette case est déjà occupée.');
            }
            
        });
    });
}

// verifie que le joueur à cliqué dans une case autorisée
function playerTurn(ligne, colonne){
    if (activePlayer==player){
        playTurn(ligne, colonne);
        nbTurn++;
        player=activePlayer;
        activePlayer=IA;
        insertTchatLine('C\'est à moi');
        iaTurn();
    }else{
        insertTchatLine('N\'essaie pas de tricher, ce n\'est pas ton tour');
    }

}

function iaTurn(){
    let colonne, ligne;
    if (nbTurn==1){
        if (document.querySelector('table .sf_morpion-ligne2 .sf_morpion-col2').innerHTML==''){
            ligne=2;
            colonne=2;
        }else if (document.querySelector('table .sf_morpion-ligne3 .sf_morpion-col1').innerHTML==''){
            ligne=3;
            colonne=1;
        }else{
            ligne=3;
            colonne=3;
        }
    }else{
        let next='';
        for(let key in IA){
            if (IA[key]==2 && player[key]==0){
                next=key;
                break;
            }
        }
        if(next==''){
            for(let key in player){
                if (player[key]==2 && IA[key]==0){
                    next=key;
                    break;
                }
            }
        }
        if (next.substr(0,1)=='c'){
            colonne=next.substr(-1);
            let squares=document.querySelectorAll('.sf_morpion-col'+next.substr(-1));
            squares.forEach(function(square){
                if(square.innerHTML==''){
                    ligne=square.parentNode.className.substr(-1);
                }
            })
        }else if (next.substr(0,1)=='l'){
            ligne=next.substr(-1);
            let squares=document.querySelectorAll('.sf_morpion-ligne'+next.substr(-1)+ ' td');
            squares.forEach(function(square){
                if(square.innerHTML==''){
                    colonne=square.className.substr(-1);
                }
            })
        }else if (next=='d2'){
            if(document.querySelector('.sf_morpion-ligne1 td.sf_morpion-col3').innerHTML==''){
                ligne=1;
                colonne=3;
            }
            if(document.querySelector('.sf_morpion-ligne2 td.sf_morpion-col2').innerHTML==''){
                ligne=2;
                colonne=2;
            }
            if(document.querySelector('.sf_morpion-ligne3 td.sf_morpion-col1').innerHTML==''){
                ligne=3;
                colonne=1;
            }

        }else{ // d1
            for (let i = 1; i <= 3; i++) {
                if(document.querySelector('.sf_morpion-ligne'+i+' td.sf_morpion-col'+i).innerHTML==''){
                    ligne=i;
                    colonne=i;
                    break;
                }
                
            }
        }
    }
    playTurn(ligne, colonne);
    IA=activePlayer;
    activePlayer=player;
    insertTchatLine('A toi '+player.name);
}

//le traitement d'un tour de jeu
function playTurn(line, column){
    let targetSquare=document.querySelector('table tr:nth-child('+line+') td:nth-child('+column+')');
    // met le symboole correspondant au joueur active dans la bonne case
    targetSquare.innerHTML=activePlayer.symbol;
    activePlayer['l'+line]++;
    activePlayer['c'+column]++;
    if (line==column){
        activePlayer['d1']++;
    }
    if ((line==1 && column==3)||(line==2 && column==2)|| (line==3 && column==1)){
        activePlayer['d2']++;
    }
    if(activePlayer['l'+line]==2 || activePlayer['c'+column]==2 || activePlayer['d1']==2 || activePlayer['d2']==2){
        let goodTurnSentence=aleaSentence(2);
        if(goodTurnSentence!=''){
            insertTchatLine(goodTurnSentence);
        }
    }
    if(activePlayer['l'+line]==3 || activePlayer['c'+column]==3 || activePlayer['d1']==3 || activePlayer['d2']==3){
        gameEnd();
    }
}

function insertTchatLine(texte){
    let paragraph=document.createElement('p');
    paragraph.innerHTML=texte;
    tchat.appendChild(paragraph);
}

function gameEnd(){
    insertTchatLine('Victoire de '+activePlayer.name);
    activePlayer='';
}

function  aleaSentence(situation){
    firstName=[
        'Quel joli prénom.',
        'J\'adore ce prénom.',
        'Hummm! Ca me rappelle de bons souvenirs....',
        'Je compatie, tu n\'en as pas trop voulu à tes parents?'
    ];
    goodTurn=[
        'Tu l\'as fait par hasard?', 
        'Pas mal, mais peux mieux faire.',
        'Bien tenté, mais on ne m\'a pas aussi facilement',
        'Un coup de génie!!',
        'Si ce n\'avait pas été moi ton adversaire, ça aurait pu marcher.',
        'hum hum, surprenant!',
        'Je n\'aurais pas fait mieux'
    ]

    let maxRand, randNumberSentence, sentence, sentencesTab;
    switch(situation){
        case 1:
            sentencesTab=firstName;
            break;
        case 2:
            sentencesTab=goodTurn;
            break;
    }
    maxRand=sentencesTab.length*2;
    randNumberSentence=Math.floor(Math.random() *maxRand);
    if (randNumberSentence<sentencesTab.length){
        return sentencesTab[randNumberSentence];
    } else{
        return '';
    }

}