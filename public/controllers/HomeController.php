<?php
class HomeController{
    private $metaTitle='Fouvet Sébastien Développeur Web';
    private $metaDescription='Développeur fullstack junior en formation, découvrez le portfolio de mes réalisations en CSS PHP, JS... Contactez moi si vous aimez, je cherche un stage du 2/11/2021 au 10/01/2022.';



    function getHomepage(){
        require 'vues/home.php';
    }

}

?>