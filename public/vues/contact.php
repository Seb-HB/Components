<?php
    require 'vues/partials/head.php';
    echo('<body>');
    require 'vues/partials/header.php';
?>

    <section id="contact-me">
        <form method='post' action="index.php?p=mail">
            <label>Votre Nom:
                <input type="text" name="nom" required="required" >
            </label>
            <div class="sf_field-error"></div>
            <label >Votre Prénom:
                <input type="text" name="prenom" required="required">
            </label>
            <div class="sf_field-error"></div>
            <label >Votre Mail:
                <input type="mail" name="mail" required="required">
            </label>
            <div class="sf_field-error"></div>
            <label >Choisissez un sujet:
                <select name="sujet" >
                    <option value="Stage">Proposer un stage</option>
                    <option value="Travail">Proposer une mission</option>
                    <option value="Comment">Laisser un commentaire</option>
                    <option value="Divers">Autre sujet</option>
                </select>
            </label>
            <label >
                <textarea name="message"  required="required"></textarea>
            </label>
            <div class="sf_field-error"></div>
            <button type="submit" name="contact-post">Poster</button>
        </form>
    </section>

<?php
        require 'vues/partials/footer.php';
    ?>
    <script src="js/contact.js"></script>>
</body>
</html>
