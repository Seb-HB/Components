<?php 
class ComponentController{
    private $componentManager;
    private $scripts=[];
    private $metaTitle;
    private $metaDescription;
    private $entete;

    public function __construct(){
        $this->componentManager = new ComponentManager;
    }

    public function selectComponents($cat){
        $tag='use'.strtoupper($cat);
        switch($cat){
            case 'css': 
                $this->metaTitle ='Composants CSS';
                $this->metaDescription ='Cette page est composée d\'un ensemble de composants individuels réutilisables utilisant des propriétés CSS. J\'utilise le préprocesseur SCSS.';
                $this->entete="";
                break;
            case 'js': 
                $this->metaTitle ='Composants JS';
                $this->metaDescription ='Cette page est composée d\'un ensemble de composants individuels réutilisables utilisant Javascript. J\'utilise Javascript natif, sans librairie.';
                $this->entete="";
                break;
            case 'api': 
                $this->metaTitle ='Composants utilisant une API';
                $this->metaDescription ='Cette page est composée d\'un ensemble de composants individuels réutilisables qui explore les API diverses et variées disponibles sur internet.';
                $this->entete="";
                break;
            case 'php': 
                $this->metaTitle ='Developpement PHP objet';
                $this->metaDescription ='Cette page les différents éléments du site qui ont été développés en PHP orienté objets.';
                $this->entete= '
                    <section id="shiny">
                        <h1 class="sf-shiny">Développement PHP Objets</h1>
                        <p>L\'ensemble de ce site est développé en <strong>PHP orienté objet</strong>.</p>
                        <p>Contrairement au autres technologies, il n\'y a pas de composants exclusifs PHP.</p>
                        <p>Je vais donc simplement recensé quelques exemples de ce qu\'on trouve sur le site et qui est développé en PHP objet.</p>
                    </section>';
                $mM=new MockupManager;
                $mockupExemple=$mM->findOneRand();
                break;
                default: 
                header('location: index.php');
        }
        
        $components=$this->getComponentsByTag($tag, 1);
        require 'vues/components.php';

    }


    private function getComponentsByTag($tag, $value){
        $components=$this->componentManager->findBy($tag, $value);
        return $components;
    }
}

?>