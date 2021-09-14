<?php 
Class Message{
    private $to;
    private $subject;
    private $preferences= ['input-charset' => 'UTF-8', 'output-charset' => 'UTF-8'];
    private $encoded_subject; 
    private $content;
    private $headers;

    public function __construct($datas){
        global $targetMail;
        $this->to = $targetMail;
        $this->subject = $datas['sujet'];
        $this->encoded_subject = iconv_mime_encode('Subject', $this->subject, $this->preferences);
        $this->encoded_subject= substr($this->encoded_subject, strlen('Subject: '));

        $this->content="<b>Nom : </b>".$datas['nom']."<br/><b>Prénom : </b>".$datas['prenom']."<br/><b>Mail : </b>".$datas['mail'].
        "<br/><b>Sujet : </b>".$datas['sujet']."<br/><b>Message : </b><br/>".$datas['message']."<br/>";

        $this->headers='MIME-Version: 1.0' . "\r\n";
        $this->headers.='Content-type: text/html; charset=utf-8' . "\r\n";
        $this->headers.='To: Seb <'.$targetMail.'>' . "\r\n";
        $this->headers .= 'From: sebastienfouvet.fr <'.$datas['mail'].'>' . "\r\n";
    }




    /**
     * Get the value of to
     */ 
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the value of to
     *
     * @return  self
     */ 
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of preferences
     */ 
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * Set the value of preferences
     *
     * @return  self
     */ 
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Get the value of encoded_subject
     */ 
    public function getEncoded_subject()
    {
        return $this->encoded_subject;
    }

    /**
     * Set the value of encoded_subject
     *
     * @return  self
     */ 
    public function setEncoded_subject($encoded_subject)
    {
        $this->encoded_subject = $encoded_subject;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of headers
     */ 
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set the value of headers
     *
     * @return  self
     */ 
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }
}

?>