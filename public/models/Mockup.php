<?php
class Mockup{
    private $id;
    private $title;
    private $description;
    private $specifications;
    private $miniature;
    private $fullImg;
    private $secondImg;
    private $thirdImg;
    private $responsiveImg;
    private $isIntegrated;
    private $video;

    public function __construct($title, $description, $specifications, $miniature, $fullImg, $isIntegrated, $secondImg=null, $thirdImg=null, $responsiveImg=null, $video=null, $id=null){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->specifications = $specifications;
        $this->miniature = $miniature;
        $this->fullImg = $fullImg;
        $this->secondImg = $secondImg;
        $this->thirdImg = $thirdImg;
        $this->responsiveImg = $responsiveImg;
        $this->isIntegrated = $isIntegrated;
        $this->video = $video;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of specifications
     */ 
    public function getSpecifications()
    {
        return $this->specifications;
    }

    /**
     * Set the value of specifications
     *
     * @return  self
     */ 
    public function setSpecifications($specifications)
    {
        $this->specifications = $specifications;

        return $this;
    }

    /**
     * Get the value of miniature
     */ 
    public function getMiniature()
    {
        return $this->miniature;
    }

    /**
     * Set the value of miniature
     *
     * @return  self
     */ 
    public function setMiniature($miniature)
    {
        $this->miniature = $miniature;

        return $this;
    }

    /**
     * Get the value of fullImg
     */ 
    public function getFullImg()
    {
        return $this->fullImg;
    }

    /**
     * Set the value of fullImg
     *
     * @return  self
     */ 
    public function setFullImg($fullImg)
    {
        $this->fullImg = $fullImg;

        return $this;
    }

    /**
     * Get the value of secondImg
     */ 
    public function getSecondImg()
    {
        return $this->secondImg;
    }

    /**
     * Set the value of secondImg
     *
     * @return  self
     */ 
    public function setSecondImg($secondImg)
    {
        $this->secondImg = $secondImg;

        return $this;
    }

    /**
     * Get the value of thirdImg
     */ 
    public function getThirdImg()
    {
        return $this->thirdImg;
    }

    /**
     * Set the value of thirdImg
     *
     * @return  self
     */ 
    public function setThirdImg($thirdImg)
    {
        $this->thirdImg = $thirdImg;

        return $this;
    }

    /**
     * Get the value of responsiveImg
     */ 
    public function getResponsiveImg()
    {
        return $this->responsiveImg;
    }

    /**
     * Set the value of responsiveImg
     *
     * @return  self
     */ 
    public function setResponsiveImg($responsiveImg)
    {
        $this->responsiveImg = $responsiveImg;

        return $this;
    }

    /**
     * Get the value of isIntegrated
     */ 
    public function getIsIntegrated()
    {
        return $this->isIntegrated;
    }

    /**
     * Set the value of isIntegrated
     *
     * @return  self
     */ 
    public function setIsIntegrated($isIntegrated)
    {
        $this->isIntegrated = $isIntegrated;

        return $this;
    }

    /**
     * Get the value of video
     */ 
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @return  self
     */ 
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }
}

?>