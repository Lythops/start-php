<?php
// Récupération des données POST
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];

// Vérifier, valider, nettoyer les données postées par un utilisateur pas forcément gentil


// Redirection vers l'accueil
header('Location: ../index.php?prenom=' . $prenom);
