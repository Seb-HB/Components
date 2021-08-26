<?php
class Model{
    private $id;
    private $titre;
    private $coverImage;
    private $description;
    private $brief;
    private $fullPageImage;
    private $responsiveImage;

    public function __construct($id, $titre, $coverImage, $description, $brief, $fullPageImage, $responsiveImage=null){
        $this->id = $id;
        $this->titre = $titre;
        $this->coverImage = $coverImage;
        $this->description = $description;
        $this->brief = $brief;
        $this->fullPageImage = $fullPageImage;
        $this->responsiveImage = $responsiveImage;
    }
}

?>