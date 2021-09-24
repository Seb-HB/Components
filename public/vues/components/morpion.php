<section id='sf_morpion'>
    <div class="section-presentation">
        <h2>Morpion et IA</h2>
        <p>Le but est de coder une micro <em>Intelligence Artificielle</em></p>
        <p>Le jeu est pontué de phrases humoristiques semi-aléatoires pour le rendre plus fun.</p>
        <p>Amusez vous bien avec ce morpion.</p>
    </div>
    <div id='morpiongame'>
        <div id="morpionboard">
            <table>
                <tr class='sf_morpion-ligne1'>
                    <td class='sf_morpion-col1'></td>
                    <td class='sf_morpion-col2'></td>
                    <td class='sf_morpion-col3'></td>
                </tr>
                <tr class='sf_morpion-ligne2'>
                    <td class='sf_morpion-col1'></td>
                    <td class='sf_morpion-col2'></td>
                    <td class='sf_morpion-col3'></td>
                </tr>
                <tr class='sf_morpion-ligne3'>
                    <td class='sf_morpion-col1'></td>
                    <td class='sf_morpion-col2'></td>
                    <td class='sf_morpion-col3'></td>
                </tr>
            </table>
            <div class="sf_mVictory">
                
            </div>
        </div>
        <div id="morpionchat">
        </div>
        <div id="morpionparams">
            <h3>Selectionnez vos options</h3>
            <form action="" method="post" name="morpionoptions">
                <div>
                    <input type="checkbox" name="audio" id="audio">
                    <label for="audio"></label> 
                </div>
                <div>
                    <label >Votre nom :
                        <input type="text" name="player" id="player">
                    </label>
                </div>
                <div>
                    <p>Choisissez votre camp:</p>
                    <input type="radio" name="team" id="crossteam" value="cross" checked=checked><label for="crossteam">X</label>
                    <input type="radio" name="team" id="circleteam" value="circle"><label for="circleteam">O</label>
                </div>
                <div>
                    <label for="playerstart">Joueur qui commence :</label>
                    <select name="playerstart" id="playerstart" disabled="disabled">
                        <option value="IA" >IA</option>
                        <option value="">Joueur</option>
                    </select>
                </div>
                <button class="sf_btn" name="startgame" type="submit" disabled="disabled">Démarrer la partie</button>
            </form>
        
        </div>
    </div>
    <div class="sf_tag-links">
        <a href="index.php?p=js"><img src="img/objects/tag-JS.png" alt="Tag CSS"></a>
    </div>
</section>