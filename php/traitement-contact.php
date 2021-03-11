
<?php

// On doit inclure la classe Database
require_once('Class/Database.php');




// Récupération des données POST
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];

// Vérifier, valider, nettoyer les données postées par un utilisateur pas forcément gentil





try {
    // Connexion à la base de données

    //on instancie la classe qui est dans le fichier Database.php
    $database = new Database(); 

    //on appelle une des methodes de la classe (connection)
    $dbco = $database->connection(); 
    
    // Insertion d'un nouvel utilisateur en bdd
    $req = $dbco->prepare('INSERT INTO user (prenom, nom) VALUES(:prenom, :nom);');
    $req->execute([
        'prenom' => $prenom,
        'nom' => $nom,
    ]);

    // Redirection vers le formulaire avec un message d'erreur
    header('Location: ../contact.php?msg=success');
} catch(PDOException $e) {
    // Redirection vers le formulaire avec un message d'erreur
    header('Location: ../contact.php?msg=erreur');
}
//test