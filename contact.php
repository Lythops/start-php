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

        <form method="post" action="php/traitement-contact.php">
            <div class="form-group">
                <label for="prenom">Votre prénom * :</label>
                <input type="text" id="prenom" name="prenom" placeholder="ex: Bob" required />
            </div>

            <div class="form-group">
                <label for="nom">Votre nom * :</label>
                <input type="text" id="nom" name="nom" placeholder="ex: Marley" required />
            </div>

            <div class="form-group">
                <button type="submit">Envoyer !</button>
            </div>
        </form>
    </body>
</html>