<section id='sf_morpion'>
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
    </div>
    <div id="morpionchat">


    </div>
    <div id="morpionparams">
        <h3>Selectionnez vos options</h3>
        <form action="" method="post" name="morpionoptions">
            <label >Votre nom :
                <input type="text" name="player" id="player">
            </label>
            <div>
                <input type="radio" name="team" id="crossteam" value="cross" checked=checked><label for="crossteam">X</label>
                <input type="radio" name="team" id="circleteam" value="circle"><label for="circleteam">O</label>
            </div>
            <label for="playerstart">Joueur qui commence :</label>
            <select name="playerstart" id="playerstart" disabled="disabled">
                <option value="IA" >IA</option>
                <option value="">Joueur</option>
            </select>
            <button name="startgame" type="submit" disabled="disabled">Démarrer la partie</button>
        </form>
    
    </div>


</section>