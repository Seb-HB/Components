<?php
    require 'vues/partials/head.php';
    echo('<body>');
    require 'vues/partials/header.php';
?>
    <section id="shiny">
        <h1 class="sf-shiny">Développement PHP </h1>
        <p>L'ensemble de ce site est développé en PHP orienté objet.</p>
        <p>Contrairement au autres technologies, il n'y a pas de composants exclusifs PHP.</p>
        <p>Je vais donc simplement recensé quelques exemples de ce qu'on trouve sur le site et qui est développé en PHP objet.</p>
    </section>
    <section>
        <h2>La page contact</h2>
        <div>
            <div>

            </div>
            <div>
                
            </div>
        </div>

    </section>


<?php
    require 'vues/partials/footer.php';
    foreach ($this->scripts as $script){
        echo($script);
    }
    ?>
</body>
</html>