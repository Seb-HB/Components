<?php
    require 'vues/partials/head.php';
    echo('<body>');
    require 'vues/partials/header.php';
?>
    
    <h1 class="sf-shiny"><?php echo($mockup->getTitle()); ?></h1>
    <main id="sf_mockup-detail">
        <div>
            <?php 
            echo($mockup->getSpecifications()); 
            if(!is_null($mockup->getSecondImg())){
                echo('
                <figure>
                    <img src="img/mockup/'.$mockup->getSecondImg().'" alt="Création de la maquette '.$mockup->getTitle().'">
                    <figcaption>Création de la maquette.</figcaption>
                </figure>
                ');
            }
            if(!is_null($mockup->getThirdImg())){
                echo('
                <figure>
                    <img src="img/mockup/'.$mockup->getThirdImg().'" alt="Création de la maquette '.$mockup->getTitle().'">
                    <figcaption>Autre vue de la maquette.</figcaption>
                </figure>
                ');
            }
            ?>
        </div>
        <div>
            <figure>
                <img src="img/mockup/<?php echo($mockup->getFullImg()); ?>" alt="Maquette <?php echo($mockup->getTitle()); ?> version desktop.">
                <figcaption>Maquette <?php echo($mockup->getTitle()); ?> version desktop.</figcaption>
            </figure>
            
        </div>
    </main>
    <section id='sf_mockup-suggest'>
        <h2>Vous aimerez aussi:</h2>
        <div>
            <?php
            foreach ($othersMockups as $mockup) {
                echo('
                <div>
                    <figure>
                        <a href="index.php?p=mockup&n='.$mockup->getId().'" ><img src="img/mockup/'.$mockup->getMiniature().'" alt="maquette '.$mockup->getTitle().'"></a>
                        <figcaption>Maquette '.$mockup->getTitle().'.</figcaption>
                    </figure>
                </div>
                ');
            }
            ?>
        </div>
    </section>
    
<?php require 'vues/partials/footer.php';?>
</body>
</html>
