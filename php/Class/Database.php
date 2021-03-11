<?php


//déclaration de la classe

class Database{
    private $servname;
    private $dbname;
    private $user;
    private $pass;

    public function __construct(){
         //on renseigne les valeurs de propriétés
        $this->servname = 'localhost:3306';
        $this->dbname = 'phptest';
        $this->user = 'root';
        $this->pass = '';
        
    }

    public function connection(){



        try{
            //tente une connexion bdd
            $dbco = new PDO("mysql:host={$this->servname};dbname={$this->dbname}", $this->user, $this->pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbco;
        } catch(PDOException $e) {
            die('connexion BDD KO');
        }
    }
}