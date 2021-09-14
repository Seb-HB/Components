<?php

class ContactController{
    private $sujets=['Stage', 'Travail', 'Comment', 'Divers'];
    private $metaTitle='Contactez-moi!';
    private $metaDescription='Vous cherchez un développeur fullStack pour un projet ou vous avez un stage à me proposer à partir du 2 novembre? Alors écrivez moi, je vous répondrai.';


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
        if(!preg_match("#^[a-zA-Zéèàêô]{3,}$#", $data['nom'])){
            $_SESSION['sendMail']['errors'][]='le nom saisi ne respecte pas les ciritères';
        }
        if(!preg_match('#^[a-zA-Zéèàêô]{3,}$#', $data['prenom'])){
            $_SESSION['sendMail']['errors'][]='le prénom saisi ne respecte pas les ciritères';
        }
        if(!preg_match('#^[a-z]([a-z0-9]*[\.\-\_]?[a-z0-9]+)+@[a-z]{2,15}[.][a-z]{2,20}$#', $data['mail'])){
            $_SESSION['sendMail']['errors'][]='l\'email saisi ne semble pas être valide';
        }
        if(!in_array($data['sujet'], $this->sujets)){
            $_SESSION['sendMail']['errors'][]='Utilisez un sujet de la séléction.';
        }
        if(!preg_match('#^[^\{\[\]\}$]{10,}$#', $data['message'])){
            $_SESSION['sendMail']['errors'][]='les caratères [], {} et $ ne sont pas autorisés et le message doit en comporter plus de 10';
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
        $message=new Message($data);
    
        if (mail($message->getTo(), $message->getEncoded_subject(), $message->getContent(), $message->getHeaders())){
            $_SESSION['sendMail']['nb']++;
            $_SESSION['sendMail']['result']="Votre mail est envoyé, il sera traité dans les plus brefs délais";
        }else{
            $_SESSION['sendMail']['result']="Echec lors de l'envoi";
        }
    }



}
