<?php
    require 'vues/partials/head.php';
    echo('<body>');
    require 'vues/partials/header.php';
?>
    <section>
        <div class="section-presentation">
            <h1 class="sf-shiny">Maquettes de sites web</h1>
            <p>Toutes les maquettes ci-dessous ont été réalisées dans le cadre d'exercices liés aux formations.</p> 
            <p>Tous les clients sont donc factices comme le cahier des charges assimilé.</p>
            <p>Ces maquettes sont essentiellement réalisées sous Adobe Photoshop.</p>
            <p>Certaines d'entre-elles ont été intégrées, mais pas toutes.</p>
        </div>

        <div id="sf_models-portfolio">
            <?php
                foreach ($mockups as $mockup){
                    $integree=$mockup->getIsIntegrated()? "OUI":"NON";
                    echo('                
                        <div class="sf_product-card">
                            <div>
                                <img src="img/mockup/'.$mockup->getMiniature().'" alt="" class="sf_img-responsive">
                                <div class="overlay">'
                                    .$mockup->getDescription().'
                                    <p>
                                        Maquette intégrée: '.$integree.'
                                    </p>
                                </div>
                            </div>
                            <div class="sf_product-title">
                                <a href="index.php?p=mockup&n='.$mockup->getId().'">'.$mockup->getTitle().'</a>
                                <span></span>
                            </div>
                        </div>      
                    ');
                }
            ?>
        </div>
    </section>
<?php require 'vues/partials/footer.php';?>
</body>
</html>

