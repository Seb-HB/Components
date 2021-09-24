<?php
    require 'vues/partials/head.php';
    echo('<body>');
    require 'vues/partials/header.php';
?>

    <section id="contact-me">
        <div>
            <form method='post' action="index.php?p=contact">
                <label for='inName'>Votre Nom:</label>
                <input type="text" name="nom" required="required" id='inName' >
                <div class="sf_field-error"></div>
                <label for='infirstname'>Votre Prénom:</label>
                <input type="text" name="prenom" required="required" id='infirstname'>
                <div class="sf_field-error"></div>
                <label for='inMail'>Votre Mail:</label>
                <input type="mail" name="mail" required="required" id='inMail'>
                <div class="sf_field-error"></div>
                <label for='sujet-select'>Choisissez un sujet:</label>
                <select name="sujet"  id='sujet-select'>
                    <option value="Stage">Proposer un stage</option>
                    <option value="Travail">Proposer une mission</option>
                    <option value="Comment">Laisser un commentaire</option>
                    <option value="Divers">Autre sujet</option>
                </select>
            
                <label >Votre Message:</label>
                <textarea name="message"  required="required"></textarea>
                <div class="sf_field-error"></div>
                <button class="sf_btn" type="submit" name="contact-post">Poster</button>
            </form>
            <div id="sendmailalert">
                <?php
                if(isset($_SESSION['sendMail']['errors'])){
                    foreach ($_SESSION['sendMail']['errors'] as $error){
                        echo('<p>'.$error.'</p>');
                    }
                }
                if(isset($_SESSION['sendMail']['result'])){
                    echo('<p>'.$_SESSION['sendMail']['result'].'</p>');
                }
                ?>
            </div>
        </div>
    </section>

<?php
        require 'vues/partials/footer.php';
    ?>
    <script src="js/contact.js"></script>>
</body>
</html>
