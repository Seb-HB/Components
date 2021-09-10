<?php 
class ComponentController{
    private $componentManager;
    private $scripts=[];
    private $metaTitle;
    private $metaDescription;

    public function __construct(){
        $this->componentManager = new ComponentManager;
    }

    public function selectComponents($cat){
        $tag='use'.strtoupper($cat);
        switch($cat){
            case 'css': 
                $this->metaTitle ='Composants CSS';
                $this->metaDescription ='Cette page est composée d\'un ensemble de composants individuels réutilisables utilisant des propriétés CSS. J\'utilise le préprocesseur SCSS.';
                break;
            case 'js': 
                $this->metaTitle ='Composants JS';
                $this->metaDescription ='Cette page est composée d\'un ensemble de composants individuels réutilisables utilisant Javascript. J\'utilise Javascript natif, sans librairie.';
                break;
            case 'api': 
                $this->metaTitle ='Composants utilisant une API';
                $this->metaDescription ='Cette page est composée d\'un ensemble de composants individuels réutilisables qui explore les API diverses et variées disponibles sur internet.';
                break;
            case 'php': 
                $this->metaTitle ='Composants utilisant dss propriétés PHP';
                $this->metaDescription ='Cette page est composée d\'un ensemble de composants individuels réutilisables développés en PHP orienté objets.';
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