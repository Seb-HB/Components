<?php
class MockupController{
    private $metaTitle='Maquettes de sites web';
    private $metaDescription='';
    private $mM;

    
    public function __construct(){
        $this->mM=new MockupManager;
    }

    function mockupRouting(){
        if(isset($_GET['n'])){
            $mockup=$this->mM->findOne($_GET['n']);
            $othersMockups=$this->mM->findXOthers($_GET['n'], 3);
            require 'vues/mockup.php';
        }else{
            $mockups=$this->mM->findAll();
            require 'vues/mockups.php';
        }
    }

}


?>