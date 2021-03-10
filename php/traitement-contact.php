<?php
// Récupération des données POST
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];

// Vérifier, valider, nettoyer les données postées par un utilisateur pas forcément gentil


// Enregistrement des données dans la table user de notre base de données
$servname = 'localhost:8889';
$dbname = 'php_test';
$user = 'root';
$pass = 'root';

try {
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Redirection vers le formulaire avec un message d'erreur
    header('Location: ../contact.php?msg=success');
} catch(PDOException $e) {
    // Redirection vers le formulaire avec un message d'erreur
    header('Location: ../contact.php?msg=erreur');
}


// Redirection vers l'accueil
//header('Location: ../index.php?prenom=' . $prenom);