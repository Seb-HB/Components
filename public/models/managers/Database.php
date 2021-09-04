<?php
abstract class Database{

    protected $bdd;

    public function __construct(){
        global $host,$userBdd, $passBdd,$dbName;
        try {
            $this->bdd= new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8', $userBdd, $passBdd );
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            throw $e;
            
        }

    }
}
?>