<?php

class Component{
    private $id;
    private $designation;
    private $filePHP;
    private $primaryCSSFile;
    private $secondaryCSSFile;
    private $scriptJS;
    private $fullWidth;
    private $addDate;
    private $useCSS;
    private $useJS;
    private $useAPI;


    public function __construct($designation, $filePHP, $primaryCSSFile,$secondaryCSSFile,$scriptJS,$fullWidth,$addDate,$useCSS,$useJS, $useAPI, $id=null){
        $this->id = $id;
        $this->designation = $designation;
        $this->filePHP = $filePHP;
        $this->primaryCSSFile = $primaryCSSFile;
        $this->secondaryCSSFile = $secondaryCSSFile;
        $this->scriptJS = $scriptJS;
        $this->fullWidth = $fullWidth;
        $this->addDate = $addDate;
        $this->useCSS = $useCSS;
        $this->useJS = $useJS;
        $this->UseApi = $useAPI;
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
     * Get the value of primaryCSSFile
     */ 
    public function getPrimaryCSSFile()
    {
        return $this->primaryCSSFile;
    }

    /**
     * Set the value of primaryCSSFile
     *
     * @return  self
     */ 
    public function setPrimaryCSSFile($primaryCSSFile)
    {
        $this->primaryCSSFile = $primaryCSSFile;

        return $this;
    }

    /**
     * Get the value of sesignation
     */ 
    public function getSesignation()
    {
        return $this->sesignation;
    }

    /**
     * Set the value of sesignation
     *
     * @return  self
     */ 
    public function setSesignation($sesignation)
    {
        $this->sesignation = $sesignation;

        return $this;
    }

    /**
     * Get the value of filePHP
     */ 
    public function getFilePHP()
    {
        return $this->filePHP;
    }

    /**
     * Set the value of filePHP
     *
     * @return  self
     */ 
    public function setFilePHP($filePHP)
    {
        $this->filePHP = $filePHP;

        return $this;
    }

    /**
     * Get the value of secondaryCSSFile
     */ 
    public function getSecondaryCSSFile()
    {
        return $this->secondaryCSSFile;
    }

    /**
     * Set the value of secondaryCSSFile
     *
     * @return  self
     */ 
    public function setSecondaryCSSFile($secondaryCSSFile)
    {
        $this->secondaryCSSFile = $secondaryCSSFile;

        return $this;
    }

    /**
     * Get the value of scriptJS
     */ 
    public function getScriptJS()
    {
        return $this->scriptJS;
    }

    /**
     * Set the value of scriptJS
     *
     * @return  self
     */ 
    public function setScriptJS($scriptJS)
    {
        $this->scriptJS = $scriptJS;

        return $this;
    }

    /**
     * Get the value of fullWidth
     */ 
    public function getFullWidth()
    {
        return $this->fullWidth;
    }

    /**
     * Set the value of fullWidth
     *
     * @return  self
     */ 
    public function setFullWidth($fullWidth)
    {
        $this->fullWidth = $fullWidth;

        return $this;
    }

    /**
     * Get the value of addDate
     */ 
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set the value of addDate
     *
     * @return  self
     */ 
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get the value of useCSS
     */ 
    public function getUseCSS()
    {
        return $this->useCSS;
    }

    /**
     * Set the value of useCSS
     *
     * @return  self
     */ 
    public function setUseCSS($useCSS)
    {
        $this->useCSS = $useCSS;

        return $this;
    }

    /**
     * Get the value of useJS
     */ 
    public function getUseJS()
    {
        return $this->useJS;
    }

    /**
     * Set the value of useJS
     *
     * @return  self
     */ 
    public function setUseJS($useJS)
    {
        $this->useJS = $useJS;

        return $this;
    }

    /**
     * Get the value of useAPI
     */ 
    public function getUseAPI()
    {
        return $this->useAPI;
    }

    /**
     * Set the value of useAPI
     *
     * @return  self
     */ 
    public function setUseAPI($useAPI)
    {
        $this->useAPI = $useAPI;

        return $this;
    }
}


?>