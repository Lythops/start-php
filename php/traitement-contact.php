<?php
// Récupération des données POST
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];

// Vérifier, valider, nettoyer les données postées par un utilisateur pas forcément gentil


// Données de connexion au serveur de bases de données
$servname = 'localhost:8889';
$dbname = 'php_test';
$user = 'root';
$pass = 'root';

try {
    // Connexion à la base de données
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
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
