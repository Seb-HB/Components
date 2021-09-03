<?php

class ContactController{
    private $sujets=['Stage', 'Travail', 'Comment', 'Divers'];


    function contactRouting(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_SESSION['sendMail']['errors']=[];
            $this->sendmail();
        }
        require 'vues/contact.php';
    }


    function sendmail(){
        if(!isset($_SESSION['sendMail']['nb'])){
            $_SESSION['sendMail']['nb']=0;
        }
        if($_SESSION['sendMail']['nb']<3){
            $data=$this->verifData($_POST);
        }else{
            $_SESSION['sendMail']['errors'][]='Vous avez atteint le quota de mails quotidien';
        }
        if (count($_SESSION['sendMail']['errors'])==0){
            $this->prepaMail($data);
        }
    }
    
    
    function verifData($data){
        if(!preg_match("#^[a-zA-Z]{3,}$#", $data['nom'])){
            $_SESSION['sendMail']['errors'][]='le nom saisi ne respecte pas les ciritères';
        }
        if(!preg_match('#^[a-zA-Z]{3,}$#', $data['prenom'])){
            $_SESSION['sendMail']['errors'][]='le prénom saisi ne respecte pas les ciritères';
        }
        if(!preg_match('#^[a-z]([a-z0-9]*[\.\-\_]?[a-z0-9]+)+@[a-z]{2,15}[.][a-z]{2,20}$#', $data['mail'])){
            $_SESSION['sendMail']['errors'][]='l\'email saisi ne semble pas être valide';
        }
        if(!in_array($data['sujet'], $this->sujets)){
            $_SESSION['sendMail']['errors'][]='Utilisez un sujet de la séléction.';
        }
        if(!preg_match('#^[a-zA-Z0-9]{10,}$#', $data['message'])){
            $_SESSION['sendMail']['errors'][]='le texte ne doit pas contenir de caractères spéciaux';
        } 
       
        $data2=[];
        if (count($_SESSION['sendMail']['errors'])==0){
            foreach ($data as $key=>$value){
                $data2[$key]=  htmlentities($value);
            }
        }
        return $data2;
    }
    
    
    
    function prepaMail($data){
    //    foreach ($data as $key=>$value){
    //        $data[$key]=mb_encode_mimeheader( $value);   
    //    }
        
        
        $to="contact@sebastienfouvet.fr";
        $subject="Vous avez un nouveaux message envoyé par ".$data['nom'];
        $preferences = ['input-charset' => 'UTF-8', 'output-charset' => 'UTF-8'];
        $encoded_subject = iconv_mime_encode('Subject', $subject, $preferences);
        $encoded_subject = substr($encoded_subject, strlen('Subject: '));
       
        
        $message="<b>Nom : </b>".$data['nom']."<br/><b>Prénom : </b>".$data['prenom']."<br/><b>Mail : </b>".$data['mail']."<br/><b>Sujet : </b>".$data['sujet']."<br/><b>Message : </b><br/>".$data['message']."<br/>";
        
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'To: Seb <XXX>' . "\r\n";
        $headers .= 'From: SiteEval <site@contact.fr>' . "\r\n";
    
        if (mail($to, $encoded_subject, $message, $headers)){
            $_SESSION['sendMail']['nb']++;
            $_SESSION['sendMail']['result']="Votre mail est envoyé, il sera traité dans les plus brefs délais";
        }else{
            $_SESSION['sendMail']['result']="Echec lors de l'envoi";
        }
    }



}
