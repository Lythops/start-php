<?php

require_once('Database.php');

class User extends Database {

    //Proprietés
    private $id;
    private $prenom;
    private $nom;

    //Constructeur de la classe user
    public function __construct(){
        parent::__construct();
    }

    //Methodes

    //Inscription de l'User en BDD
    public function register(){

    }   

    //Récupération des données d'un user en BDD
    public function getUser($id){
        $dbco = $this->connection();

            // Récupération des données en bdd
    $req = $dbco->prepare('SELECT * FROM user where id=:id;');
    $req->execute([
        'id' => $id,
    ]);

    // Mise des résultats dans un tableau tout propre tout beau
    $result = $req->fetch(PDO::FETCH_ASSOC);

    //renvoyer les résultats

    return $result;
    }

}