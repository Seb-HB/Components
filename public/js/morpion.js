// https://www.devenir-webmaster.com/V2/TUTO/CHAPITRE/JAVASCRIPT/34-select/
let player,IA,activePlayer,filledSquares;
let gameActive=false;
let boardActive=false;
let gameAudio=false;
let bouton=document.querySelector("button[name='startgame']");
let select=document.querySelector('select');
let tchat=document.querySelector("#morpionchat");
let params=document.querySelector("#morpionparams");


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
    initPlayers();
    player.name=document.querySelector("#player").value;
    activePlayer=select.value;
    (document.getElementById("audio").checked)? gameAudio=true : gameAudio=false;
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
    //remplace les parametres de partie par la fenetre de chat
    params.style.display='none';
    tchat.style.display='block';
    //le jeu est en cours
    gameActive=true;
    // début du jeu: aucune case occupée
    filledSquares=0;

    insertTchatLine('Enchantée <b>'+player.name+'</b>.');
    insertTchatLine(aleaSentence(1));
    insertTchatLine('Moi c\'est <b>'+IA['name']+'</b>.');
    insertTchatLine('Ravie de jouer contre toi et bonne chance!!');

    // si l'IA commence
    if(activePlayer=='IA'){
        activePlayer=IA;
        insertTchatLine('Je commence');
        //choisit une position de départ aléatoire parmi les 4 angles
        let startPos= randomise(4);
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
    // lance la fonction qui prépare le plateau si ça n'avait pas déja été fait
    if (!boardActive){
        activeBoard();
    }
    // donne la main au joueur
    insertTchatLine('-- A toi de jouer. --');
    activePlayer=player;
}



// mets des évenements au click sur toutes les cases du plateau
function activeBoard(){
    let squares=document.querySelectorAll('td');
    squares.forEach(function(square){
        square.addEventListener('click', function(e){
            if(gameActive){
                if (e.target.innerHTML==''){
                    let colonne= e.target.className.substr(-1);
                    let ligne= e.target.parentNode.className.substr(-1);
                    playerTurn(ligne, colonne);
                }else{
                    insertTchatLine('Cette case est déjà occupée.');
                }  
            }
        });
    });
    boardActive=true;
}

// vide le tableau de tous les symboles présents
function resetBoard(){
    let squares=document.querySelectorAll('td');
    squares.forEach(function(square){
        square.innerHTML='';
    });
}


function playerTurn(ligne, colonne){
    // vérifie que le joueur ne clique pas hors de son tour
    if (activePlayer==player){
        playTurn(ligne, colonne);
        if(gameActive){
            player=activePlayer;
            activePlayer=IA;
            insertTchatLine('-- C\'est à moi --');
            iaTurn();
        }
    }else{
        insertTchatLine('N\'essaie pas de tricher, ce n\'est pas ton tour');
    }
}

function iaTurn(){
    let colonne, ligne;
    //au premier tour, il n'y a pas plusieurs symboles alignés donc le choix est basé sur le meilleur coup initial
    if (filledSquares<3){
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
    }else{//sinon
        let next='';
        // si l'IA peut gagner elle choisit ce coup
        for(let key in IA){
            if (IA[key]==2 && player[key]==0){
                next=key;
                insertTchatLine(aleaSentence(4));
                break;
            }
        }
        // sinon si le joueur peut gagner, elle le bloque
        if(next==''){
            for(let key in player){
                if (player[key]==2 && IA[key]==0){
                    next=key;
                    break;
                }
            }
        }
        // si personne ne peut gagner, le coup est aléatoire
        if(next==''){
            for(let key in player){
                if ((IA[key]+player[key])<3){
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
    // lance le tour de l'IA selon le coup choisit
    playTurn(ligne, colonne);
    if (gameActive){
        // récupère les données mises à jour de l'IA grace aux données d'activePlayer
        IA=activePlayer;
        // donne la main au joueur
        activePlayer=player;
        insertTchatLine('-- A toi <b>'+player.name+'</b> --');
    }
}

//le traitement d'un tour de jeu du joueur actif
function playTurn(line, column){
    if(gameAudio){
        let sound=new Audio('../audio/pion'+randomise(4,1)+'.mp3');
        sound.play();
    }
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
    // si le coup joué permet d'aligner 2 symboles identiques
    if(activePlayer['l'+line]==2 || activePlayer['c'+column]==2 || activePlayer['d1']==2 || activePlayer['d2']==2){
        let goodTurnSentence;
        // on demande une phrase aléatoire selon le joueur actif
        (activePlayer['name']==player['name'])? goodTurnSentence=aleaSentence(2) : goodTurnSentence=aleaSentence(3);
        if(goodTurnSentence!=''){
            insertTchatLine(goodTurnSentence);
        }
    }
    //incrémente le nombre de cases occupées
    filledSquares++;
    // si le joueur actif a aligné 3 symboles, on lance la fin de partie
    if(activePlayer['l'+line]==3 || activePlayer['c'+column]==3 || activePlayer['d1']==3 || activePlayer['d2']==3){
        gameEnd();
    }else if (filledSquares>=9){   //toutes les cases sont remplies
        gameEnd('nul');
    }
}

// insère des message dans la fenêtre prévue
function insertTchatLine(texte){
    if(texte!=''){
        let paragraph=document.createElement('p');
        paragraph.innerHTML=texte;
        tchat.appendChild(paragraph);
        tchat.scrollTop=tchat.scrollHeight;
    }
}

// fin du jeu
function gameEnd(statut=null){
    let victory=document.querySelector(".sf_mVictory");
    //désactive le jeu
    gameActive=false;
    if(statut==null){
        insertTchatLine('Victoire de <b>'+activePlayer.name+'</b>');
        victory.innerHTML='Victoire de '+activePlayer.name;
        if(gameAudio){
            if (activePlayer.name==IA.name){
                let sound=new Audio('../audio/defaite'+randomise(6,1)+'.mp3');
                sound.play();
            }else{
                let sound=new Audio('../audio/victoire'+randomise(3,1)+'.mp3');
                sound.play();
            }
        }
    }else{
        insertTchatLine('Match nul, personne ne gagne.');
        victory.innerHTML=aleaSentence(5,1);
    }
    // lance l'animation de victoire
    victory.style.display='block';
    victory.animate([
        { transform: 'scale(0) rotate(0deg)' },
        { transform: 'scale(1) rotate(720deg)'},
        ],{
            duration: 1000,
            fill: "forwards"
        }
    );
    //insère un bouton pour lancer une nouvelle partie dans le tchat
    let newGame=document.createElement('button');
    newGame.innerHTML='Nouvelle partie';
    newGame.classList=['sf_relaunch sf_btn'];
    tchat.appendChild(newGame);
    tchat.scrollTop=tchat.scrollHeight;
    newGame.addEventListener('click',launchNewGame);
}

// fonction appelée lorsque le joueur veut faire une nouvelle partie
function launchNewGame() {
    initPlayers();
    resetBoard();
    document.querySelector(".sf_mVictory").animate([
        { transform: 'scale(1)' },
        { transform: 'scale(0)'},
        ],{
            duration: 50,
            fill: "forwards"
        }
    );
    while (tchat.firstChild){
        tchat.removeChild(tchat.firstChild);
    }
    params.style.display='block';
    // document.querySelector("#player").value='';
    tchat.style.display='none';
}

// en début de partie reset les joueurs
function initPlayers(){
    player={
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
    IA={ 
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
}
//fonction qui renvoie des phrases aléatoirement choisie parmi un panel selon la situation.
function  aleaSentence(situation, chance=2){
    let maxRand, randNumberSentence, sentencesTab;

    // chaque tableau correspond à une situation
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
        'Contre un autre adversaire, ça aurait pu marcher.',
        'hum hum, surprenant!',
        'Je n\'aurais pas fait mieux'
    ]
    autoSuff=[
        'Je vais t\'écraser',
        'Tu vas perdre',
        'N\'ai pas peur, ça ne fait pas mal',
        'Hahahahahaha!!!!!',
        'Tremble vermiceau!'
    ]
    victoryProud=[
        'Tu retenteras.',
        'Tu pensais pouvoir me battre?', 
        'Tu n\'avais aucune chance!',
        'C\'est qui le lion maintenant?',
        'Désolé, c\'est le jeu.'
    ]
    nul=[
        'Match nul, tu t\'en sors bien!',
        'Ce n\'est pas passé loin!',
        'C\'est tout ce que tu as dans le ventre?',
        'Peux mieux faire....',
        'Je m\'en doutais.',
        'Fais un effort la prochaine fois.'
    ]
    IAVictory=[
        'suprême victory, finish him!',
        'Je te l\'avais dit...',
        'Tu me dois 100 balles',
        'Qui s\'y frotte s\'y pique',
    ]

    // sélectionne le bon tableau en fonction de l'argument/situation
    switch(situation){
        case 1:
            sentencesTab=firstName;
            break;
        case 2:
            sentencesTab=goodTurn;
            break;
        case 3:
            sentencesTab=autoSuff;
            break;
        case 4:
            sentencesTab=victoryProud;
            break;
        case 5:
            sentencesTab=nul;
            break;
        case 6:
            sentencesTab=IAVictory;
            break;
    }

    // fait un rand sur le double de la taille du tableau choisit afin qu'une phrase n'apparaisse qu'une fois sur 2
    maxRand=sentencesTab.length*chance;
    randNumberSentence=randomise(maxRand);
    if (randNumberSentence<sentencesTab.length){
        return sentencesTab[randNumberSentence];
    } else{
        return '';
    } 
}

function randomise(max, min=0) {
    return (Math.floor(Math.random() *(max-min))+min);
}