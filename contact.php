<?php
// Données de connexion au serveur de bases de données
$servname = 'localhost:8889';
$dbname = 'php_test';
$user = 'root';
$pass = 'root';

try {
    // Connexion à la base de données
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données en bdd
    $req = $dbco->prepare('SELECT * FROM user where id=2;');
    $req->execute();

    // Mise des résultats dans un tableau tout propre tout beau
    $result = $req->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $_GET['msg'] = 'erreur';
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>PHP - Starter - Contact</title>
        <meta name="description" content="Blablabla…" />

        <link rel="stylesheet" href="assets/css/styles.css" />
    </head>

    <body>
        <h1>
            <?php echo "Contact"; ?>
        </h1>

        <!-- Message de retour de traitement-contact.php -->
        <?php if(isset($_GET['msg'])) : ?>
            <?php if($_GET['msg'] == 'erreur'): ?>
                <p class="error">Une erreur s'est produite ;(</p>
            <?php else: ?>
                <p class="success">Tout s'est bien passé \o/</p>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Formulaire de contact -->
        <form method="post" action="php/traitement-contact.php">
            <div class="form-group">
                <label for="prenom">Votre prénom * :</label>
                <input type="text" id="prenom" name="prenom" placeholder="ex: Bob" value="<?php echo (isset($result) ? $result['prenom'] : ''); ?>" required />
            </div>

            <div class="form-group">
                <label for="nom">Votre nom * :</label>
                <input type="text" id="nom" name="nom" placeholder="ex: Marley" value="<?php echo (isset($result) ? $result['nom'] : ''); ?>" required />
            </div>

            <div class="form-group">
                <button type="submit">Envoyer !</button>
            </div>
        </form>
    </body>
</html>