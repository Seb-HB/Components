<?php
abstract class Database{

    protected $bdd;

    public function __construct(){
        global $host,$userBdd, $passBdd,$dbName;
        try {
            $this->bdd= new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8', $userBdd, $passBdd );
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo('une erreur est survenue dnas le fichier '.$e->getFile().' à la ligne '.$e->getLine());
            echo('erreur avec le code '.$e->getCode().' : '.$e->getMessage());
        }

    }
}
?>