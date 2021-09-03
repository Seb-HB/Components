<?php
class AboutController{
    private $metaTitle='Fouvet Sébastien, développeur FullStack';
    private $metaDescription= 'En cours de formation, je cherche un stage en entreprise, comme développeur web, du 2/11/21 au 10/01/22. Egalement disponible pour un contrat après.';

    function getPage(){
        require 'vues/about.php';
    }

}


?>