<?php

class ContactController{
    private $sujets=['Stage', 'Travail', 'Comment', 'Divers'];


    function sendmail($post){
        if(!isset($_SESSION['mail'])){
            $_SESSION['mail']=0;
        }
        $data=$this->verifData($post);
        
        if($data==FALSE){
            return "Mail non délivré, des données sont non conformes.";
        }
        
        if ($_SESSION['mail']<3){
            $retour=$this->prepaMail($data);
        }else{
            $retour="Envoi impossible car vous avez dépassé le nombre maximal de mails à envoyer";
        }
        return $retour;
        
    }
    
    
    function verifData($data){
        if(!preg_match("#^[a-zA-Z]{3,}$#", $data['nom'])){
            return false;
        }
        if(!preg_match('#^[a-zA-Z]{3,}$#', $data['prenom'])){
            return false;
        }
        if(!preg_match('#^[a-z]([a-z0-9]*[\.\-\_]?[a-z0-9]+)+@[a-z]{2,15}[.][a-z]{2,20}$#', $data['mail'])){
            return false;
        }
        if(!in_array($data['sujet'], $this->sujets)){
            return false;
        }
        if(!preg_match('#^[a-zA-Z0-9]{10,}$#', $data['message'])){
            return false;
        } 
       
        foreach ($data as $key=>$value){
            $data2[$key]=  htmlentities($value);
        }
        return $data2;
    }
    
    
    
    function prepaMail($data){
    //    foreach ($data as $key=>$value){
    //        $data[$key]=mb_encode_mimeheader( $value);   
    //    }
        
        
        $to="XXX";
        $subject="Vous avez un nouveaux message envoyé par ".$data['nom'];
        $preferences = ['input-charset' => 'UTF-8', 'output-charset' => 'UTF-8'];
        $encoded_subject = iconv_mime_encode('Subject', $subject, $preferences);
        $encoded_subject = substr($encoded_subject, strlen('Subject: '));
       
        
        $message="<b>Nom : </b>".$data['nom']."<br/><b>Prénom : </b>".$data['prenom']."<br/><b>Tel : </b>".$data['tel']."<br/><b>Mail : </b>".$data['mail']."<br/><b>Sujet : </b>".$data['sujet']."<br/><b>Message : </b><br/>".$data['message']."<br/>";
        
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'To: Seb <XXX>' . "\r\n";
        $headers .= 'From: SiteEval <site@contact.fr>' . "\r\n";
    
        if (mail($to, $encoded_subject, $message, $headers)){
            $_SESSION['mail']++;
            $retour="Votre mail est envoyé, il sera traité dans les plus brefs délais";
        }else{
            $retour="Echec lors de l'envoi";
        }
        
        return $retour;
    }



}
