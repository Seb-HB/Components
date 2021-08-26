<?php
    require 'vues/partials/head.php';
?>
<body>

    <?php
        require 'vues/components/bg-animation.php';
        require 'vues/partials/header.php';
        echo('<main>');
        require 'vues/components/shiny-presentation.php';
        require 'vues/partials/separation.php';
        require 'vues/components/skew-parallax.php';
        require 'vues/partials/separation.php';
        require 'vues/components/sprites-animation.php';
        require 'vues/partials/separation.php';
        require 'vues/components/grid-rotate.php';
        require 'vues/partials/separation.php';
        require 'vues/components/persperctive-band.php';
        require 'vues/partials/separation.php';
        require 'vues/components/API-meteo.php';
        require 'vues/partials/separation.php';
        require 'vues/components/artistic-explode.php';
        require 'vues/partials/separation.php';
        require 'vues/components/bd-manga.php';
        require 'vues/partials/separation.php';
    ?>


        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,192L80,186.7C160,181,320,171,480,186.7C640,203,800,245,960,245.3C1120,245,1280,203,1360,181.3L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
        
    </main>
    <?php
        require 'vues/partials/footer.php';
    ?>

    <script src="js/introSwitch.js"></script>
    <script src="js/perspectives.js"></script>>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script src="js/meteo.js"></script>
    <!-- <script src="js/requestAPI.js"></script> -->
</body>
</html>