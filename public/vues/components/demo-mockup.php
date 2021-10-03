<section>
    <h2>La page des maquettes de sites web</h2>
    <div class="sf_demo-container">
        <div class="sf_demo-text">
            <p>Toute la partie PHP est basée sur le <strong>modèle MVC</strong> (Modèle, Vue, Controller).</p>
            <p>Toutes les maquettes sont enregistrées en BDD avec toutes leurs informations relatives.</p>
            <p>Un unique contolleur les gère, que ce soit pour l'affichage en gallerie  sur la page <a href="index.php?p=mockup">maquettes</a>, ou pour le détail de l'une d'entre elles.</p>
            <p>Un manager permet d'intéragir avec la BDD pour retourner des objets de type "Mockup".</p>
            <p>Il possède diverses méthodes comme celle qui permet de récupérer en BDD une maquette aléatoire comme c'est le cas ici.</p>
            <p>Deux vues existent, une gallerie de miniatures comme ici à droite et une vue de détail.</p>

        </div>
        <div class="sf_product-card">
            <?php $integree=$mockupExemple->getIsIntegrated()? "OUI":"NON"; ?>
            <div>
                <img src="img/mockup/<?php echo($mockupExemple->getMiniature())?>" alt="" class="sf_img-responsive">
                <div class="overlay">
                    <?php echo($mockupExemple->getDescription()) ?>
                    <div>
                        <p>Maquette intégrée: <?php echo($integree) ?></p>
                    </div>
                </div>
            </div>
            <div class="sf_product-title">
                <a href="index.php?p=mockup&n=<?php echo($mockupExemple->getId())?>"><?php echo($mockupExemple->getTitle()) ?></a>
                <span></span>
            </div>
        </div>  
    </div>
</section>