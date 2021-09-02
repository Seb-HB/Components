<?php
abstract class Database{

    protected $bdd;

    private $hostName='';
    private $user='';
    private $password='';
    private $dbName='';

    public function __construct(){
        try {
            $this->bdd= new PDO('mysql:host='.$this->hostName.';dbname='.$this->dbName.';charset=utf8', $this->user, $this->password );
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $th;
        }

    }
}
?>