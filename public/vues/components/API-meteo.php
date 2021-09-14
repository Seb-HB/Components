<section id="meteocity">
    <div class="section-presentation">
        <h2>Utilisation des API</h2>
        <p>Les requêtes AJAX permettent d'obtenir des informations de 3 <em>API</em> différentes</p>
        <p>D'abord la carte grâce l'<em>API</em> <a href="https://leafletjs.com/">leaflet</a>.</p>
        <p>Ensuite, lorsqu'on clique sur la carte qu'on vient de générer, la météo grâce à l'<em>API</em> <a href="https://www.prevision-meteo.ch/services/">prevision-meteo.ch</a>.</p>
        <p>Enfin on fait du geocoding reverse grâce à l'<em>API</em> <a href="https://opencagedata.com/">openCage</a> pour obtenir un nom de ville.</p>
        <p>Le tout est mis en forme grace aux <em>Flexbox</em></p>
    </div>
    <h3>Météo à 5 jours</h3>
    <div></div>
    <div id="your-meteo">
        <div id="meteo-plan">
            <div id="meteomap"></div>
            <p>selectionnez votre ville en cliquant sur la map</p>
        </div>
        <div id="meteo-render">

            <div class="meteo-j j1"></div>
            <div class="meteo-j j2"></div>
            <div class="meteo-j j3"></div>
            <div class="meteo-j j4"></div>
            <div class="meteo-j j5"></div>
        </div>
    </div>
    <div class="sf_tag-links">
        <a href="index.php?p=css"><img src="img/objects/tag-CSS.png" alt="Tag CSS"></a>
        <a href="index.php?p=api"><img src="img/objects/tag-API.png" alt="Tag CSS"></a>
    </div>
</section>