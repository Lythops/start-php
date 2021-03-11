<?php
// Données de connexion au serveur de bases de données
require_once('php/Class/User.php');

//on instancie notre classe dans un objet $user

$user = new User();

//on appelle une méthode de notre objet
$result = $user->getUser(1);
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